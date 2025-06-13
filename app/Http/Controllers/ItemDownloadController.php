<?php

namespace App\Http\Controllers;

use App\Enums\ItemStatus;
use App\Filters\ItemFilter;
use App\Models\Item;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ItemDownloadController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $filter = new ItemFilter(
            categoryId: $request->integer('categoryId'),
            kondisi: $request->enum('kondisi', ItemStatus::class),
            fields: $request->array('fields')
        );

        $items = Item::query()
            ->with('category')
            ->tap($filter)
            ->orderBy('created_at', 'desc')
            ->get();

        $pdf = Pdf::loadView(
            'pdfs.all-item',
            [
                'items' => $items,
                'office' => \App\Models\Office::first() ?? null,
                'signatureDate' => $request->date('signatureDate') ?? null,
            ]
        )->setPaper(
            'a4',
            'landscape'
        );

        return $pdf->download();
    }
}
