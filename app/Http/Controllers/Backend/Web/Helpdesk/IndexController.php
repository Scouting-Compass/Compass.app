<?php

namespace Compass\Http\Controllers\Backend\Web\Helpdesk;

use Illuminate\Http\Request;
use Compass\Http\Controllers\Controller;
use Illuminate\View\View;

/**
 * Class IndexController
 *
 * @package Compass\Http\Controllers\Backend\Web\Helpdesk
 */
class IndexController extends Controller
{
    /**
     * IndexController constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'forbid-banned-user']);
    }

    /**
     * Helpdesk dashboard page.
     *
     * @return View
     */
    public function index(): View
    {
        return view('backend.helpdesk.dashboard');
    }
}
