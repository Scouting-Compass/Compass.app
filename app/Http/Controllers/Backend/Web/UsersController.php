<?php

namespace App\Http\Controllers\Backend\Web;

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
     * The Back-end view for the user malnagement. 
     * @return View
     */
    public function index(): View
    {
        return view('backend.users.index'); 
    }
}
