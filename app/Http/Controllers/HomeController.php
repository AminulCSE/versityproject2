<?php
namespace App\Http\Controllers;
use DB;
use Hash;
use Image;
use Illuminate\Http\Request;

class HomeController extends Controller{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        return view('admin.index');
    }

    // public function userHome()
    // {
    //     return view('website.user_profile');
    // }




    // ----------------------------------------User profile---------------------------
    public function userHome(){
        return view('website.user_profile');
    }

    public function editUser($id){
        if ($id) {
             $userEditProfile = DB::table('users')->where('id', $id)->first();
            return view('website.edit_user', compact('userEditProfile'));
        }
        return redirect()->back();
    }


    public function updateUser(Request $request, $id){
        $validatedData = $request->validate([
            'name'      => 'required',
            'email'     => 'required',
            'mobile'    => 'max:18',
            'image'     => 'mimes:jpeg,png,PNG,JPG,jpg,gif|max:2048',
        ]);


        $data = array();
        $data['name']       = $request->name;
        $data['email']      = $request->email;
        $data['mobile']     = $request->mobile;

        $old_img1 = $request->old_image;

        if($request->has('image')){
            if($old_img1){
                unlink($old_img1);
            }

            $img1       = $request->file('image');
            $name_gen   = hexdec(uniqid()).'.'.$img1->getClientOriginalExtension();
            Image::make($img1)->resize(500,500)->save('public/frontend/images/user/'.$name_gen);
            $img_url1   = 'public/frontend/images/user/'.$name_gen;

            $data['image']         = $img_url1;
            
            DB::table('users')->where('id', $id)->update($data);
            return back()->with('message', 'Your profile updated Successfully! With Image');
        }else{
            DB::table('users')->where('id', $id)->update($data);
            return back()->with('message', 'Your profile updated Successfully!  Without Image');
        }
    }


    public function editpassword($id){
        return view('website.changepassword');
    }

    public function updatepassword(Request $request, $id){
        $request->validate([
            'oldPass' => 'required',
            'newPass' => 'required',
            'confirmPass' => 'required|same:newPass',
        ]);

        $current_user = auth()->user();

        if(Hash::check($request->oldPass, $current_user->password)){
            $current_user->update([
                'password'=>bcrypt($request->newPass)
            ]);

            return redirect()->back()->with('message', 'Password Successfully Updated');
        }else{
            return redirect()->back()->with('error', 'Old password does not matched');
        }
    }






}
