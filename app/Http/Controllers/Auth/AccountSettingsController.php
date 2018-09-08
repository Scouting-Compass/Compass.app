<?php

namespace Compass\Http\Controllers\Auth;

use Compass\Http\Requests\Account\InformationValidator;
use Illuminate\Contracts\Auth\Guard;
use Compass\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Compass\Http\Requests\Account\SecurityValidator;

/**
 * Class AccountSettingsController
 * 
 * @package Compass\Http\Controllers\Auth
 */
class AccountSettingsController extends Controller
{
    /**
     * The Guard implementation.
     *
     * @var \Illuminate\Contracts\Auth\Guard
     */
    protected $auth;

    /**
     * AccountSettingsController constructor 
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
     * The account settings view. 
     *
     * @param  null|string $type The type for the view that is needed.
     * @return View
     */
    public function index(?string $type = null): View
    {
        switch ($type) {
            case 'security':    return view('backend.account.settings-security'); 
            case 'api-tokens':  return view('backend.account.settings-api');

            default: return view('backend.account.settings-information');
        }
    }

    /**
     * Update the authenticated user his password information.
     *
     * @param  SecurityValidator $input Form request class that handles the security validation.
     * @return RedirectResponse
     */
    public function updateSecurity(SecurityValidator $input): RedirectResponse
    {
        if ($this->auth->user()->update($input->all())) {
            flash('<strong>Success!</strong> Your account security has been updated.')->success()->important();
        }

        return redirect()->route('profile.settings', ['type' => 'security']);
    }

    /**
     * Update the authenticated user his account information.
     *
     * @param  InformationValidator $input Form request class that handles the information validation.
     * @return RedirectResponse
     */
    public function updateInformation(InformationValidator $input): RedirectResponse
    {
        if ($this->auth->user()->update($input->all())) {
            flash('<strong>Success!</strong> Your account information has been updated.')->success()->important();
        }

        return redirect()->route('profile.settings', ['type' => 'information']);
    }
}
