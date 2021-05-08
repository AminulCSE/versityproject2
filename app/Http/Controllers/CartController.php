<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Cart;
class CartController extends Controller
{
    public function add_to_cart(Request $request, $id){
    	$validatedData = $request->validate([
		    'qty' 			=> ['required'],
		    'product_name' 	=> ['required'],
		]);


		Cart::add([
			'id'=>$request->id,
			'qty'=>$request->qty,
			'price'=>$request->price,
			'name'=>$request->product_name,
			'weight'=>550,
			'options'=>[
				'image1'=>$request->image1,
				'product_code'=>$request->product_code,
				'size'=>$request->size,

			],
		]);
		return redirect()->to('showcart')->with('message', 'Cart Product added into Cart');
    }

    public function showCart(){
    	return view('website.show_cart');
    }

    public function updatecart(Request $request){
    	Cart::update($request->rowId, $request->qty);
    	return redirect()->to('showcart')->with('message', 'Cart Updated Cart');
    }


    public function destroycart($rowId){
    	Cart::remove($rowId);
    	return redirect()->to('showcart')->with('message', 'Cart Destroy Cart');
    }
}
