<?php

namespace App\Http\Controllers;

use App\Models\Processor;
use \Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProcessorController extends Controller
{
    public function index()
    {

        $processors = Processor::withCount('item')->get();

        // return $processors->load('item');
        // return $processors;
        return view('dashboard.items.processor-page', ['processors' => $processors]);
    }

    public function userIndex($processorId, $categoryId)
    {
        $items = Processor::with([
            'items' => fn ($query) => $query->where('category_id', '=', $categoryId),
            'items.category'
        ])->find($processorId);

        return $items;
    }

    public function processorItems($id)
    {
        $processors = Processor::find($id);

        // dd($processors->item);
        // return $processors->item;
        return $processors->load('items');
    }
}
