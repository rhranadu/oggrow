<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Queue\SerializesModels;

class DatasetUpdated implements ShouldBroadcastNow
{
    use SerializesModels;

    public $dataset;

    public function __construct(array $dataset)
    {
        $this->dataset = $dataset;
    }

    public function broadcastOn()
    {
        return new Channel('dataset');
    }
}
