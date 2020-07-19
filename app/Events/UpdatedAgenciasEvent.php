<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Http\Model\Agencia;

class UpdatedAgenciasEvent extends Event
{
    use SerializesModels;

    public $agencia;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Agencia $agencia)
    {
        $this->agencia = $agencia;
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
