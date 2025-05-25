<?php

namespace App\Filters\Item;

class ByCategoryItem
{
    public function handle($query, $next)
    {
        if (request()->filled('categoryId')) {
            $query->where('category_id', request()->integer('categoryId'));
        }

        return $next($query);
    }
}
