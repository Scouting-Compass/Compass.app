<?php

namespace Compass\Http\Controllers\Backend\Web\Helpdesk\Config;

use Illuminate\Http\Request;
use Compass\Http\Controllers\Controller;

/**
 * Class PriorityController
 *
 * @package Compass\Http\Controllers\Backend\Web\Helpdesk\Config
 */
class PriorityController extends Controller
{
    /**
     * Holds the priority resource model.
     *
     * @var
     */
    protected $priorities;

    /**
     * PriorityController constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin', 'forbid-banned-user']);
    }
}
