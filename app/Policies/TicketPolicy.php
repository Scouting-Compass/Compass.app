<?php

namespace Compass\Policies;

use Compass\User;
use Compass\Models\Ticket;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class TicketPolicies
 * 
 * @package Compass\Policies
 */
class TicketPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the ticket.
     *
     * @param  User     $user   The resource entity from the authenticated user. 
     * @param  Ticket   $ticket The resource entity from the helpdesk ticket.
     * @return bool
     */
    public function createComment(User $user, Ticket $ticket): bool
    {
        return $user->hasRole('admin') || $ticket->creator_id = $user->id;
    }
}
