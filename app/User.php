<?php

namespace App;

use App\Traits\Users\FilterScopes;
use App\Interfaces\Users\FilterScopesInterface;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class User
 *  
 * @package App\User
 */ 
class User extends Authenticatable implements FilterScopesInterface, BannableContract
{
    use Notifiable, HasRoles, Bannable, FilterScopes, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Method for salting the password in the database
     *
     * @param  string $password The given or generated password form application/form
     * @return void
     */
    public function setPasswordAttribute(string $password): void
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
