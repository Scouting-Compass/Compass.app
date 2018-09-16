<?php

namespace Compass\Http\Controllers\Backend\Web\Helpdesk;

use Illuminate\Http\RedirectResponse;
use Compass\Http\Controllers\Controller;
use Compass\Models\Ticket;
use Compass\Http\Requests\Helpdesk\CommentValidator;
use Illuminate\Contracts\Auth\Guard;
use BeyondCode\Comments\Comment;
use Compass\Repositories\Comments\Repository;

/**
 * Class CommentController
 * 
 * @package Compass\Http\Controllers\Backend\Web\Helpdesk
 */
class CommentController extends Controller
{
    /**
     * Thez authentication guard implementation. 
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
    public function __construct(Guard $auth, Repository $comments)
    {
        $this->middleware(['verified', 'auth', 'forbid-banned-user']);
        $this->middleware(['can:create-comment,ticket'])->only(['store']);
        $this->middleware(['can:destroy,comment'])->only(['destroy']);

        $this->auth = $auth;
    }

    /**
     * Store a helpdesk comment in the resource storage. 
     * 
     * @param  CommentValidator $input          The form request class that handles the input validation. 
     * @param  Ticket           $ticket         The resource entity from the helpdesk ticket.
     * @param  Repository       $repository     The repository that holds all the comments logic.
     * @return RedirectResponse
     */
    public function store(CommentValidator $input, Ticket $ticket, Repository $comment): RedirectResponse 
    {
        if ($ticket->comment($input->comment)) {
            $comment->sendNotifications($ticket);
        }

        return redirect()->route('helpdesk.ticket.show', $ticket);
    }

    /**
     * Delete an comment in the helpdesk. 
     * 
     * @param  Comment $comment The resource entity from the comment. 
     * @return RedirectResponse
     */
    public function destroy(Comment $comment): RedirectResponse
    {
        $comment->delete();
        return back();
    }
}
