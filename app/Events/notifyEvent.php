<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class notifyEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $admin_name;
    public $news_title;
    public $notificationCount;
    public function __construct($admin_name, $news_title , $notificationCount)
    {
        $this->admin_name = $admin_name;
        $this->news_title = $news_title;
        $this->notificationCount = $notificationCount;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('notify'),
        ];
    }
    public function broadcastAs()
    {
        return 'notify';
    }
    public function broadcastWith()
    {
        return [
            "content" => 'the ' . $this->admin_name . ' is published a ' . $this->news_title . ' now in the site!',
            'url' => '/',
            'count' => $this->notificationCount,
        ];
    }
}
