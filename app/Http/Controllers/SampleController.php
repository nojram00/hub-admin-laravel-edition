<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Processor;
use App\Models\Quotation;
use App\Models\QuotationItem;
use Illuminate\Http\Request;

class SampleController extends Controller
{
    public function test(Request $request)
    {
        // $items = Category::find(2);

        // return $items->load('item');

        // $processor = Processor::withCount('item')->find(2);

        // return $processor->load('item');

        // $processor = Processor::withCount('item')->get();

        // return $processor->load('item');

        // $quotation = Quotation::all();
        // $quotationItem = Item::all();


        // return $quotation->load('item');

        // foreach ($quotationItem as $q) {
        //     $qi = $q->itemQuotation;
        // }
        // return $qi;
        // return $quotationItem->itemQuotation;
        // return $quotationItem->load('itemQuotation');

        // $quotationItem = QuotationItem::all();
        // return $quotationItem->load('item');

        // $quotation = Quotation::with('quotationItem.item')->get(); // use to call quotation item relation with item
        // $quotation = Quotation::with('user')->get(); //use to call user relation
        // $quotation = Quotation::with(['user', 'quotationItems.item'])->get(); //call both user and item relation
        // return $quotation;
        // dd($quotation->quotationItems);

        // foreach ($quotation as $q) {
        //     echo $q->quotation_items; //returns null
        //     foreach ($q->quotation_items as $item) {
        //         echo $item->item_name;
        //     }
        // }
        // dd($id);
        // return $id;

        // return $quotation->load('quotation')->load('item');

        // $quotations = Quotation::with('quotationItems')->get();

        // return $quotations;


        return $request;
    }

    public function test2()
    {
        $items = Item::join('categories', 'categories.id', '=', 'items.category_id')
            ->get();
        return ($items);
    }
}
