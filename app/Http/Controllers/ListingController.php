<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListingController extends Controller
{
    // show all listings
    public function index(){
        // dd(request('tag'));
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->get()
        ]);
    }


    // show single listing
    public function show(Listing $listing){
        return view('listings.show', [
            'listing' => $listing,
        ]);
    }

    // show create form
    public function create(){
        return view('listings.create');
    }

    // store new listing
    public function store(Request $request){
        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required|unique:listings,company',
            'location' => 'required',
            'email' => 'required|email',
            'website' => 'required|url',
            'tags' => 'required',
            'description' => 'required',
        ]);
        Listing::create($formFields);

        return redirect('/');
    }
}
