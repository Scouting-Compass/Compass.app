<?php 

namespace Compass\Repositories\Helpdesk;

use Compass\User;
use Compass\Http\Requests\Helpdesk\TicketValidation;
use Compass\Models\{Priority, Categories, Ticket};
use Compass\Interfaces\Helpdesk\TicketInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\{Builder, Relations\BelongsTo};
 
/**
 * Class TicketRepository 
 * 
 * @package Compass\Repositories\Helpdesk
 */
class TicketRepository extends Model implements TicketInterface
{
    /**
     * Get all the tickets from today. Mostly used with another scope. 
     * 
     * @param  Builder $query   The Eloquent query builder instance. 
     * @return Builder
     */
    public function scopeToday(Builder $query): Builder
    {
        return $query->whereDate('created_at', '=', date('Y-m-d'));
    }

    /**
     * Get all the tickets that are assigned to the authenticted user. 
     * 
     * @param  Builder $query   The Eloquent query builder instance.
     * @return Builder
     */
    public function scopeAssigned(Builder $query): Builder 
    {
        $user = auth()->user();
        return $query->whereAssignedId($user->id);
    }

    /**
     * Get all the tickets determined on the status, from the storage. 
     * 
     * @param  Builder  $query      The eloquent query builder instance.
     * @param  bool     $status The status for the ticket.
     * @return Builder
     */
    public function scopeIsOpen(Builder $query, bool $status = true): Builder
    {
        return $query->whereIsOpen($status);
    }

    /**
     * Method for setting the resource relations when storing/updating an ticket. 
     * 
     * @param  Ticket           $ticket The resource entity from the helpdesk ticket.   
     * @param  TicketValidation $input  The request class for all the input data.
     * @return void 
     */
    public function setupRelations(Ticket $ticket, TicketValidation $input): void 
    {
        $ticket->creator()->associate($input->user())->save();          //? Data relation for the ticket author.
        $ticket->category()->associate($input->category)->save();       //? Data relation for the ticket category.

        if ($input->has('assignee')) { //! OPTIONAL:  if the assignee is given. Register then.
            $ticket->assigned()->associate($input->assignee)->save();   //? Data relation for the ticket assignee.
        }

        if ($input->has('priority')) { //! OPTIONAL: if the priority is given register then.
            $ticket->priority()->associate($input->priority)->save();   //? Data relation for the ticket priority.
        }
    }

    /**
     * Data relation for the helpdesk ticket its priority
     * 
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Categories::class)->withDefault([
            'name' => '<span class="text-grey">none</span> - <a href="">Edit</a>'
        ]);
    }

    /**
     * Data relation for the helpdesk it's priority
     * 
     * @return BelongsTo
     */
    public function priority(): BelongsTo 
    {
        return $this->belongsTo(Priority::class)->withDefault([
            'name' => '<span class="text-grey">none</span> - <a href="">Edit</a>'
        ]);
    }

    /**
     * Data relation for the user that has created the ticket. 
     * 
     * @return BelongsTo
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => '<span class="text-muted">Verwijderde gebruiker</span>'
        ]);
    }

    /**
     * Data relation for the user that is assigned to the ticket. 
     * 
     * @return BelongsTo
     */
    public function assigned(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => '<span class="text-grey">none</span> - <a href="">Assign yourself</a>'
        ]);
    }
}