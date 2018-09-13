<?php

namespace Compass\Http\Controllers\Backend\Web;

use Illuminate\Http\Request;
use Compass\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Contracts\Auth\Guard;

/**
 * Class NotificationController
 * 
 * @package Compass\Http\Controllers\Backend\Web
 */
class NotificationController extends Controller
{
    /**
     * The authentication guard implementation. 
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
     * Get the index view for the user notifications. 
     * 
     * @param  Request $request The request information data bag.
     * @return View
     */
    public function index(Request $request): View 
    {
        switch ($request->get('unread')) { 
            case 'read':  
                $notifications = $this->auth->user()->notifications()->simplePaginate(20);
                $type = 'read';
                break; 

            default:       
                $notifications = $this->auth->user()->unreadNotifications()->take(20)->get(); 
                $type = 'unread';
                break;
        } 

        return view('shared.notifications', compact('notifications', 'type'));
    }
}
