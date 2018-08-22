<?php

namespace App\Http\Controllers\Backend\Web;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

/**
 * Class UsersController 
 * 
 * @package App\Http\Controllers\Backend\Web
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
     * @return View
     */
    public function index(Request $request): View
    {
        switch ($request->get('filter')) {
            default: $users = $this->users->simplePaginate(15); break;
        }

        return view('backend.users.index', ['users' => $users]); 
    }
}
