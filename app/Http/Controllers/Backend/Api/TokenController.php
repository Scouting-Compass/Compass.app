<?php

namespace Compass\Http\Controllers\Backend\Api;

use Illuminate\Http\Request;
use Compass\Http\Controllers\Controller;
use Compass\Http\Resources\TokenCollection;
use Illuminate\Contracts\Auth\Guard;

/**
 * Class TokenController
 * 
 * @package Compass\Http\Controllers\Backend\Api
 */
class TokenController extends Controller
{
    /**
     * The Guard implementation.
     *
     * @var \Illuminate\Contracts\Auth\Guard
     */
    protected $auth;

    /**
     * TokenController constructor 
     * 
     * @param  Guard $auth Contract for the authenticated user his details.
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->middleware(['auth', 'forbid-banned-user']);
        $this->auth = $auth;
    }

    /**
     * The internal api endpoint for all the api tokens from the user
     */
    public function index() 
    {
        return new TokenCollection($this->auth->user()->apikeys());
    }
}
