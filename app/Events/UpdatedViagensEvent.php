<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Http\Model\Viagem;

class UpdatedViagensEvent extends Event
{
    use SerializesModels;

    public $viagem;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Viagem $viagem)
    {
        $this->viagem = $viagem;
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
