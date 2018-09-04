<?php

namespace Compass\Http\Controllers\Backend\Web\Helpdesk;

use Compass\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Contracts\Auth\Guard;
use Compass\Models\{Categories, Priority, Ticket};
use Illuminate\Http\RedirectResponse;
use Compass\User;
use Compass\Http\Requests\Helpdesk\TicketValidation;

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
        $this->middleware(['verified', 'auth', 'forbid-banned-user']);
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
     * @param  User       $users        The resource model for the application users.
     * @return View 
     */
    public function create(Priority $priorities, Categories $categories, User $users): View
    {
        if ($this->auth->user()->hasRole('admin')) {
            $priorities = $priorities->all(['id', 'type', 'name']);
            $admins = $users->role('admin')->select(['id', 'name'])->get();   
        }

        $categories = $categories->getCategories(auth()->user());
        return view('backend.helpdesk.tickets.create', compact('priorities', 'categories', 'admins'));
    }

    /**
     * Create a new helpdesk ticket in the application. 
     * 
     * @param  TicketValidation $input The form request class that handles the request input.
     * @return RedirectResponse
     */
    public function store(TicketValidation $input): RedirectResponse
    {
        if ($ticket = new Ticket($input->all())) {    // Ticket has been stored in the application
            $ticket->setupRelations($ticket, $input);   // Register all the relation values for the ticket

            $this->flashInfo('The helpdesk ticket has been stored.');
        }

        return redirect()->route('backend.helpdesk.tickets.show', $ticket);
    }
}
