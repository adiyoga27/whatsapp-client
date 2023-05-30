<?php

namespace App\Tasks\Order;

use App\Models\Order;

class SetExpiredDate
{
    public function __invoke()
    {
        $order = Order::query()->where('expired_at', '<=', now())
            ->where('status', 'pending')->update([
                'status' => 'expired'
            ]);
    }
}
