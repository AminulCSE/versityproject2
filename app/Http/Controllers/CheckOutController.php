<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use DB;
use Auth;
use App\Shipping;
class CheckOutController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function checkoutadd(){
    	return view('website.checkout');
    }

    public function checkoutstore(Request $request){
    	$validatedData = $request->validate([
	        'name' 	  		=> 'required',
	        'mobile_no'		=> 'required',
	        'address'		=> 'required',
    	]);


    	// $data = array();
    	// $data['user_id'] 	= Auth::user()->id;
    	// $data['name'] 		= $request->name;
    	// $data['email'] 		= $request->email;
    	// $data['mobile_no'] 	= $request->mobile_no;
    	// $data['address'] 	= $request->address;

        $checkout = new Shipping();
        $checkout->user_id = Auth::user()->id;
        $checkout->name = $request->name;
        $checkout->email = $request->email;
        $checkout->mobile_no = $request->mobile_no;
        $checkout->address = $request->address;

    	$checkout->save();
    	// $insert_shipping = DB::table('shippings')->insert($data);
    	Session::put('shipping_id', $checkout->id);

    	return redirect()->to('customer/payment')->with('success', 'Shipping address Inserted');

    }
   
}
