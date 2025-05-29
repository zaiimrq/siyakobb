<?php

namespace App\Filters;

use App\Enums\ItemStatus;
use Illuminate\Database\Eloquent\Builder;

class ItemFilter
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public ?string $categoryId = null,
        public ?ItemStatus $kondisi = null,
        public ?array $fields = null,
    ) {
        //
    }

    public function __invoke(Builder $query)
    {

        if ($this->fields) {
            $query->select([...$this->fields, 'category_id']);
        }

        if ($this->categoryId) {
            $query->where('category_id', $this->categoryId);
        }

        if ($this->kondisi) {
            $query->where('kondisi_awal', $this->kondisi);
        }

        return $query;
    }
}
