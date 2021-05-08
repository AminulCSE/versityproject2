<?php
namespace App\Http\Controllers\admin;
use DB;
use Image;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }


    public function allLogo(){
    	$all_logo = DB::table('logos')
    				->orderBy('id', 'DESC')
    				->get();
    	return view('admin.logo.all_logo', compact('all_logo'));
    }

    public function addLogo(){
    	return view('admin.logo.add_logo');
    }

    public function storeLogo(Request $request){
    	$validatedData = $request->validate([
	        'image'    => 'required|mimes:jpeg,png,PNG,JPG,jpg,gif|max:2048',
    	]);

    	$data = array();

		if($request->has('image')){
    	$img1 		= $request->file('image');
	    $name_gen 	= hexdec(uniqid()).'.'.$img1->getClientOriginalExtension();
	    Image::make($img1)->resize(250,150)->save('public/frontend/images/logo/'.$name_gen);
	    $img_url1 	= 'public/frontend/images/logo/'.$name_gen;

	    $data['image'] 		= $img_url1;

	    DB::table('logos')->insert($data);
	    return back()->with('message', 'Logo Inserted Successfully');
		}
	}


	// ------------------------------Edit-----------------------------------------
    public function editLogo($id){
	    $edit_logo 	= DB::table('logos')->where('id', $id)->first();
	    return view('admin.logo.edit_logo', compact('edit_logo'));
    }



    // ------------------------------Update-----------------------------------------
    public function updateLogo(Request $request, $id){
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
		    Image::make($img_one1)->resize(250,150)->save('public/frontend/images/logo/'.$name_gen);
		    $img_url1 = 'public/frontend/images/logo/'.$name_gen;

		    $data['image'] 		= $img_url1;
	    	DB::table('logos')->where('id', $id)->update($data);
	    	return back()->with('message', 'logo Updated Successfully!, Image Three');
		}

		if(!$request->has('image1')){
			DB::table('logos')->where('id', $id)->update($data);
	    	return back()->with('message', 'logo Updated Successfully!, Without Image');
		}
	}


// ------------------------------Delete-----------------------------------------

	public function deleteLogo($id){
        $del_logo = DB::table('logos')->where('id', $id)->first();
        $image = $del_logo->image;

    	if(file_exists($image) AND !empty($image)){
			unlink($image);
		}
		$del_logo_front = DB::table('logos')->where('id', $id)->delete();
		
        return back()->with('message', 'Logo Deleted Successfully! With image');
    }
}
