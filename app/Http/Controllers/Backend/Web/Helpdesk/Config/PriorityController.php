<?php

namespace Compass\Http\Controllers\Backend\Web\Helpdesk\Config;

use Compass\Http\Requests\helpdesk\PriorityValidation;
use Compass\Models\Priority;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
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
     * @var Priority
     */
    protected $priorities;

    /**
     * PriorityController constructor.
     *
     * @param  Priority $priorities The resource model for the helpdesk priorities
     * @return void
     */
    public function __construct(Priority $priorities)
    {
        $this->middleware(['auth', 'role:admin', 'forbid-banned-user']);
        $this->priorities = $priorities;
    }

    /**
     * Index view for the helpdesk priorities management view.
     *
     * @return View
     */
    public function index(): View
    {
        $priorities = $this->priorities->withTrashed()->simplePaginate();
        return view('backend.helpdesk.priorities', compact('priorities'));
    }

    /**
     * The create view for a new helpdesk priority
     * @return View
     */
    public function create(): View
    {
        return view('helpdesk.priorities.create');
    }

    /**
     * Store an new helpdesk priority in the resource storage.
     *
     * @param  PriorityValidation $input The form request class that handles the validation.
     * @return RedirectResponse
     */
    public function store(PriorityValidation $input): RedirectResponse
    {
        if ($priority = $this->priorities->create($input->all())) {
            $priority->creator()->associate($input->user())->save();
            $this->flashSuccess('The priority has been saved.');
        }

        return redirect()->route('helpdesk.priorities.create');
    }

    /**
     * Delete an helpdesk priority in the resource storage. 
     * 
     * @return RedirectResponse
     */
    public function destroy(Priority $priority): RedirectResponse 
    {
        if ($priority->delete()) {
            //
        }

        return redirect()->route('helpdesk.priorities.index');
    }
}
