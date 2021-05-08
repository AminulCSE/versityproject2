<?php

namespace App\Http\Controllers\Admin;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function allCustomer(){
    	$allCustomer = DB::table('users')->where('is_admin', '0')->where('status',1)->get();
    	return view('admin.customer.all_customer', compact('allCustomer'));
    }


    public function stroDraft($id){
    	$data = array();
	    $data['status'] = '0';
    	$stroDraft = DB::table('users')->where('id', $id)->where('status', '1')->update($data);
    	return back()->with('message', 'Customer Drafted');
    }

    public function UnDraftCustomer($id){
    	$data = array();
	    $data['status'] = '1';
    	$stroUnDraft = DB::table('users')->where('id', $id)->where('status', '0')->update($data);
    	if ($stroUnDraft) {
    		return redirect()->to('customer/all_draft_customer')->with('message', 'Customer UnDrafted');
    	}else{
    		return redirect()->to('customer/all_draft_customer')->with('errormessage', 'Someting Went Wrong');
    	}
    }

    public function allDraftCustomer(){
	    $alldraftCustomer = DB::table('users')->where('is_admin', '0')->where('status',0)->get();
    	return view('admin.customer.all_draft_customer', compact('alldraftCustomer'));
    }


	public function deleteCustomer($id){
	    $alldraftCustomer = DB::table('users')
                            ->where('is_admin', 0)
                            ->where('status',0)
                            ->where('id',$id)
                            ->delete();
    	return redirect()->back()->with('message', 'Draft Customer Deleted Successfully');
    }


}
