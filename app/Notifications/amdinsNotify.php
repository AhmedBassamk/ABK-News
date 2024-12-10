<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;

class amdinsNotify extends Notification
{
    public $admin_name;
    public $notificationCount;
    public $news_title;
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct($admin_name , $news_title , $notificationCount)
    {
        $this->admin_name = $admin_name ;
        $this->news_title = $news_title ;
        $this->notificationCount = $notificationCount ;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database' , 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
           "content" => 'the '. $this->admin_name.' is published a '. $this->news_title .' now in the site!',
           'url' => '/',
           'count' => $this->notificationCount,
        ];
    }
}
