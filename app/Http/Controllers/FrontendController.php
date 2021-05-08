<?php
namespace App\Http\Controllers;
use DB;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class FrontendController extends Controller
{
    public function index()
    {
        return view('website');
    }

    // Forum here
    public function view_forum(){
        return view('website.forum');
    }

    // all product page to show all product in all_product page
    public function all_products(){
        $all_product = DB::table('products')->where('status', 1)->paginate(8);
         return view('website.all_products', ['all_productss' => $all_product], compact('all_product'));
    }

    public function product_details($id){
    	$product_details = DB::table('products')->where('id', $id)->first();
    	return view('website.product_details', compact('product_details'));
    }

    // products show by categories id
    public function show_product_by_cat($id){
        $products_by_cat_id = DB::table('products')->where('category_id', $id)->paginate(10);
         return view('website.show_product_by_cat', ['all_productss' => $products_by_cat_id], compact('products_by_cat_id'));
    }

    public function show_product_by_cat_subcat($id, $subcatid){
        $products_by_cat_id = DB::table('products')->where('category_id', $id)->paginate(10);
         return view('website.show_product_by_cat', ['all_productss' => $products_by_cat_id], compact('products_by_cat_id'));
    }

    // Frontend blog Controller
    public function blog_details($id){
        $blogshow_id = DB::table('blogs')
                        ->join('users', 'blogs.user_id', 'users.id')
                        ->select('blogs.*', 'users.name')
                        ->where('blogs.id', $id)
                        ->get();
         return view('website.blog.blog_details', compact('blogshow_id'));
    }




    // -------------------------Product search-----------------------------------------
    public function Product_Search(Request $request){
        $product_slug   = $request->product_slug;
        $search_product_details = DB::table('products')
                                ->where('product_slug', 'LIKE', '%'.$product_slug.'%')
                                ->orWhere('product_name', 'LIKE', '%'.$product_slug.'%')
                                ->get();
        return view('website.product_search', compact('search_product_details'));
    }


    // -------------------------------------Our service------------------------------------
    public function show_ourservice(){
        $our_service = DB::table('our_services')->first();
        return view('website.our_service', compact('our_service'));
    }
    

    // public function userHome()
    // {
    //     return view('home');
    // }
}
