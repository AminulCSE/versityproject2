<?php

namespace App\Http\Controllers\Admin;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Slider;
class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function allSlider(){
    	$slider_data = DB::table('sliders')->orderBy('id', 'DESC')->get();
    	return view('admin.slider.all_slider', compact('slider_data'));
    }

    public function addSlider(){
    	return view('admin.slider.add_slider');
    }

    public function storeSlider(Request $request){
    	$validatedData = $request->validate([
	        'title'			=> 'required|min:5',
	        'description'	=> 'required|max:255|min:2',
	        'image' 	  	=> 'required|image|mimes:jpeg,png,PNG,JPG,jpg,gif|max:2048'
    	]);

	    $slider = new Slider;
	    $slider->title			= $request->title;
	    $slider->description	= $request->description;
	    $image                  = $request->file('image');
            $image_name         = hexdec(uniqid());
            $ext                = strtolower($image->getClientOriginalExtension());
            $image_full_name    = $image_name.'.'.$ext;
            $upload_path        = 'public/frontend/images/slider/';
            $image_url          = $upload_path.$image_full_name;
            $success            = $image->move($upload_path, $image_full_name);
            $slider->image    	= $image_url;
            $slider->save();
            return back()->with('message', 'Slider Insert Success!');
    }

    public function editSlider($id){
	    $edit_slider = DB::table('sliders')->where('id', $id)->first();
	    return view('admin.slider.edit_slider', compact('edit_slider'));
    }


    public function updateSlider(Request $request, $id){
    	$validatedData = $request->validate([
	        'title'			=> 'required|min:3',
	        'status'		=> 'required',
	        'description'	=> 'required|max:255|min:3',
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
            $upload_path        = 'public/frontend/images/slider/';
            $image_url 			= $upload_path.$image_full_name;
            $success 			= $image->move($upload_path, $image_full_name);
            $update_data['image']= $image_url;
            unlink($request->oldimage);
            DB::table('sliders')->where('id', $id)->update($update_data);
            return back()->with('message', 'Slider Updated Success!');
        }else{
            $update_data['image'] 	= $request->oldimage;
            DB::table('sliders')->where('id', $id)->update($update_data);
            return back()->with('message', 'Slider Updated Successfully! Without Image');
        }           
    }


    public function deleteSlider($id){
    	$slider_delete = DB::table('sliders')->where('id', $id)->first();
    	$image = $slider_delete->image;

    	$delete_slider = DB::table('sliders')->where('id', $id)->delete();
        if ($delete_slider) {
        	unlink($image);
            return back()->with('message', 'Slider Deleted Success!');
		}
    }
}
