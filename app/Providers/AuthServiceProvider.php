<?php

namespace Compass\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Compass\Models\Ticket;
use Compass\Policies\{TicketPolicy, CommentPolicy};
use BeyondCode\Comments\Comment;

/**
 * Class AuthServiceProvider
 * 
 * @package Compass\Providers
 */
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Ticket::class   => TicketPolicy::class, 
        Comment::class  => CommentPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
