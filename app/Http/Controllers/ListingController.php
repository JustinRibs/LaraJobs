<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListingController extends Controller
{
    // show all listings
    public function index(){
        // dd(Listing::latest()->filter(request(['tag', 'search']))->get());
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6)
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
        // dd($request->file('logo'));
        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required|unique:listings,company',
            'location' => 'required',
            'email' => 'required|email',
            'website' => 'required|url',
            'tags' => 'required',
            'description' => 'required',
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        // assign listing to specific user
        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);
        return redirect('/')->with('message', 'Listing created, looks good!');
    }

    // show edit form
    public function edit(Listing $listing){
        return view('listings.edit', [
            'listing' => $listing,
        ]);
    }

    // Updates listing
     public function update(Request $request, Listing $listing){
        // dd($listing->company);
        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'email' => 'required|email',
            'website' => 'required|url',
            'tags' => 'required',
            'description' => 'required',
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }
        $listing->update($formFields);
        return back()->with('message', 'Listing updated!');
    }

    // Delete Listing
    public function destroy(Listing $listing){
        $listing->delete();

        return redirect('/')->with('message', 'Listing deleted!');
    }

    // show manage form
    public function manage(Listing $listing) {
        return view('listings.manage', [
            'listing' => $listing,
        ]);
    }

}


?>
