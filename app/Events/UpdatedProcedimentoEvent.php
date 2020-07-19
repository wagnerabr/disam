<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Http\Model\Procedimento;

class UpdatedProcedimentoEvent extends Event
{
    use SerializesModels;

    public $procedimento;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Procedimento $procedimento)
    {
        $this->procedimento = $procedimento;
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
