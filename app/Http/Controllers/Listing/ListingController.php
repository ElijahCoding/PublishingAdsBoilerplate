<?php

namespace App\Http\Controllers\Listing;

use App\{Area, Category, Listing};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreListingFormRequest;
use App\Jobs\UserViewedListing;

class ListingController extends Controller
{
    public function index(Area $area, Category $category)
    {
        $listings = Listing::with(['user', 'area'])->isLive()->inArea($area)->fromCategory($category)->latestFirst()->paginate(10);

        return view('listings.index', compact('listings', 'category'));
    }

    public function show(Request $request, Area $area, Listing $listing)
    {
      if (!$listing->live()) {
        abort(404);
      }

      // Log view
      if ($request->user()) {
        dispatch(new UserViewedListing($request->user(), $listing));
      }


      return view('listings.show', compact('listing'));
    }

    public function create()
    {
      return view('listings.create');
    }

    public function store(StoreListingFormRequest $request, Area $area, Listing $listing)
    {
      $listing = new Listing;
      $listing->title = $request->title;
      $listing->body = $request->body;
      $listing->category_id = $request->category_id;
      $listing->area_id = $request->area_id;
      $listing->user()->associate($request->user());
      $listing->live = false;

      $listing->save();

      return redirect()->route('listings.edit', [$area, $listing]);
    }

    public function edit(Request $request, Area $area, Listing $listing)
    {
      // $this->authorize('edit', $listing);
      if ($listing->user_id === auth()->user()->id) {
        return view('listings.edit', compact('listing'));
      }
    }

    public function update(StoreListingFormRequest $request, Area $area, Listing $listing)
    {
      if ($listing->user_id === auth()->user()->id) {
        $listing->title = $request->title;
        $listing->body = $request->body;

        if (!$listing->live()) {
            $listing->category_id = $request->category_id;
        }

        $listing->area_id = $request->area_id;

        $listing->save();

        return back()->withSuccess('Listing edited successfully.');
      }
    }
}
