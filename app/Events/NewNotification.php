<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewNotification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $comment;
    public $image;
    public $title;
    public $name;
    public $date;
    public $url;
    public $id;

    public function __construct($data)
    {
        $this->message  = $data['message'];
        $this->comment  = $data['comment'];
        $this->image    = $data['image'];
        $this->title    = $data['title'];
        $this->name     = $data['name'];
        $this->date     = $data['date'];
        $this->url      = $data['url'];
        $this->id       = $data['id'];
    }

    public function broadcastOn()
    {
        return new Channel('new-notification');
    }

    public function broadcastAs()
    {
        return 'new-notification';
    }
}
