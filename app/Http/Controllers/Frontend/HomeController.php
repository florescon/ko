<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Product;
use App\Models\Frontend\Image;
use App\Models\Line;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = Product::onlyProducts()
            ->with('children', 'line')
            ->whereNull('parent_id')
            ->onlyActive()
            ->inRandomOrder()
            ->limit(12)
            ->get();

        $lines = Line::orderBy('name', 'asc')->limit(12)->get();

        return view('frontend.index_ku')->with(compact('products', 'lines'));
    }
}
