<?php

namespace Compass\Repositories\Helpdesk;

use Compass\Interfaces\Helpdesk\PriorityInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PriorityRepository
 *
 * @package Compass\Repositories\Helpdesk
 */
class PriorityRepository extends Model implements PriorityInterface
{
    /**
     * Get all the types that an helpdesk priority can contain. 
     * 
     * @return array 
     */
    public function getTypes(): array 
    {
        return [
            'draft' => 'DRAFT - Used for indicating draft priorities in the helpdesk.',
            'public' => 'PUBLIC - Used for indicated priority that can be used by everyone.',
            'internal' => 'INTERNAL - Priority that is dedicated for internal use only.'
        ];
    }

    /**
     * Get the application it's default helpdesk priorities
     * 
     * @return  array
     */
    public function getDefaultPriorities(): array 
    {
        return [
            ['color' => '#000000', 'name' => 'Low', 'type' => 'public'], 
            ['color' => '#000000', 'name' => 'Normal', 'type' => 'public'], 
            ['color' => '#000000', 'name' => 'High', 'type' => 'public'], 
            ['color' => '#000000', 'name' => 'Critical', 'type' => 'public'], 
        ];
    }
}