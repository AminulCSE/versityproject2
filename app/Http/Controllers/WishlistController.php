<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
class WishlistController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function addWishList($product_id){
    	if (Auth::check()) {
    		$data = array();
	    	$data['user_id'] 	= Auth::user()->id;
	    	$data['product_id'] = $product_id;

	    	$wishlists = DB::table('wishlists')
	    				->where('product_id', $product_id)
	    				->where('user_id', Auth::user()->id)
	    				->first();
	    	if ($wishlists==true) {
	    		return redirect()->back()->with('error', 'You are already added wishlist!');
	    	}else{
	    		$insert_wishlist = DB::table('wishlists')->insert($data);
	    		return redirect()->back()->with('success', 'Wishlist added successfully');
	    	}

	    	
    	}else{
    		return redirect()->route('login')->with('error', 'Please login before to add wishlits of product');
    	}
    }

    public function showWishList($id){
    	$get_wishlist = DB::table('wishlists')
    					->join('products', 'wishlists.product_id', 'products.id')
    					->where('wishlists.user_id', $id)
    					->get();
    	return view('website.wishlist', compact('get_wishlist'));
    }

    public function deleteWishlist($id){
    	$deleteWishlist = DB::table('wishlists')
    					->where('user_id', Auth::user()->id)
    					->where('product_id', $id)
    					->delete();
    	return redirect()->back()->with('success', 'Wishlist Product deleted successfully');
    }
}
