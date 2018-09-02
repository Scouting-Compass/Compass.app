<?php

namespace Compass\Http\Controllers\Backend\Web\Helpdesk;

use Illuminate\Http\Request;
use Compass\Http\Controllers\Controller;
use Illuminate\View\View;
use Compass\Models\Ticket;
use Illuminate\Contracts\Auth\Guard;
use Compass\Models\Priority;
use Compass\Models\Categories;

/**
 * Class IndexController
 *
 * @package Compass\Http\Controllers\Backend\Web\Helpdesk
 */
class IndexController extends Controller
{
    /**
     * Thez authentication guard implementation. 
     * 
     * @var Guard
     */
    protected $auth;

    /**
     * IndexController constructor.
     *
     * @param  Guard $auth The Authentication guard implementation variable.
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->middleware(['auth', 'forbid-banned-user']);
        $this->auth = $auth;
    }

    /**
     * Helpdesk dashboard page.
     *
     * @param  Ticket $tickets The resource model for the helpdesk tickets.
     * @return View
     */
    public function index(Ticket $tickets): View
    {
        if ($this->auth->user()->hasRole('admin')) {
            return view('backend.helpdesk.dashboard', compact('tickets'));
        }

        return view('backend.helpdesk.dashboard-user', compact('tickets'));
    }

    /**
     * Create view for an new helpdesk ticket.
     * 
     * @param  Priority   $priorities   The resource model for the helpdesk priorities.
     * @param  Categories $categories   The resource model for the helpdesk categories.
     * @return View 
     */
    public function create(Priority $priorities, Categories $categories): View
    {
        if ($this->auth->user()->hasRole('admin')) {
            $priorities = $priorities->all(['id', 'type', 'name']);
        }

        $categories = $categories->getCategories(auth()->user());
        return view('backend.helpdesk.create', compact('priorities', 'categories'));
    }
}
