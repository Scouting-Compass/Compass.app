<?php 

namespace Compass\Composers;

use Illuminate\View\View;

/**
 * Class LayoutComposer
 * 
 * @package Compass\Composers
 */
class LayoutComposer 
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view The builder instance for the blade view.
     * @return void
     */
    public function compose(View $view): void
    {
        if (auth()->check()) {
            $view->with('notificationCounter', auth()->user()->unreadNotifications()->count());
        }
    }
}