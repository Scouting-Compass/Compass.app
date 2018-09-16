<?php

namespace Compass\Models;

use Compass\Repositories\Helpdesk\TicketRepository; 
use Compass\Interfaces\Helpdesk\TicketInterface;
use Illuminate\Database\Eloquent\SoftDeletes;
use BeyondCode\Comments\Traits\HasComments;
use BeyondCode\Comments\Contracts\Commentator;

/**
 * Class Ticket 
 * 
 * @package Compass\Models
 */
class Ticket extends TicketRepository implements TicketInterface, Commentator
{
    use SoftDeletes, HasComments; 

    /**
     * Mass-assign fields for the resource table. 
     * 
     * @var array
     */
    protected $fillable = ['is_open', 'title', 'content'];

    /**
     * Check if a comment for a specific model needs to be approved.
     * 
     * @param  mixed $model The resource model from the ticket.
     * @return bool
     */
    public function needsCommentApproval($model): bool
    {
        return false;    
    }
}
