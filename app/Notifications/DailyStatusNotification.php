<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\SlackMessage;

class DailyStatusNotification extends Notification
{
    use Queueable;

    public function via(): array
    {
        return ['slack'];
    }

    public function toSlack(object $notifiable): SlackMessage
    {
        return (new SlackMessage)
            ->from('Uptime Checker')
            ->attachment(function ($attachment) use ($notifiable) {
                $attachment->title(
                    'Daily Status | ' . env('APP_ENV') . ' | ' . date('d-m-Y H:i:s')
                )->fields([
                    'Title' => $notifiable->name,
                    'Domain' => $notifiable->url,
                    'Status' => $notifiable->website_downtime,
                    'Uptime' => optional($notifiable->uptimeLogsLatestFirst)->status ? 'Up': 'Down'
                ]);
            });
    }
}
