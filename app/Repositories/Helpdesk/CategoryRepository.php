<?php

namespace Compass\Repositories\Helpdesk;

use Compass\User;
use Compass\Interfaces\Helpdesk\CategoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class CategoryRepository
 *
 * @package Compass\Repositories\Helpdesk
 */
class CategoryRepository extends Model implements CategoryInterface
{
    /**
     * Get al types that a helpdesk category can contain.
     *
     * @return array
     */
    public function getTypes(): array
    {
        return [
            'draft' => 'DRAFT - Used for indicating draft cats. in the helpdesk.',
            'public' => 'PUBLIC - Used for indicated category that can be used by everyone.',
            'internal' => 'INTERNAL - Category that is dedicated for internal use only.'
        ];
    }

    /**
     * Method for all the default categories in the application. 
     * 
     * @return array
     */
    public function getDefaultCategories(): array
    {
        return [
            ['color' => '#000000', 'name' => 'Bug', 'type' => 'public'], 
            ['color' => '#000000', 'name' => 'Privacy concern', 'type' => 'public'], 
            ['color' => '#000000', 'name' => 'Other', 'type' => 'public'],
        ];
    }

    /**
     * Get all the helpdesk categories based on the user his role. 
     * 
     * @param  User $user The variable for the authenticated user in the application. 
     * @return Collection 
     */
    public function getCategories(User $user): Collection
    {
        return ($user->hasRole('admin') 
            ? $this->all(['id', 'type', 'name']) 
            : $this->where('type', 'public')->all(['id', 'type', 'name']));
    }
}