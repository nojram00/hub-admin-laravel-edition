<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categoryData = Category::withCount('items')->get();
        // $categoryData = Category::all();

        // dd($categoryData);
        return view('dashboard.items.category-page', ['categories' => $categoryData]);
    }

    public function userIndex($categoryId)
    {
        $items = Category::with(['items.processor', 'items.category'])->find($categoryId);

        return view('users.products-page', ['items' => $items]);
    }
    public function categoryItem($id)
    {
        $categories = Category::find($id);

        return $categories->load('items');
    }
    public function categoryList()
    {
        $categories = Category::all();

        return $categories;
    }
}
