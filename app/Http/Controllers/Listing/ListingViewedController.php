<?php

namespace App\Http\Controllers\Listing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListingViewedController extends Controller
{
    public function __construct()
    {
      return $this->middleware(['auth']);
    }

    public function index(Request $request)
    {

    }
}
