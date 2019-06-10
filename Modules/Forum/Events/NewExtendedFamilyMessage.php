<?php

namespace Modules\Forum\Events;

use Modules\Forum\Entities\UserMessage;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class NewExtendedFamilyMessage implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $UserMessage;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(UserMessage $message)
    {
        $this->userMessage = $message;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return new Channel('extended.family.'.$this->userMessage->extendFamilyMessage->family->id);
    }

    public function broadcastWith()
    {
        return [
            'message' => $this->userMessage->message->message,
            'send_at' => $this->UserMessage->send_at(),
            'user' => $this->userMessage->sender(),
            'image' => $this->userMessage->image()
        ];
    }
}
