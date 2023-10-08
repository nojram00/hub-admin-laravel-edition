<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Quotation;
use App\Models\QuotationItem;
use Exception;
use \Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use function PHPSTORM_META\map;

class QuotationController extends Controller
{
    //
    public function index()
    {

        $quotations = Quotation::with(['user'])->get(); //call both user and item relation
        $categories = Category::all();
        // return $quotation;
        return view('dashboard.new.quotations', ['quotations' => $quotations, 'categories' => $categories->load('items'),]);
    }

    public function userQuotationIndex($processorId)
    {
        $categories = Category::with([
            'items' => fn ($q) => $q->where('processor_id', '=', $processorId),
            'items.processor'
        ])->get();

        // return $categories;
        return view('users.user-quotation', ['categories' => $categories]);
    }

    public function fullList()
    {
        $quotation = Quotation::with(['user', 'quotationItems.item'])->get(); //call both user and item relation
        return $quotation;
    }
    public function itemQuotationDetails($id)
    {
        // $result = Quotation::with(['quotationItems.item'])
        //     ->withSum(['quotationItems.item' => function ($query) {
        //         $query->select(DB::raw('SUM(item.bundle_price * qi_count)'));
        //     }], 'item_total')->find($id);
        $result = Quotation::find($id);
        // dd($result);
        if ($result) {
            return $result->load('quotationItems.item.category');
        }

        return response()->json(['error' => 'No Quotations Found'], 404);
        // dd($result);
    }

    public function submitQuotation(Request $request)
    {
        DB::beginTransaction();
        try {

            //create new quotation Instance
            $quotation = new Quotation();
            $quotation->user_id = 2;
            $quotation->Date_Quoted = now();
            $quotation->save();

            //create item quotations
            foreach ($request->input('items') as $req) {
                $quotationItem = new QuotationItem();
                $quotationItem->quotation()->associate($quotation);
                $quotationItem->item_id = $req['itemId'];
                $quotationItem->qi_count = $req['itemQuantity'];
                $quotationItem->save();
            }

            // $reqs = [];

            DB::commit();

            return response()->json([
                'success' => true,
                'data' => $request
            ], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => "error" . $e->getMessage(),
                'data' => $request,
            ], 500);
        }
    }

    public function submitUserQuotation(Request $requests)
    {

        DB::beginTransaction();
        try {

            $quotation = new Quotation();
            $quotation->user_id = 2;
            $quotation->Date_Quoted = now();
            $quotation->save();

            foreach ($requests->input('quotations') as $request) {
                $quotationItem = new QuotationItem();
                $quotationItem->quotation()->associate($quotation);
                $quotationItem->item_id = $request['item_id'];
                $quotationItem->qi_count = 5;
                $quotationItem->save();
            }

            DB::commit();
            return response()->json([
                'success' => true,
                'data' => $request
            ], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => "error" . $e->getMessage(),
                'data' => $request,
            ], 500);
        }

        // return $request;
    }
}
