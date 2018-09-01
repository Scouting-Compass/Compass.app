<?php

namespace Compass\Http\Controllers\Backend\Web\Helpdesk;

use Illuminate\Http\Request;
use Compass\Http\Controllers\Controller;
use Illuminate\View\View;
use Compass\Models\Ticket;

/**
 * Class IndexController
 *
 * @package Compass\Http\Controllers\Backend\Web\Helpdesk
 */
class IndexController extends Controller
{
    /**
     * IndexController constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'forbid-banned-user']);
    }

    /**
     * Helpdesk dashboard page.
     *
     * @param  Ticket $tickets The resource model for the helpdesk tickets.
     * @return View
     */
    public function index(Ticket $tickets): View
    {
        return view('backend.helpdesk.dashboard', compact('tickets'));
    }
}
