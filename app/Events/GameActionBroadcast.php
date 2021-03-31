<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class GameActionBroadcast implements ShouldBroadcast
{
    protected $gameRoom;
    protected $user;
    protected $entryName;
    protected $status;
    protected $point;

    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user, $gameRoom, $entryName, $point, $status)
    {
        $this->user = $user;
        $this->gameRoom = $gameRoom;
        $this->entryName = $entryName;
        $this->status = $status;
        $this->point = $point;
    }

    public function broadcastWith()
    {
        return [
            'action_result' => ['user_id' => $this->user->id, 'name' => $this->entryName, 'status' => $this->status, 'point' => $this->point]
        ];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PresenceChannel('game.room.' . $this->gameRoom);
    }
}
