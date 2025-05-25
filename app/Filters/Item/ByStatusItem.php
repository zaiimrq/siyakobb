<?php

namespace App\Filters\Item;

use App\Enums\ItemStatus;

class ByStatusItem
{
    public function handle($query, $next)
    {
        if (request()->filled('status')) {
            $query->where('kondisi_awal', request()->enum('status', ItemStatus::class));
        }

        return $next($query);
    }
}
