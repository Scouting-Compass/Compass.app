<?php 

namespace Compass\Repositories\Helpdesk;

use Illuminate\Database\Eloquent\Model;
use Compass\Interfaces\Helpdesk\TicketInterface;
 
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
        //
    }
}