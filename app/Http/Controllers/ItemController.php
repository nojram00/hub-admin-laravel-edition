<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Processor;
use \Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index($id)
    {
        $categories = Category::all();
        $processors = Processor::all();
        // session()->id();

        // dd($items);
        $item = Category::with('items.processor')->find($id);

        return view(
            'dashboard.new.items',
            [
                'items' => $item,
                'processors' => $processors,
                'categories' => $categories,
            ]
        );
    }

    public function userIndex()
    {
        $items = Item::all();

        return $items;
    }



    public function itemByCategory($id)
    {
        $item = Category::with('items.processor')->find($id);

        $item = Category::find($id);

        // return $item->load('items');
        return $item->items->load('processor');
    }

    public function submitItem(Request $request)
    {
        // Item::create([
        //     // $request->item_name => 'item_name',
        //     $request->item_quantity => 'item_qty',
        //     $request->item_price => 'item_price',
        //     $request->processor => 'processor_id',
        //     $request->category => 'category_id'
        // ]);
        // if ($request->hasFile('item_image')) {
        //     $file = $request->file('item_image');
        //     $f = file_get_contents($file->getRealPath());
        //     dd($f);

        //     // return;
        // }


        DB::beginTransaction();
        try {
            $item = new Item();

            $item->item_name = $request->item_name;
            $item->item_qty = $request->item_quantity;
            $item->single_price = $request->single_price;
            $item->bundle_price = $request->bundle_price;
            $item->processor_id = $request->processor;
            $item->category_id = $request->category;
            // $item->data_string = base64_encode($request->item_image);
            // $item->image_data = $request->item_image; //it should be image blob data
            // $request->file('item_image')->storeAs('item_images', $request->item_name);

            if ($request->hasFile('item_image')) {
                $file = $request->file('item_image');
                if ($file->isValid()) {
                    $path = $file->storeAs('item_images', $request->item_name);
                    $item->data_string = $path;

                    $item->image_data = file_get_contents($file->getRealPath());
                }

                // $item->image_data = file_get_contents($file->getRealPath());
            }

            $item->save();

            DB::commit();
            return back();
        } catch (Exception $e) {
            // echo $e;
            DB::rollBack();
            return redirect('/error');
        }


        // return $item;
    }
    public function error()
    {
        return view('dashboard.errror.error');
    }

    //fetch items
    public function itemFetcher($id)
    {
        $result = Item::find($id);

        $finalres = $result->load('category');

        // $finalres->image_data = mb_convert_encoding($finalres->image_data, 'UTF-8');
        // dd($result);

        if ($result) {
            return $finalres->makeHidden(['image_data']);
        } else {
            return redirect('/error');
        }
    }

    public function getImage($id)
    {
        $result = Item::find($id);

        // dd($result->image_data);
        if ($result && $result->image_data) {
            return response($result->image_data, 200)->header('Content-type', 'image/png');
            // return $result;
        } else {
            // return redirect('/error');
            return response([
                'success' => false,
            ], 200);
        }
    }
    public function deleteItem($id)
    {
        $item = Item::find($id);

        if ($item) {
            $item->delete();
            return response()->json(['message' => 'success'], 200);
        } else {
            return response()->json(['message' => 'error: failed'], 404);
        }
    }
}
