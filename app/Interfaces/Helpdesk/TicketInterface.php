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
     * @param  Builder $query
     * @return Builder
     */
    public function scopeToday(Builder $query): Builder;

    /**
     * @param  Builder $query
     * @return Builder
     */
    public function scopeAssigned(Builder $query): Builder;

    /**
     * @param  Builder $query
     * @param  bool    $status
     * @return Builder
     */
    public function scopeIsOpen(Builder $query, bool $status): Builder
}