<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AddLike extends Notification
{
    use Queueable;

    public $message;
    public $image;
    public $title;
    public $name;
    public $date;
    public $url;

    public function __construct($data)
    {
        $this->message  = $data['message'];
        $this->image    = $data['image'];
        $this->title    = $data['title'];
        $this->name     = $data['name'];
        $this->date     = $data['date'];
        $this->url      = $data['url'];
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'message'  => $this->message,
            'image'    => $this->image,
            'title'    => $this->title,
            'name'     => $this->name,
            'date'     => $this->date,
            'url'      => $this->url,
        ];
    }
}
