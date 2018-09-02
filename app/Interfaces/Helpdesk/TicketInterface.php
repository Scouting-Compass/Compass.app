<?php 

namespace Compass\Interfaces\Helpdesk;

use Illuminate\Database\Eloquent\Builder;

/**
 * Interface TicketInterface 
 * 
 * @package Compass\Interfaces\Helpdesk
 */
interface TicketInterface
{
    /**
     * Get all the tickets from today. Mostly used with another scope. 
     * 
     * @param  Builder $query   The Eloquent query builder instance.
     * @return Builder
     */
    public function scopeToday(Builder $query): Builder;

    /**
     * Get all the ticket that are assigned to the authenticated user. 
     * 
     * @param  Builder $query   The Eloquent query builder instance. 
     * @return Builder
     */
    public function scopeAssigned(Builder $query): Builder;

    /**
     * Get all the open tickets from the storage. 
     * 
     * @param  Builder $query   The Eloquent query builder instance. 
     * @param  bool    $status  The status for the ticket.
     * @return Builder
     */
    public function scopeIsOpen(Builder $query, bool $status): Builder;
}