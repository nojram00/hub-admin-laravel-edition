<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProcessorController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\SampleController;
use App\Models\Category;
use App\Models\Processor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    // return view('dashboard.new.main');
    // return view('star-dash-partials.template');
    // return view('star-dash-partials.index');
    return view('users.landing-page');
})->name('admin-dashboard');

// Auth::routes();

Route::get('/auth/{endpoint}', [AuthController::class, 'index']);
Route::post('/loginUser', [AuthController::class, 'loginUser']);

Route::post('/sample', [SampleController::class, 'test']);
Route::get('/sample2', [SampleController::class, 'test2']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::group(['middleware' => ['auth']],function(){

//items
Route::get('/dashboard/main', function () {
    $categories = Category::all();
    return view('dashboard.new.main', ['categories' => $categories]);
})->name('admin-dashboard');
Route::get('/dashboard/items/{id}', [ItemController::class, 'index'])->name('Items: ');
Route::post('/submitItemForm', [ItemController::class, 'submitItem']);
Route::get('/error', [ItemController::class, 'error']);
Route::get('/item/{id}', [ItemController::class, 'itemFetcher']);
Route::get('/itemImage/{id}', [ItemController::class, 'getImage']);
Route::delete('/deleteItem/{id}', [ItemController::class, 'deleteItem']);

Route::get('/categoryItem/{id}', [ItemController::class, 'itemByCategory']);

//Processors
Route::get('/dashboard/processors', [ProcessorController::class, 'index']);
Route::get('/processorItems/{id}', [ProcessorController::class, 'processorItems']);

//Categories
Route::get('/dashboard/categories', [CategoryController::class, 'index']);
Route::get('/itemCategory/{id}', [CategoryController::class, 'categoryItem']);

//CategoryList
Route::get('/viewCategories', [CategoryController::class, 'categoryList']);

//Quotation
Route::get('/dashboard/quotations', [QuotationController::class, 'index'])->name('quotations');
Route::get('/quotations/list', [QuotationController::class, 'fullist']);
Route::get('/quotations/details/{id}', [QuotationController::class, 'itemQuotationDetails']);

//test
Route::post('/submitQuotation', [QuotationController::class, 'submitQuotation']);


//user page:
Route::get('/quotations/{processorId}', [QuotationController::class, 'userQuotationIndex']);
Route::get('/products/{categoryId}', [CategoryController::class, 'userIndex']);
//submit quotation:
Route::post('/user/submitQuotation', [QuotationController::class, 'submitUserQuotation']);
