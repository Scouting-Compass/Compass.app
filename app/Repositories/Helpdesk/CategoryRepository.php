<?php

namespace Compass\Repositories\Helpdesk;

use Compass\Interfaces\Helpdesk\CategoryInterface;
use Illuminate\Database\Eloquent\Model;

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
}