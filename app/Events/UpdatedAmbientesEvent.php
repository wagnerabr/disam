<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Http\Model\Ambiente;

class UpdatedAmbientesEvent extends Event
{
    use SerializesModels;

    public $ambiente;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Ambiente $ambiente)
    {
        $this->ambiente = $ambiente;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
