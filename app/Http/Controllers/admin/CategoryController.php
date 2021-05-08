<?php

namespace App\Http\Controllers\Admin;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function allCategroy(){
    	$category_data = DB::table('categories')->orderBy('id', 'DESC')->get();
    	return view('admin.category.all_category', compact('category_data'));
    }

    public function addCategroy(){
    	return view('admin.category.add_category');
    }

    public function storeCategroy(Request $request){
    	$validatedData 	= $request->validate([
	        'category_name' => 'required|unique:categories|max:255',
	    ]);
	    $data = array();

	    $data['category_name'] 	= $request->category_name;
	    $data['category_slug'] 	= $this->sluggen($request->category_name);
	    $insert = DB::table('categories')->insert($data);
	    return back()->with('message', 'Category Insert Success!');
    }



    public function editCategroy($id){
	    $edit_category = DB::table('categories')->where('id', $id)->first();
	    return view('admin.category.edit_category', compact('edit_category'));
    }

    public function updateCategory(Request $request, $id){
    	$validatedData = $request->validate([
	        'category_name' 	=> 'required|max:255',
	        'status' 			=> 'required',
	    ]);
	    $update_data = array();

	    $update_data['category_name'] 	= $request->category_name;
	    $update_data['status'] 			= $request->status;
	    $update_data['category_slug'] 	= $this->sluggen($request->category_name);
	    $update = DB::table('categories')->where('id', $id)->update($update_data);
	    return back()->with('message', 'Category Updated Success!');
    }

    public function deleteCategory($id){
	    DB::table('categories')->where('id', $id)->delete();
	    return back()->with('message', 'Category Deleted Successfully!');
    }


    

    

    public function sluggen($string){
	    $string = str_replace(' ', '-', $string);
	    $string = trim($string, '-');
	    return $string;
	}

    
}
