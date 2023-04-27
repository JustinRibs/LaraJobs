<?php

use App\Http\Controllers\ListingController;
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


// Most common Routes:
// index - show all listings
// show - single listing
// create - create a listing
// store - store a listing
// edit - show form to edit listing
// update - update listing
// destroy - delete listing

// All listings
Route::get('/', [ListingController::class, 'index']);

// Show create Listing
Route::get('/listings/create', [ListingController::class, 'create']);

// Store new listing
Route::post('/listings', [ListingController::class, 'store']);


// Single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);


