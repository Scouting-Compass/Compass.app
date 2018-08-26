<?php

namespace Compass\Traits\Users;

use Compass\User;
use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;

/**
 * Trait SocialAuth
 *
 * @package Compass\Traits\Users
 */
trait SocialAuth
{
    /**
     * Redirect the user back to the OAuth provider.
     *
     * @param  string $provider The name for the social authentication provider.
     * @return RedirectResponse
     */
    public function redirectToProvider(string $provider): RedirectResponse
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from provider. Check if the user already exists
     * in our database by looking up their provider_id in the database.
     *
     * If the user exists, log them in. Otherwise, create a new user then log them in. After that
     * redirect them to the authenticated users homepage.
     *
     * @param  string $provider The name for the social authencation provider.
     * @return RedirectResponse
     */
    public function handleProviderCallback(string $provider): RedirectResponse
    {
        $user = Socialite::driver($provider)->user();
        $authUser = $this->findOrCreateUser($user, $provider);

        auth()->login($authUser, true);
        return redirect($this->redirectTo);
    }

    /**
     * If a user has registered before using social auth, return the user
     * else, create a new user object.
     *
     * @param  object $user Socialite user object
     * @param  string $provider Social auth provider
     * @return User
     */
    public function findOrCreateUser($user, string $provider): User
    {
       $authUser = User::whereProviderId($user->id)->first();

       if ($authUser) {
           return $authUser;
       }

       return User::create(['name' => $user->name, 'email' => $user->email, 'provider' => $provider, 'provider_id' => $user->id])
           ->assignRole('user');
    }
}