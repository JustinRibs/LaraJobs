<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

// Most common Routes:
// index - show all listings
// show - single listing
// create - create a listing
// store - store a listing
// edit - show form to edit listing
// update - update listing
// destroy - delete listing

class ListingController extends Controller
{
    // show all listings
    public function index(){
        // dd(request('tag'));
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag']))->get()
        ]);
    }


    // show single listing
    public function show(Listing $listing){
        return view('listings.show', [
            'listing' => $listing,
        ]);

    }
}
