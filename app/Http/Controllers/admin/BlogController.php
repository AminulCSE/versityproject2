<?php

namespace App\Http\Controllers\admin;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;
use Illuminate\Support\Facades\Auth;
class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function allBlog(){
    	$blog_data = DB::table('blogs')->orderBy('id', 'DESC')->get();
    	return view('admin.blog.all_blog', compact('blog_data'));
    }

    public function addBlog(){
    	return view('admin.blog.add_blog');
    }

    public function storeBlog(Request $request){
    	$validatedData = $request->validate([
	        'title'			=> 'required|min:5',
	        'description'	=> 'required|min:2',
	        'image' 	  	=> 'required|image|mimes:jpeg,png,PNG,JPG,jpg,gif|max:2048'
    	]);

	    $slider = new Blog;
	    $slider->title			= $request->title;
	    $slider->description	= $request->description;
        $slider->user_id        = Auth::user()->id;

	    $image                  = $request->file('image');
            $image_name         = hexdec(uniqid());
            $ext                = strtolower($image->getClientOriginalExtension());
            $image_full_name    = $image_name.'.'.$ext;
            $upload_path        = 'public/frontend/images/blog/';
            $image_url          = $upload_path.$image_full_name;
            $success            = $image->move($upload_path, $image_full_name);
            $slider->image    	= $image_url;
            $slider->save();
            return back()->with('message', 'Blog Insert Success!');
    }

    public function editBlog($id){
	    $edit_blog = DB::table('blogs')->where('id', $id)->first();
	    return view('admin.blog.edit_blog', compact('edit_blog'));
    }


    public function updateBlog(Request $request, $id){
    	$validatedData = $request->validate([
	        'title'			=> 'required|min:5',
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
            $upload_path        = 'public/frontend/images/blog/';
            $image_url 			= $upload_path.$image_full_name;
            $success 			= $image->move($upload_path, $image_full_name);
            $update_data['image']= $image_url;
            unlink($request->oldimage);
            DB::table('blogs')->where('id', $id)->update($update_data);
            return back()->with('message', 'Blog Updated Success!');
        }else{
            $update_data['image'] 	= $request->oldimage;
            DB::table('blogs')->where('id', $id)->update($update_data);
            return back()->with('message', 'Blog Updated Successfully! Without Image');
        }           
    }


    public function deleteBlog($id){
    	$blog_del = DB::table('blogs')->where('id', $id)->first();
    	$image = $blog_del->image;

    	$delete_blog = DB::table('blogs')->where('id', $id)->delete();
        if ($delete_blog) {
        	unlink($image);
            return back()->with('message', 'Blog Deleted Success!');
		}
    }
}
