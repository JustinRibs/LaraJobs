<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

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
    return view('listings', [
        'heading' => 'Latest Listings',
        'listings' => Listing::all(),
    ]);
});

// Single listing
Route::get('/listings/{id}', function ($id) {
    // dd($id);
    return view('listing', [
        'listing' => Listing::find($id),
    ]);
});

// Route::get('/hello', function () {
//     // return 'LARAVEL LARAVEL';
//     return response("<h1>yoyoyo</h1>",200)
//     ->header('COntent-Type', 'text/plain')
//     ->header('foo', 'bar');
// });

// Route::get('/posts/{id}', function($id){
//     // ddd($id);
//     return response('Post' . $id);
// })->where('id', '[0-9]+');

// Route::get('/search', function(Request $request){
//     return $request->name . ' ' . $request->age;
// });
