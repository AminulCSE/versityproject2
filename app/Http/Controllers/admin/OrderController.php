<?php

namespace App\Http\Controllers\admin;
use DB;
use App\Order;
use App\OrderDetails;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }


    public function Approved_Order(){
    	$approved_orders = DB::table('orders')
                        ->join('users', 'orders.user_id', 'users.id')
    					->orderBy('orders.id', 'ASC')
                        ->select('orders.*','users.name','users.email', 'users.mobile')
                        ->where('orders.status', 'verified')
    					->get();
    	return view('admin.orders.approved_orders', compact('approved_orders'));
    }

    public function Pending_Order(){
    	$pending_orders = DB::table('orders')
    					->join('users', 'orders.user_id', 'users.id')
    					->orderBy('orders.id', 'DESC')
                        ->select('orders.*','users.email','users.name','users.mobile')
                        ->where('orders.status', 'Processing')
    					->get();
    	return view('admin.orders.pending_orders', compact('pending_orders'));
    }

    // public function Order_Details($id){
    // 	$approved_order_details = DB::table('order_details')
    // 					->join('orders', 'order_details.order_id', 'orders.id')
    // 					->join('products', 'order_details.product_id', 'products.id')
    // 					->join('shippings', 'orders.shipping_id', 'shippings.id')
    // 					->join('payments', 'orders.payment_id', 'payments.id')
    //                     ->where('order_details.order_id', $id)
    // 					->get();
    // 	return view('admin.orders.approved_order_details', compact('approved_order_details'));
    // }




// Order Details here
    public function Approved_Order_Details($id){
        $get_approved_order = DB::table('orders')
            ->join('users', 'orders.user_id', 'users.id')
            ->select('orders.*','users.name', 'users.mobile')
            ->where('orders.id', $id)
            ->first();

        $approved_order_details = DB::table('order_details')
            ->join('orders', 'order_details.order_id', 'orders.id')
            ->join('products', 'order_details.product_id', 'products.id')
            ->where('order_details.order_id', $id)
            ->get();
        return view('admin.orders.approved_order_details', compact('get_approved_order', 'approved_order_details'));
        }



// Pending Order Details here
    public function pending_orders_details($id){
        $get_order = DB::table('order_infos')
            ->join('shippings', 'order_infos.shipping_id', 'shippings.id')
            ->join('payments', 'order_infos.payment_id', 'payments.id')
            ->join('users', 'order_infos.user_id', 'users.id')
            ->select('order_infos.*','payments.payment_method','payments.transaction_no','shippings.*','users.name', 'users.mobile')
            ->where('order_infos.id', $id)
            ->first();

        $get_order_details = DB::table('order_details')
            ->where('order_details.order_id', $id)
            ->join('order_infos', 'order_details.order_id', 'order_infos.id')
            ->join('products', 'order_details.product_id', 'products.id')
            ->get();
            return view('admin.orders.pending_order_details', compact('get_order', 'get_order_details'));
        }

// Pending Order Details here
    public function approved_orders_details($id){
        $get_order = DB::table('order_infos')
            ->join('shippings', 'order_infos.shipping_id', 'shippings.id')
            ->join('payments', 'order_infos.payment_id', 'payments.id')
            ->join('users', 'order_infos.user_id', 'users.id')
            ->select('order_infos.*','payments.*','shippings.*','users.name', 'users.mobile')
            ->where('order_infos.id', $id)
            ->first();

        $get_order_details = DB::table('order_details')
            ->where('order_details.order_id', $id)
            ->join('order_infos', 'order_details.order_id', 'order_infos.id')
            ->join('products', 'order_details.product_id', 'products.id')
            ->get();
            return view('admin.orders.approved_order_details', compact('get_order', 'get_order_details'));
        }


// Order invoice print
    public function approved_order_print($id){
        $get_approved_order_print = DB::table('order_infos')
            ->join('shippings', 'order_infos.shipping_id', 'shippings.id')
            ->join('payments', 'order_infos.payment_id', 'payments.id')
            ->join('users', 'order_infos.user_id', 'users.id')
            ->select('order_infos.*','payments.*','shippings.*','users.name', 'users.mobile')
            ->where('order_infos.id', $id)
            ->first();

        $approved_order_details = DB::table('order_details')
            ->join('order_infos', 'order_details.order_id', 'order_infos.id')
            ->join('products', 'order_details.product_id', 'products.id')
            ->where('order_details.order_id', $id)
            ->get();
        return view('admin.orders.approved_order_print', compact('get_approved_order_print', 'approved_order_details'));
    }



// Do approved order status
        public function approved_orders_status($order_no){
            $data = array();

            $data['status'] = 1;
            $order_status = DB::table('order_infos')->where('order_no', $order_no)->update($data);
            return back()->with('message', 'Order Approved Successfully');
        }


// Do Unapproved order status
        public function unapproved_order_status($order_no){
            $data = array();

            $data['status'] = 0;
            $order_status = DB::table('order_infos')->where('order_no', $order_no)->update($data);
            return back()->with('message', 'Order Unapprvoed Successfully');
        }

// order delete
        public function order_delete($id){
            $get_payment_id = DB::table('orders')->where('id', $id)->first();


            $order_details = DB::table('order_details')->where('order_id',$id)->get();
            if(count($order_details)>1){
                $order_get_id= [];
                foreach ($order_details as $i){
                    $order_get_id[] = $i->order_id;
                }
                for($i=0;$i<count($order_details);$i++){
                    $get_order_d = DB::table('order_details')->where('order_id', $order_get_id)->delete();
                }
            }
            elseif (count($order_details)==1)
            {
                $get_order_f = DB::table('order_details')->where('order_id', $order_get_id)->delete();
            }


            return back()->with('message', 'Order Deleted Successfully');
        }
}
