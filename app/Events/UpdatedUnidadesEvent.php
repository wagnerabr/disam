<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Http\Model\Unidade;

class UpdatedUnidadesEvent extends Event
{
    use SerializesModels;

    public $unidade;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Unidade $unidade)
    {
        $this->unidade = $unidade;
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
