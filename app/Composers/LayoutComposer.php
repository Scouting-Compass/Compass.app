<?php 

namespace Compass\Composers;

use Illuminate\View\View;

/**
 * @todo Docblocksx
 */
class LayoutComposer 
{
    public function compose(View $view): void
    {
        if (auth()->check()) {
            $view->with('notificationCounter', auth()->user()->unreadNotifications()->count());
        }
    }
}