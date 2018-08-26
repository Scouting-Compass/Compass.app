<?php

namespace Compass\Interfaces\Helpdesk;

/**
 * Interface CategoryInterface
 *
 * @package Compass\Interfaces\Helpdesk
 */
interface CategoryInterface
{
    /**
     * Get al types that a helpdesk category can contain.
     *
     * @return array
     */
    public function getTypes(): array;
}