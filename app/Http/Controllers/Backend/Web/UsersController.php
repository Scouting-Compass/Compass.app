<?php

namespace Compass\Http\Controllers\Backend\Web;

use Compass\User;
use Illuminate\Http\Request;
use Compass\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

/**
 * Class UsersController 
 * 
 * @package Compass\Http\Controllers\Backend\Web
 */
class UsersController extends Controller
{
    /**
     * Holds the users model
     *
     * @var User $users
     */
    protected $users;

    /**
     * UsersController Constructor 
     * 
     * @return void 
     */
    public function __construct(User $users) 
    {
        $this->middleware(['auth', 'role:admin', 'forbid-banned-user']);
        $this->users = $users;
    }

    /**
     * The Back-end view for the user malnagement. 
     *
     * @param  Request $request The request information bag. (Used to apply filters.)
     * @return View
     */
    public function index(Request $request): View
    {
        switch ($request->get('filter')) {
            case 'deactivated': $users = $this->users->deActivatedUsers(); break; 
            case 'recent':      $users = $this->users->recentUsers();      break;
            case 'deleted':     $users = $this->users->deletedUsers();     break;
            case 'banned':      $users = $this->users->adminUsers();       break;

            default: $users = $this->users; break; //! No valid filter is given or the user wants all the users.
        }

        return view('backend.users.index', ['users' => $users->simplePaginate(15)]); 
    }
}
