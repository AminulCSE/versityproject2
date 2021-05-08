<?php

namespace App\Http\Controllers\admin;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\OurService;
class OurServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewOurService(){
    	$all_ourservice = DB::table('our_services')
    					->get();
    	return view('admin.ourservice.all_ourservice', compact('all_ourservice'));
    }

    public function addOurService(){
    	return view('admin.ourservice.add_ourservice');
    }

    public function StoreOurService(Request $request){
    	$validatedData = $request->validate([
	        'title'			=> 'required',
	        'description'	=> 'required|min:2',
	        'image' 	  	=> 'required|image|mimes:jpeg,png,PNG,JPG,jpg,gif|max:2048'
    	]);

	    $ourservice = new OurService;
	    $ourservice->title			= $request->title;
	    $ourservice->description	= $request->description;
	    $image                  = $request->file('image');
            $image_name         = hexdec(uniqid());
            $ext                = strtolower($image->getClientOriginalExtension());
            $image_full_name    = $image_name.'.'.$ext;
            $upload_path        = 'public/frontend/images/ourservice/';
            $image_url          = $upload_path.$image_full_name;
            $success            = $image->move($upload_path, $image_full_name);
            $ourservice->image    	= $image_url;
            $ourservice->save();
            return back()->with('message', 'Our Service Insert Success!');
    }

    public function EditOurservice($id){
    	$edit_ourservice = DB::table('our_services')->where('id', $id)->first();
    	return view('admin.ourservice.edit_ourservice', compact('edit_ourservice'));
    }

    public function UpdateOurservice(Request $request, $id){
    	$validatedData = $request->validate([
	        'title'			=> 'required',
	        'status'		=> 'required',
	        'description'	=> 'required|min:2',
	        'image' 	  	=> 'image|mimes:jpeg,png,PNG,JPG,jpg,gif|max:2048'
    	]);

    	$update_data = array();
	    $update_data['title'] 			= $request->title;
	    $update_data['description'] 	= $request->description;
	    $update_data['status'] 			= $request->status;
	    $update_data['image']        	= $request->image;
        $image                 			= $request->file('image');

        if ($image){
            $image_name 		= hexdec(uniqid());
            $ext 				= strtolower($image->getClientOriginalExtension());
            $image_full_name 	= $image_name.'.'.$ext;
            $upload_path        = 'public/frontend/images/ourservice/';
            $image_url 			= $upload_path.$image_full_name;
            $success 			= $image->move($upload_path, $image_full_name);
            $update_data['image']= $image_url;
            unlink($request->oldimage);
            DB::table('our_services')->where('id', $id)->update($update_data);
            return back()->with('message', 'Our Services Updated Success!');
        }else{
            $update_data['image'] 	= $request->oldimage;
            DB::table('our_services')->where('id', $id)->update($update_data);
            return back()->with('message', 'Our Services Updated Successfully! Without Image');
        }           
    }


    public function DeleteOurservice($id){
    	$blog_del = DB::table('our_services')->where('id', $id)->first();
    	$image = $blog_del->image;

    	$delete_blog = DB::table('our_services')->where('id', $id)->delete();
        if ($delete_blog) {
        	unlink($image);
            return back()->with('message', 'Our Services Deleted Successfully!');
		}
    }
    
}
