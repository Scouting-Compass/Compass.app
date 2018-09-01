<?php

namespace Compass\Models;

use Compass\Repositories\Helpdesk\TicketRepository; 
use Compass\Interfaces\Helpdesk\TicketInterface;

/**
 * Class Ticket 
 * 
 * @package Compass\Models
 */
class Ticket extends TicketRepository implements TicketInterface
{
    /**
     * Mass-assign fields for the resource table. 
     * 
     * @var array
     */
    protected $fillable = [];
}
