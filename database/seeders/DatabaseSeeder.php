<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Quotation;
use App\Models\QuotationItem;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User 2',
            'email' => 'test2@example.com',
            'password' => bcrypt('sample246'),
            'user_role_id' => 2
        ]);

        // $sampleData = [
        //     [
        //         'itemId' => '1',
        //         'itemQuantity' => '3',
        //     ],
        //     [
        //         'itemId' => '2',
        //         'itemQuantity' => '3',
        //     ],
        //     [
        //         'itemId' => '3',
        //         'itemQuantity' => '2',
        //     ]
        // ];


        // $quotation = new Quotation();
        // $quotation->user_id = 1;
        // $quotation->Date_Quoted = now();
        // $quotation->save();

        // foreach ($sampleData as $data) {
        //     $quotationItem = new QuotationItem();
        //     $quotationItem->quotation()->associate($quotation);
        //     $quotationItem->item_id = $data['itemId'];
        //     $quotationItem->qi_count = $data['itemQuantity'];
        //     $quotationItem->save();
        // }

        // $category = new Category();
        // $category->category_name = 'headset';
        // $category->save();

        // $category = new Category();
        // $category->category_name = 'others';
        // $category->save();

        // $quotationItem = new QuotationItem();
        // $quotationItem->quotation()->associate($quotation);
        // $quotationItem->item_id = 2;
        // $quotationItem->qi_count = 3;
        // $quotationItem->save();
    }
}
