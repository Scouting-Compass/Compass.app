<?php

namespace Compass\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Compass\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

/**
 * Class AccountSettingsController
 * 
 * @package Compass\Http\Controllers\Auth
 */
class AccountSettingsController extends Controller
{
    /**
     * AccountSettingsController constructor 
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * The account settings view. 
     * 
     * @return View
     */
    public function index(): View
    {

    }
}
