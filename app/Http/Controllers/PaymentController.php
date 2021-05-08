<?php
namespace App\Http\Controllers;
use Session;
use DB;
use Auth;
use App\Payment;
use App\Order_info;
use App\Order;
use App\OrderDetails;
use App\Shipping;
use Cart;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function payment(){
        if(Cart::count()==NULL){
            return redirect()->to('showcart')->with('error', 'Please add product into cart!');
        }else{
    	   return view('website.customer_payment');
        }
    }

    public function payment_store(Request $request){
    	if ($request->product_id == NULL) {
    		return redirect()->to('showcart')->with('error', 'Please add product into cart!');
    	}else{
    		$validatedData = $request->validate([
	        'payment_method' => 'required',
	    	]);
                DB::transaction(function()use($request){
                $payment = new Payment();
                $payment->payment_method = $request->payment_method;
                $payment->transaction_no = $request->transaction_no;
                $payment->save();

                $order = new Order_info();
                $order->user_id = Auth::user()->id;
                $order->shipping_id = Session::get('shipping_id');
                $order->payment_id = $payment->id;

                $order_data = Order_info::orderBy('id', 'DESC')->first();
                if ($order_data == null) {
                    $firstReg = 0;
                    $order_no = $firstReg+1;
                }else{
                    $order_data = Order_info::orderBy('id', 'DESC')->first()->order_no;
                    $order_no = $order_data+1;
                }
                $order->order_no = $order_no;
                $order->order_total = $request->order_total;
                $order->status = '0';
                $order->save();

                $contents = Cart::content();
                foreach ($contents as $content) {
                    $order_details = new OrderDetails;
                    $order_details->order_id = $order->id;
                    $order_details->product_id = $content->id;
                    $order_details->size = $content->options->size;
                    $order_details->qty = $content->qty;
                    $order_details->save();
                }

            });
    	}
    	return redirect()->to('order_list')->with('success', 'Order completed and see your order list');
    }

    public function orderList(){
        if (Auth::check()) {
            $order_data = DB::table('order_infos')
                ->join('payments', 'order_infos.payment_id', 'payments.id')
                ->orderBy('order_infos.id', 'ASC')
                ->where('order_infos.user_id', Auth::user()->id)
                ->select('order_infos.*', 'payments.payment_method', 'payments.transaction_no')
                ->get();
            return view('website.customer_order', compact('order_data'));
        }else{
            return redirect()->to('/');
        }
    }



// Order Details here
    public function orderDetails($id){
    	if (Auth::check()) {
    		$get_order_details = DB::table('order_infos')
    			->where('id', $id)
    			->where('user_id', Auth::user()->id)
    			->first();
    	if($get_order_details == false){
    		return redirect()->back()->with('error', 'Do not try to be Over Smart!');
    	}else{
    		$get_order_details = DB::table('order_infos')
    			->join('shippings', 'order_infos.shipping_id', 'shippings.id')
    			->join('payments', 'order_infos.payment_id', 'payments.id')
    			->where('order_infos.id', $id)
    			->where('order_infos.user_id', Auth::user()->id)
    			->get();

    		$get_logo = DB::table('logos')->where('status', 1)->first();

    		$details = DB::table('order_details')
    					->where('order_details.order_id', $id)
    					->join('order_infos', 'order_details.order_id', 'order_infos.id')
    					->join('products', 'order_details.product_id', 'products.id')
    					->get();
    		return view('website.order_details', compact('get_order_details', 'get_logo', 'details'));
    	}
      }else{
      	return redirect()->to('showcart');
      }
    }


    //Order email varification
    public function VerifyEmail_Page(){
        return view('website.verify_email_to_order');
    }
    public function OrderVerifyCode(Request $request){
        $validatedData = $request->validate([
            'verify_code' => 'required',
            ]);

        $get_order_data = DB::table('orders')->where('verify_code', $request->verify_code)->first();
        if ($get_order_data) {
            $data = array();
            $data['verify_code'] = "0";
            $data['status'] = "verified";
            $update = DB::table('orders')->update($data);
        }else{
            return redirect()->to('verify_email_page')->with('error', 'সঠিক কোড ইনপুট করুন');
        }
        return redirect()->to('/')->with('success', 'আপনার অর্ডার ভেরিফাইড হয়েছে');
    } 


    // customer order delete by customer
    public function OrderDelete($id){
        
    }
}
