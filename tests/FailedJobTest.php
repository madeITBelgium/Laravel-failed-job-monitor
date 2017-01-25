<?php
namespace MadeITBelgium\LaravelFailedJobMonitor\Test;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Notification as NotificationFacade;
use Illuminate\Queue\Events\JobFailed;

use MadeITBelgium\LaravelFailedJobMonitor\FailedJobMonitorServiceProvider;
use MadeITBelgium\LaravelFailedJobMonitor\Notifiable;
use MadeITBelgium\LaravelFailedJobMonitor\Notification;
use MadeITBelgium\LaravelFailedJobMonitor\Test\Dummy\Job;
use MadeITBelgium\LaravelFailedJobMonitor\Test\Dummy\NewNotifiable;
use MadeITBelgium\LaravelFailedJobMonitor\Test\Dummy\NewNotification;

use Orchestra\Testbench\TestCase;

class FailedJobTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        
        NotificationFacade::fake();
    }
    
    protected function getPackageProviders($app)
    {
        return [FailedJobMonitorServiceProvider::class];
    }
    
    public function getEnvironmentSetUp($app)
    {
        $app['config']->set('queue.default', 'sync');
    }
        
    public function testSendNotificationWhenJobFailed()
    {
        $this->fireFailedEvent();
        NotificationFacade::assertSentTo(new Notifiable(), Notification::class);
    }
    
    public function testSendNotificationWhenJobFailedtoNewNotifiable()
    {
        $this->app['config']->set('laravel-failed-job-monitor.notifiable', NewNotifiable::class);
        $this->fireFailedEvent();
        NotificationFacade::assertSentTo(new NewNotifiable(), Notification::class);
    }
    
    public function testSendNotificationWhenJobFailedtoNewNotification()
    {
        $this->app['config']->set('laravel-failed-job-monitor.notification', NewNotification::class);
        $this->fireFailedEvent();
        NotificationFacade::assertSentTo(new Notifiable(), NewNotification::class);
    }
    
    protected function fireFailedEvent()
    {
        return event(new JobFailed('test', new Job(), new \Exception()));
    }
}