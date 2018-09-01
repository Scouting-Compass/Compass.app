<?php

namespace Compass\Interfaces\Helpdesk;

/**
 * Interface PriorityInterface
 *
 * @package Compass\Interfaces\Helpdesk
 */
interface PriorityInterface
{
    /**
     * Get all the types that an helpdesk category can contain.
     * 
     * @return array
     */
    public function getTypes(): array;
}