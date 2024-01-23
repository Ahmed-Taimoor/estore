<?php

namespace App\Http\Controllers;

use App\Enums\HomeProducts;
use App\Models\Catagory;
use App\Models\HomeProduct;
use App\Models\SubCatagory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {

        $user = auth()->user();


        $featuredProducts = HomeProduct::where('type', HomeProducts::FEATURED_PRODUCTS)->get();
        $newArrivalProducts = HomeProduct::where('type', HomeProducts::NEWARRIVAL_PRODUCTS)->get();
        $bestSellerProducts = HomeProduct::where('type', HomeProducts::BESTSELLER_PRODUCTS)->get();
        $exploreProducts = HomeProduct::where('type', HomeProducts::EXPLORE_PRODUCTS)->get();

        return view("welcome", [
            'user' => $user,
            'categories' => Catagory::all(),
            'subCategories' => SubCatagory::all(),
            'featuredProducts' => $featuredProducts,
            'newArrivalProducts' => $newArrivalProducts,
            'bestSellerProducts' => $bestSellerProducts,
            'exploreProducts' => $exploreProducts,

        ]);

    }
}