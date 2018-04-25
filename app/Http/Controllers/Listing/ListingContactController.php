<?php

namespace App\Http\Controllers\Listing;

use App\Area;
use App\Listing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreListingContactFormRequest;

class ListingContactController extends Controller
{
    public function __construct()
    {
       return $this->middleware(['auth']);
    }

    public function store(StoreListingContactFormRequest $request, Area $area, Listing $listing)
    {
      
    }
}
