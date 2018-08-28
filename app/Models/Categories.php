<?php

namespace Compass\Models;

use Compass\Interfaces\Helpdesk\CategoryInterface;
use Compass\Repositories\Helpdesk\CategoryRepository;
use Compass\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Categories
 *
 * @package Compass\Models
 */
class Categories extends CategoryRepository implements CategoryInterface
{
    use SoftDeletes;

    /**
     * Mass-assign fields for the categories table in the storage.
     *
     * @var array
     */
    protected $fillable = ['name', 'type', 'color'];

    /**
     * Data relation for the category creator.
     *
     * @return BelongsTo
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault(['name' => 'unknown']);
    }
}
