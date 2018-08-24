<?php

namespace Compass\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Compass\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

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
        $this->middleware(['auth', 'forbid-banned-user']);
    }

    /**
     * The account settings view. 
     * 
     * @return View
     */
    public function index(?string $type = null): View
    {
        return ($type === 'security' 
            ? view("backend.account.settings-security") 
            : view("backend.account.settings-information")
        );
    }

    /**
     * @return RedirectResponse
     */
    public function updateSecurity(): RedirectResponse
    {

    }

    /**
     * @return RedirectResponse
     */
    public function updateInformation(): RedirectResponse 
    {

    }
}
