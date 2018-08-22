<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

/**
 * Class AccountSettingsController
 * 
 * @package App\Http\Controllers\Auth
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
