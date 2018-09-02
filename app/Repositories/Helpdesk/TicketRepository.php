<?php 

namespace Compass\Repositories\Helpdesk;

use Illuminate\Database\Eloquent\Model;
use Compass\Interfaces\Helpdesk\TicketInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Compass\User;
 
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
        return $query->whereCreatedAt(date('Y-m-d'));
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
     * Data relation for the user that is assigned to the ticket. 
     * 
     * @return BelongsTo
     */
    public function assigned(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}