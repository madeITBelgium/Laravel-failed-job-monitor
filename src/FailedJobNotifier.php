<?php

namespace MadeITBelgium\LaravelFailedJobMonitor;

use Illuminate\Queue\Events\JobFailed;
use Illuminate\Queue\QueueManager;

/**
 * Laravel Failed job monitor.
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) 2017 Made I.T. (http://www.madeit.be)
 * @author     Made I.T. <info@madeit.be>
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
 */
class FailedJobNotifier
{
    /**
     * Fetch the failing jobs.
     *
     * @return void
     */
    public function register()
    {
        app(QueueManager::class)->failing(function (JobFailed $event) {
            $notifiable = app(config('laravel-failed-job-monitor.notifiable'));
            $notification = app(config('laravel-failed-job-monitor.notification'))->setEvent($event);

            $notifiable->notify($notification);
        });
    }
}
