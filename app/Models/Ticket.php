<?php

namespace Compass\Models;

use Compass\Repositories\Helpdesk\TicketRepository; 
use Compass\Interfaces\Helpdesk\TicketInterface;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Ticket 
 * 
 * @package Compass\Models
 */
class Ticket extends TicketRepository implements TicketInterface
{
    use SoftDeletes; 

    /**
     * Mass-assign fields for the resource table. 
     * 
     * @var array
     */
    protected $fillable = ['is_open', 'title', 'content'];
}
