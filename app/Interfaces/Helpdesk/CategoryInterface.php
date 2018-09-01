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
     * Get all types that a helpdesk category can contain.
     *
     * @return array
     */
    public function getTypes(): array;

    /**
     * Get all the default categories for the application.
     * 
     * @return array
     */
    public function getDefaultCategories(): array;
}