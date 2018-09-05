<?php

namespace Compass\Models;

use Compass\Interfaces\Helpdesk\PriorityInterface;
use Compass\Repositories\Helpdesk\PriorityRepository;
use Compass\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Priority
 *
 * @package Compass\Models
 */
class Priority extends PriorityRepository implements PriorityInterface
{
    use SoftDeletes;

    /**
     * Mass-assign fields for the database table.
     *
     * @var array
     */
    protected $fillable = ['name', 'color', 'type'];

    /**
     * Data relation for the creator details
     *
     * @return BelongsTo
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault(['name' => 'Unknown']);
    }
}
