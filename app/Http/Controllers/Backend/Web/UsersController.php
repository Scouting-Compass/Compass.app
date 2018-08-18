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
        $this->middleware(['auth']);
        $this->users = $users;
    }

    /**
     * The Back-end view for the user malnagement. 
     * 
     * @param  string $type The type from the users group. 
     * @return View
     */
    public function index(string $type): View
    {
        if (in_array($type, ['user', 'admin'])) {
            $this->users->role($type);
        }

        return view('backend.users.index', ['users' => $this->users->simplePaginate(15)]); 
    }
}
