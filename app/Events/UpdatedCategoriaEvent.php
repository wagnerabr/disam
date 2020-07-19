<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Http\Model\Categoria;

class UpdatedCategoriaEvent extends Event
{
    use SerializesModels;

    public $categoria;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Categoria $categoria)
    {
        $this->categoria = $categoria;
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
