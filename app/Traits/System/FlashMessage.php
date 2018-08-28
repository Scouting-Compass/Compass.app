<?php

namespace Compass\Traits\System;

use Laracasts\Flash\FlashNotifier;

/**
 * Trait FlashMessage
 *
 * @package Compass\Traits\System
 */
trait FlashMessage
{
    /**
     * Flash a message.
     *
     * @param  string $title    The title for the flash message
     * @param  string $message  The actual flash message
     * @return FlashNotifier
     */
    public function flashMessage(string $title, string $message): FlashNotifier
    {
        return flash("<strong>{$title}</strong> $message");
    }

    /**
     * Flash an info message.
     *
     * @param  string $message  The actual flash message
     * @param  string $title    The title for the flash message defaults to "Info!"
     * @return FlashNotifier
     */
    public function flashInfo(string $message, string $title = 'Info!'): FlashNotifier
    {
        return $this->flashMessage("<strong>{$title}", $message)->info();
    }

    /**
     * Flash an success message.
     *
     * @param  string $message  The actual flash message.
     * @param  string $title    The title for the flash message defaults to "Success!"
     * @return FlashNotifier
     */
    public function flashSuccess(string $message, string $title = 'Success!'): FlashNotifier
    {
        return $this->flashMessage("<strong>{$title}", $message)->success();
    }

    /**
     * Flash an warning message.
     *
     * @param  string $message  The actual flash message.
     * @param  string $title    The title for the flash message default to "Warning!"
     * @return FlashNotifier
     */
    public function flashWarning(string $message, string $title = 'Warning!'): FlashNotifier
    {
        return $this->flashMessage("<strong>{$title}</strong>", $message)->warning();
    }
}