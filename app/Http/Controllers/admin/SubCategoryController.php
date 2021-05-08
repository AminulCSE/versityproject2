<?php

namespace App\Http\Controllers\Admin;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function allSubCategroy(){
    	$sub_category_data = DB::table('sub_categories')
    						->orderBy('id', 'DESC')
    						->join('categories', 'sub_categories.category_id', '=', 'categories.id')
            				->select('sub_categories.*', 'categories.category_name')
    						->get();
    	return view('admin.subcategory.all_sub_category', compact('sub_category_data'));
    }

    public function addSubCategroy(){
    	$all_category_id = DB::table('categories')->where('status', '1')->get();
    	return view('admin.subcategory.add_sub_category', compact('all_category_id'));
    }

    public function storeSubCategroy(Request $request){
    	$validatedData 	= $request->validate([
	        'sub_category_name' => 'required|unique:sub_categories|max:255',
	        'category_id' 		=> 'required',
	    ]);

	    $data = array();

	    $data['sub_category_name'] 	= $request->sub_category_name;
	    $data['category_id'] 		= $request->category_id;

	    $insert = DB::table('sub_categories')->insert($data);
	    return back()->with('message', 'Sub Category Insert Success!');
    }



    public function editSubCategroy($id){
    	$all_category 	= DB::table('categories')->where('status', '1')->get();
	    $edit_sub_category = DB::table('sub_categories')->where('id', $id)->first();
	    return view('admin.subcategory.edit_sub_category', compact('edit_sub_category', 'all_category'));
    }

    public function updateSubCategory(Request $request, $id){
    	$validatedData = $request->validate([
	        'sub_category_name' 	=> 'required|max:255',
	        'category_id' 			=> 'required',
	        'status' 				=> 'required',
	    ]);
	    $update_data = array();

	    $update_data['sub_category_name'] 	= $request->sub_category_name;
	    $update_data['category_id'] 		= $request->category_id;
	    $update_data['status'] 				= $request->status;

	    $update = DB::table('sub_categories')->where('id', $id)->update($update_data);
	    return back()->with('message', 'Sub Category Updated Success!');
    }

    public function deleteSubCategory($id){
	    DB::table('sub_categories')->where('id', $id)->delete();
	    return back()->with('message', 'Sub Category Deleted Successfully!');
    }
}