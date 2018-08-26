<?php

namespace Compass\Models;

use Compass\Interfaces\Helpdesk\CategoryInterface;
use Compass\Repositories\Helpdesk\CategoryRepository;
use Compass\User;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Categories
 *
 * @package Compass\Models
 */
class Categories extends CategoryRepository implements CategoryInterface
{
    /**
     * Mass-assign fields for the categories table in the storage.
     *
     * @var array
     */
    protected $fillable = ['name', 'type', 'color'];

    /**
     * Data relation for the category creator.
     *
     * @return HasOne
     */
    public function creator(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
