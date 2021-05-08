<?php

namespace App\Http\Controllers\Admin;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function allProduct(){
    	$all_product = DB::table('products')
    				->orderBy('id', 'DESC')
    				->join('categories', 'products.category_id', '=', 'categories.id')
            		->select('products.*', 'categories.category_name')
    				->get();
    	return view('admin.product.all_product', compact('all_product'));
    }

    public function addProduct(){
    	$all_cat = DB::table('categories')->where('status', '1')->get();
    	return view('admin.product.add_product', compact('all_cat'));
    }
// ------------------------------Insert-----------------------------------------

    public function storeProduct(Request $request){
    	$validatedData = $request->validate([
	        'product_name'	=> 'required',
	        'category_id'	=> 'required',
	        'price'			=> 'max:20',
	        'description'	=> 'required|min:2',
	        'size'			=> 'max:50',
	        'image1' 	  	=> 'required|mimes:jpeg,png,PNG,JPG,jpg,gif|max:2048',
	        'image2' 		=> 'mimes:jpeg,png,PNG,JPG,jpg,gif|max:2048',
	        'image3' 	  	=> 'mimes:jpeg,png,PNG,JPG,jpg,gif|max:2048',
    	]);

    	// return $request->all();

		

    	$data = array();
	    $data['product_name'] 	= $request->product_name;

	 //    $string  				= $request->product_name;
		// $pieces 				= explode(" ", $string);
		// $str="";
		// foreach($pieces as $piece)
		// {
		//     $str.=$piece[0];
		// }

	    $data['product_code'] 	= floor(time()-999999999);
	    $data['category_id'] 	= $request->category_id;
	    $data['price'] 			= $request->price;
	    $data['product_slug'] 	= str_replace(' ', '_', $request->product_name);
	    $data['description'] 	= $request->description;
	    $data['size'] 			= $request->size;

    	if($request->has('image1') && $request->has('image2') && $request->has('image3')){
    	$img1 		= $request->file('image1');
	    $name_gen 	= hexdec(uniqid()).'.'.$img1->getClientOriginalExtension();
	    Image::make($img1)->resize(500,500)->save('public/frontend/images/product/'.$name_gen);
	    $img_url1 	= 'public/frontend/images/product/'.$name_gen;

	    $img2 		= $request->file('image2');
	    $name_gen 	= hexdec(uniqid()).'.'.$img2->getClientOriginalExtension();
	    Image::make($img2)->resize(500,500)->save('public/frontend/images/product/'.$name_gen);
	    $img_url2 	= 'public/frontend/images/product/'.$name_gen;

	    $img3 		= $request->file('image3');
	    $name_gen 	= hexdec(uniqid()).'.'.$img3->getClientOriginalExtension();
	    Image::make($img3)->resize(500,500)->save('public/frontend/images/product/'.$name_gen);
	    $img_url3 	= 'public/frontend/images/product/'.$name_gen;

	    $data['image1'] 		= $img_url1;
	    $data['image2'] 		= $img_url2;
	    $data['image3'] 		= $img_url3;
		
	    $product_insert = DB::table('products')->insert($data);
	    return back()->with('message', 'Product Inserted Successfully! With 3 Images');
		}

		if($request->has('image1') && $request->has('image2')){
    	$img1 		= $request->file('image1');
	    $name_gen 	= hexdec(uniqid()).'.'.$img1->getClientOriginalExtension();
	    Image::make($img1)->resize(500,500)->save('public/frontend/images/product/'.$name_gen);
	    $img_url1 	= 'public/frontend/images/product/'.$name_gen;

	    $img2 		= $request->file('image2');
	    $name_gen 	= hexdec(uniqid()).'.'.$img2->getClientOriginalExtension();
	    Image::make($img2)->resize(500,500)->save('public/frontend/images/product/'.$name_gen);
	    $img_url2 	= 'public/frontend/images/product/'.$name_gen;

	    $data['image1'] 		= $img_url1;
	    $data['image2'] 		= $img_url2;
		
	    $product_insert = DB::table('products')->insert($data);
	    return back()->with('message', 'Product Inserted Successfully! With 2 Images');
		}


		if($request->has('image1')){
    	$img1 		= $request->file('image1');
	    $name_gen 	= hexdec(uniqid()).'.'.$img1->getClientOriginalExtension();
	    Image::make($img1)->resize(500,500)->save('public/frontend/images/product/'.$name_gen);
	    $img_url1 	= 'public/frontend/images/product/'.$name_gen;

	    $data['image1'] 		= $img_url1;

	    $product_insert = DB::table('products')->insert($data);
	    return back()->with('message', 'Product Inserted Successfully! With 1 Image');
		}
	}



// ------------------------------Edit-----------------------------------------
    public function editProduct($id){
    	$all_category 	= DB::table('categories')->where('status', '1')->get();
	    $edit_product 	= DB::table('products')->where('id', $id)->first();
	    return view('admin.product.edit_product', compact('edit_product', 'all_category'));
    }



// ------------------------------Update-----------------------------------------
    public function updateProduct(Request $request, $id){
    	$validatedData = $request->validate([
	        'product_name'	=> 'required|max:50',
	        'product_code'	=> 'required|max:15',
	        'category_id'	=> 'required',
	        'price'			=> 'max:20',
	        'description'	=> 'required|min:2',
	        'size'			=> 'max:50',
	        'image1' 	  	=> 'mimes:jpeg,png,PNG,JPG,jpg,gif|max:2048',
	        'image2' 		=> 'mimes:jpeg,png,PNG,JPG,jpg,gif|max:2048',
	        'image3' 	  	=> 'mimes:jpeg,png,PNG,JPG,jpg,gif|max:2048',
    	]);

    	$data = array();
	    $data['product_name'] 	= $request->product_name;
	    $data['product_code'] 	= $request->product_code;
	    $data['category_id'] 	= $request->category_id;
	    $data['price'] 			= $request->price;
	    $data['product_slug'] 	= str_replace(' ', '_', $request->product_name);
	    $data['description'] 	= $request->description;
	    $data['size'] 			= $request->size;

		$old_img1 	= $request->old_img1;
		$old_img2 	= $request->old_img2;
		$old_img3 	= $request->old_img3;


		if($request->has('image1') && $request->has('image2') && $request->has('image3')){
			if($old_img1 && $old_img2 && $old_img3){
				unlink($old_img1);
				unlink($old_img2);
				unlink($old_img3);
			}

			$img1 = $request->file('image1');
		    $name_gen = hexdec(uniqid()).'.'.$img1->getClientOriginalExtension();
		    Image::make($img1)->resize(500,500)->save('public/frontend/images/product/'.$name_gen);
		    $img_url1 = 'public/frontend/images/product/'.$name_gen;
		    $data['image1'] = $img_url1;

		    $img2 = $request->file('image2');
		    $name_gen = hexdec(uniqid()).'.'.$img2->getClientOriginalExtension();
		    Image::make($img2)->resize(500,500)->save('public/frontend/images/product/'.$name_gen);
		    $img_url2 = 'public/frontend/images/product/'.$name_gen;
		    $data['image2'] = $img_url2;

		    $img3 = $request->file('image3');
		    $name_gen = hexdec(uniqid()).'.'.$img3->getClientOriginalExtension();
		    Image::make($img3)->resize(500,500)->save('public/frontend/images/product/'.$name_gen);
		    $img_url3 = 'public/frontend/images/product/'.$name_gen;

		    $data['image3'] = $img_url3;

	    	DB::table('products')->where('id', $id)->update($data);
	    	return back()->with('message', 'Product Updated Successfully!, With Image One, Two, Three');
		}


		if($request->has('image1') && $request->has('image2')){
			if($old_img2 && $old_img2){
				unlink($old_img1);
				unlink($old_img2);
			}

			$img1 = $request->file('image1');
		    $name_gen = hexdec(uniqid()).'.'.$img1->getClientOriginalExtension();
		    Image::make($img1)->resize(500,500)->save('public/frontend/images/product/'.$name_gen);
		    $img_url1 = 'public/frontend/images/product/'.$name_gen;
		    $data['image1'] = $img_url1;

		    $img2 = $request->file('image2');
		    $name_gen = hexdec(uniqid()).'.'.$img2->getClientOriginalExtension();
		    Image::make($img2)->resize(500,500)->save('public/frontend/images/product/'.$name_gen);
		    $img_url2 = 'public/frontend/images/product/'.$name_gen;
		    $data['image2'] 		= $img_url2;

	    	DB::table('products')->where('id', $id)->update($data);
	    	return back()->with('message', 'Product Updated Successfully!, With Image One, two');
		}


		if($request->has('image2') && $request->has('image3')){
			if($old_img2 && $old_img3){
				unlink($old_img2);
				unlink($old_img3);
			}

			$img2 = $request->file('image2');
		    $name_gen = hexdec(uniqid()).'.'.$img2->getClientOriginalExtension();
		    Image::make($img2)->resize(500,500)->save('public/frontend/images/product/'.$name_gen);
		    $img_url2 = 'public/frontend/images/product/'.$name_gen;
		    $data['image2'] = $img_url2;

		    $img_one3 = $request->file('image3');
		    $name_gen = hexdec(uniqid()).'.'.$img_one3->getClientOriginalExtension();
		    Image::make($img_one3)->resize(500,500)->save('public/frontend/images/product/'.$name_gen);
		    $img_url3 = 'public/frontend/images/product/'.$name_gen;
		    $data['image3'] 		= $img_url3;

	    	DB::table('products')->where('id', $id)->update($data);
	    	return back()->with('message', 'Product Updated Successfully!, With Image Two, Three');
		}





		if($request->has('image1')){
			if($old_img1){
				unlink($old_img1);
			}

			$img1 = $request->file('image1');
		    $name_gen = hexdec(uniqid()).'.'.$img1->getClientOriginalExtension();
		    Image::make($img1)->resize(500,500)->save('public/frontend/images/product/'.$name_gen);
		    $img_url1 = 'public/frontend/images/product/'.$name_gen;
		    $data['image1'] = $img_url1;

	    	DB::table('products')->where('id', $id)->update($data);
	    	return back()->with('message', 'Product Updated Successfully!, With Image One');
		}

		if($request->has('image2')){
			if($old_img2){
				unlink($old_img2);
			}else{
				$img_one2 = $request->file('image2');
			    $name_gen = hexdec(uniqid()).'.'.$img_one2->getClientOriginalExtension();
			    Image::make($img_one2)->resize(500,500)->save('public/frontend/images/product/'.$name_gen);
			    $img_url2 = 'public/frontend/images/product/'.$name_gen;

			    $data['image2'] 		= $img_url2;
		    	DB::table('products')->where('id', $id)->update($data);
		    	return back()->with('message', 'Product Updated Successfully!, Image two');
			}
	    	
		}

		if($request->has('image3')){
			if($old_img3){
				unlink($old_img3);
			}

	    	$img_one3 = $request->file('image3');
		    $name_gen = hexdec(uniqid()).'.'.$img_one3->getClientOriginalExtension();
		    Image::make($img_one3)->resize(500,500)->save('public/frontend/images/product/'.$name_gen);
		    $img_url3 = 'public/frontend/images/product/'.$name_gen;

		    $data['image3'] 		= $img_url3;
	    	DB::table('products')->where('id', $id)->update($data);
	    	return back()->with('message', 'Product Updated Successfully!, Image Three');
		}

		if(!$request->has('image1') && !$request->has('image2') && !$request->has('image3')){
			DB::table('products')->where('id', $id)->update($data);
	    	return back()->with('message', 'Product Updated Successfully!, Without Image');
		}
	}


// ------------------------------Delete-----------------------------------------

	public function deleteProduct($id){
        $del_product = DB::table('products')->where('id', $id)->first();
        $image1 = $del_product->image1;
        $image2 = $del_product->image2;
        $image3 = $del_product->image3;

    	if(file_exists($image1 && $image2 && $image3) AND !empty($image1 && $image2 && $image3)){
			unlink($image1);
            unlink($image2);
            unlink($image3);
		}elseif(file_exists($image1 && $image2) AND !empty($image1 && $image2)){
			unlink($image1);
            unlink($image2);
		}elseif(file_exists($image2 && $image3) AND !empty($image2 && $image3)){
			unlink($image2);
            unlink($image3);
		}elseif(file_exists($image1) AND !empty($image1)){
			unlink($image1);
		}
		$del_pro = DB::table('products')->where('id', $id)->delete();

		
        return back()->with('message', 'Product Deleted Successfully! With image');
    }
}
