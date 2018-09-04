<?php

namespace Compass\Http\Controllers\Backend\Web\Helpdesk\Config;

use Illuminate\Http\Request;
use Compass\Http\Controllers\Controller;

/**
 * Class StatusController
 * 
 * @package Compass\Http\Controllers\Backend\Web\Helpdesk\Config
 */
class StatusController extends Controller
{
    /**
     * StatusController Constructor 
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['verified', 'auth', 'role:admin', 'forbid-banned-user']);
    }
}
