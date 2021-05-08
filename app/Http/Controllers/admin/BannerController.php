<?php

namespace App\Http\Controllers\admin;
use DB;
use Image;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function allBanner(){
    	$all_banner = DB::table('banners')
    				->orderBy('id', 'DESC')
    				->get();
    	return view('admin.banner.all_banner', compact('all_banner'));
    }

    public function addBanner(){
    	return view('admin.banner.add_banner');
    }
// ------------------------------Insert-----------------------------------------

    public function storeBanner(Request $request){
    	$validatedData = $request->validate([
	        'image'    => 'required|mimes:jpeg,png,PNG,JPG,jpg,gif|max:2048',
    	]);

    	$data = array();

		if($request->has('image')){
    	$img1 		= $request->file('image');
	    $name_gen 	= hexdec(uniqid()).'.'.$img1->getClientOriginalExtension();
	    Image::make($img1)->resize(847.5,250)->save('public/frontend/images/banner/'.$name_gen);
	    $img_url1 	= 'public/frontend/images/banner/'.$name_gen;

	    $data['image'] 		= $img_url1;

	    DB::table('banners')->insert($data);
	    return back()->with('message', 'Banner Inserted Successfully');
		}
	}



// ------------------------------Edit-----------------------------------------
    public function editBanner($id){
	    $edit_banner 	= DB::table('banners')->where('id', $id)->first();
	    return view('admin.banner.edit_banner', compact('edit_banner'));
    }



// ------------------------------Update-----------------------------------------
    public function updateBanner(Request $request, $id){
    	$validatedData = $request->validate([
	        'image' 	  	=> 'mimes:jpeg,png,PNG,JPG,jpg,gif|max:2048',
	        'status' 	  	=> 'required',
    	]);

    	$data = array();
	    $data['status'] = $request->status;

		$old_img1 	= $request->old_img1;


		if($request->has('image')){
			if($old_img1){
				unlink($old_img1);
			}

	    	$img_one1 = $request->file('image');
		    $name_gen = hexdec(uniqid()).'.'.$img_one1->getClientOriginalExtension();
		    Image::make($img_one1)->resize(847.5,250)->save('public/frontend/images/banner/'.$name_gen);
		    $img_url1 = 'public/frontend/images/banner/'.$name_gen;

		    $data['image'] 		= $img_url1;
	    	DB::table('banners')->where('id', $id)->update($data);
	    	return back()->with('message', 'Banner Updated Successfully!, Image Three');
		}

		if(!$request->has('image1')){
			DB::table('banners')->where('id', $id)->update($data);
	    	return back()->with('message', 'Banner Updated Successfully!, Without Image');
		}
	}


// ------------------------------Delete-----------------------------------------

	public function deleteBanner($id){
        $del_product = DB::table('banners')->where('id', $id)->first();
        $image = $del_product->image;

    	if(file_exists($image) AND !empty($image)){
			unlink($image);
		}
		$del_pro = DB::table('banners')->where('id', $id)->delete();
		
        return back()->with('message', 'Banner Deleted Successfully! With image');
    }
}
