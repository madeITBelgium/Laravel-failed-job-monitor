<?php

return [

    /*
     * The notification that will be sent when a job fails.
     */
    'notification' => \MadeITBelgium\LaravelFailedJobMonitor\Notification::class,

    /*
     * The notifiable to which the notification will be sent. The default
     * notifiable will use the mail and slack configuration specified
     * in this config file.
     */
    'notifiable' => \MadeITBelgium\LaravelFailedJobMonitor\Notifiable::class,

    /*
     * The channels to which the notification will be sent.
     */
    'channels' => ['mail', 'slack'],
    'mail'     => [
        'to' => 'email@example.com',
    ],
    'slack' => [
        'webhook_url' => env('FAILED_JOB_SLACK_URL'),
    ],
];
