<?php

namespace App\Events;

use App\Models\Tweet;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewTweet implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $tweet;

    public function __construct(Tweet $tweet)
    {
        $this->tweet = $tweet;
    }

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('tweet.' . $this->tweet->user->id),
        ];
    }

    public function broadcastWith()
    {
        return [
            'text_content' => $this->tweet->text_content,
            'media' => $this->tweet->media,
            'user' => [
                'name' => $this->tweet->user->name,
                'email' => $this->tweet->user->email,
                'username' => $this->tweet->user->username
            ]
        ];
    }

    // public function broadcastAs()
    // {
    //     return 'test';
    // }
}
