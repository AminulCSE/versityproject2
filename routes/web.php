<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SslCommerzPaymentController;
// -----------------------Frontend route here-----------------------
Route::get('/', 'FrontendController@index');
// Product details
Route::get('product_details/{id}', 'FrontendController@product_details');
Route::get('all_products', 'FrontendController@all_products');

// Show our service infront of the page
Route::get('show_ourservice', 'FrontendController@show_ourservice');

// Product search
Route::get('product_search', 'FrontendController@Product_Search');
// Forum here
Route::get('view_forum', 'FrontendController@view_forum');





// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END








// Blog details
Route::get('blog_details/{id}', 'FrontendController@blog_details');


// ------------------------------CartController--------------------------
Route::post('add_to_cart/{id}', 'CartController@add_to_cart');
Route::get('showcart', 'CartController@showCart');
Route::post('updatecart', 'CartController@updatecart');
Route::get('destroycart/{rowId}', 'CartController@destroycart');

// ------------------------------CartController--------------------------
Route::get('add_to_wishlist/{product_id}', 'WishlistController@addWishList');
Route::get('view_wishlist/{id}', 'WishlistController@showWishList');
Route::get('delete_wishlist/{id}', 'WishlistController@deleteWishlist');

// Product show by category
Route::get('show_product_by_category/{id}', 'FrontendController@show_product_by_cat');
Route::get('show_product_by_category/{id}/{subcatid}', 'FrontendController@show_product_by_cat_subcat');



// Customer checkout
Route::get('checkout/order_checkout', 'CheckOutController@checkoutadd');
Route::post('checkout/store', 'CheckOutController@checkoutstore');

// Customer payment
Route::get('customer/payment', 'PaymentController@payment');
Route::post('customer/payment/store', 'PaymentController@payment_store');
Route::get('order_list', 'PaymentController@orderList');
Route::get('order_details/{id}', 'PaymentController@orderDetails');
Route::get('order_delete/{id}', 'PaymentController@OrderDelete');
// Verification email after payment
Route::get('verify_email_page', 'PaymentController@VerifyEmail_Page');
Route::post('order/verify_code', 'PaymentController@OrderVerifyCode');

// Contact us by mail
Route::get('user/contact_us', 'ContactController@contact_us');
Route::post('user/send_contact', 'ContactController@save_contact');
Route::get('sendsms', 'ContactController@sendsms');


// -----------------------Backend route here------------------------->middleware('is_admin');
Auth::routes(['verify' => true]);
// User Profile route here
// -----------------------HomeController route here-----------------------
// Route::get('user_home', 'HomeController@userHome')->name('user.home');
Route::get('user.home', 'HomeController@userHome')->name('user.home')->middleware('verified');
Route::get('user/user_edit/{id}', 'HomeController@editUser')->middleware('verified');
Route::post('user/user_update/{id}', 'HomeController@updateUser')->middleware('verified');
// CHange password for user
Route::get('user/change_userpass/{id}', 'HomeController@editpassword')->middleware('verified');
Route::post('user/update_password/{id}', 'HomeController@updatepassword')->middleware('verified');



	Route::middleware('is_admin', 'verified')->group(function (){

	// Admin home route here
	Route::get('admin/home', 'HomeController@adminHome')->name('admin.home');
	
	// Category route here
	Route::get('category/all_category', 'admin\CategoryController@allCategroy');
	Route::get('category/add_category', 'admin\CategoryController@addCategroy');
	Route::post('category/store_category', 'admin\CategoryController@storeCategroy');
	Route::get('category/edit_category/{id}', 'admin\CategoryController@editCategroy');
	Route::post('category/update_category/{id}', 'admin\CategoryController@updateCategory');
	Route::get('category/delete_category/{id}', 'admin\CategoryController@deleteCategory');

	// Admin controller route here
	Route::get('admin/all_admin', 'admin\LogoController@allAdmin');
	Route::get('admin/add_admin', 'admin\LogoController@addAdmin');
	Route::post('admin/store_admin', 'admin\LogoController@storeAdmin');
	Route::get('admin/edit_admin/{id}', 'admin\LogoController@editAdmin');
	Route::post('admin/update_admin/{id}', 'admin\LogoController@updateAdmin');
	Route::get('admin/delete_admin/{id}', 'admin\LogoController@deleteAdmin');

	// SubCategory route here
	Route::get('subcategory/all_sub_category', 'admin\SubCategoryController@allSubCategroy');
	Route::get('subcategory/add_sub_category', 'admin\SubCategoryController@addSubCategroy');
	Route::post('subcategory/store_sub_category', 'admin\SubCategoryController@storeSubCategroy');
	Route::get('subcategory/edit_sub_category/{id}', 'admin\SubCategoryController@editSubCategroy');
	Route::post('subcategory/update_sub_category/{id}', 'admin\SubCategoryController@updateSubCategory');
	Route::get('subcategory/delete_sub_category/{id}', 'admin\SubCategoryController@deleteSubCategory');


	// our service or about us
	 Route::get('ourservice/add_our_service', 'admin\OurServiceController@addOurService');
	 Route::post('ourservice/store_our_service', 'admin\OurServiceController@StoreOurService');
	 Route::get('ourservice/view_our_service', 'admin\OurServiceController@viewOurService');
	 Route::get('ourservice/edit_ourservice/{id}', 'admin\OurServiceController@EditOurservice');
	 Route::post('ourservice/update_ourservice/{id}', 'admin\OurServiceController@UpdateOurservice');
	 Route::get('ourservice/delete_ourservice/{id}', 'admin\OurServiceController@DeleteOurservice');


	// Slider route here
	Route::get('slider/all_slider', 'admin\SliderController@allSlider');
	Route::get('slider/add_slider', 'admin\SliderController@addSlider');
	Route::post('slider/store_slider', 'admin\SliderController@storeSlider');
	Route::get('slider/edit_slider/{id}', 'admin\SliderController@editSlider');
	Route::post('slider/update_slider/{id}', 'admin\SliderController@updateSlider');
	Route::get('slider/delete_slider/{id}', 'admin\SliderController@deleteSlider');

	// Banner route here
	Route::get('banner/all_banner', 'admin\BannerController@allBanner');
	Route::get('banner/add_banner', 'admin\BannerController@addBanner');
	Route::post('banner/store_banner', 'admin\BannerController@storeBanner');
	Route::get('banner/edit_banner/{id}', 'admin\BannerController@editBanner');
	Route::post('banner/update_banner/{id}', 'admin\BannerController@updateBanner');
	Route::get('banner/delete_banner/{id}', 'admin\BannerController@deleteBanner');

	// Banner route here
	Route::get('logo/all_logo', 'admin\LogoController@allLogo');
	Route::get('logo/add_logo', 'admin\LogoController@addLogo');
	Route::post('logo/store_logo', 'admin\LogoController@storeLogo');
	Route::get('logo/edit_logo/{id}', 'admin\LogoController@editLogo');
	Route::post('logo/update_logo/{id}', 'admin\LogoController@updateLogo');
	Route::get('logo/delete_logo/{id}', 'admin\LogoController@deleteLogo');

	// Product route here
	Route::get('product/all_product', 'admin\ProductController@allProduct');
	Route::get('product/add_product', 'admin\ProductController@addProduct');
	Route::post('product/store_product', 'admin\ProductController@storeProduct');
	Route::get('product/edit_product/{id}', 'admin\ProductController@editProduct');
	Route::post('product/update_product/{id}', 'admin\ProductController@updateProduct');
	Route::get('product/delete_product/{id}', 'admin\ProductController@deleteProduct');

	// Customer route here
	Route::get('customer/all_customer', 'admin\CustomerController@allCustomer');
	Route::get('customer/draft_customer/{id}', 'admin\CustomerController@stroDraft');
	Route::get('customer/all_draft_customer', 'admin\CustomerController@allDraftCustomer');
	Route::get('customer/undraft_customer/{id}', 'admin\CustomerController@UnDraftCustomer');
	Route::get('customer/delete_customer/{id}', 'admin\CustomerController@deleteCustomer');

	// Customer orderes route here
	Route::get('orders/approved_orders', 'admin\OrderController@Approved_Order');
	Route::get('orders/approved_orders_details/{id}', 'admin\OrderController@Approved_Order_Details');

	Route::get('orders/pending_orders', 'admin\OrderController@Pending_Order');
	Route::get('orders/pending_orders_details/{id}', 'admin\OrderController@pending_orders_details');

	Route::get('orders/approved_orders_status/{id}', 'admin\OrderController@approved_orders_status');
	Route::get('orders/unapproved_orders/{order_no}', 'admin\OrderController@unapproved_order_status');
	// Order invoice print
	Route::get('orders/approved_orders_print/{id}', 'admin\OrderController@approved_order_print');

	Route::get('orders/delete_order/{id}', 'admin\OrderController@order_delete');

	// Slider route here
	Route::get('blog/all_blog', 'admin\BlogController@allBlog');
	Route::get('blog/add_blog', 'admin\BlogController@addBlog');
	Route::post('blog/store_blog', 'admin\BlogController@storeBlog');
	Route::get('blog/edit_blog/{id}', 'admin\BlogController@editBlog');
	Route::post('blog/update_blog/{id}', 'admin\BlogController@updateBlog');
	Route::get('blog/delete_blog/{id}', 'admin\BlogController@deleteBlog');
});