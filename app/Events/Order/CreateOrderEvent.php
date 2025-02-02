<?php

namespace App\Events\Order;

use App\Models\Order;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CreateOrderEvent
{
    use Dispatchable, SerializesModels;
    public $entity_type;
    public $entity_id;
    public $event_data;
    public $event_type;

    public function __construct(Order $order)
    {

        $this->entity_type = 'Order';
        $this->entity_id = $order->id;
        $this->event_type = 'CreateOrder';
        $this->event_data = json_encode([
            'user_id' => $order->user_id,
            'status' => $order->status,
            'total_price' => $order->total_price,
        ]);
    }
}
