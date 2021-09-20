<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

use Illuminate\Support\Facades\Hash;


use App\Models\Profile;

use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
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
    public function index ()
    {
 


        return view('user.profile');
    }
    public function ProfileEdit (Request $request)
    {
        
        $UploadedImg="";
        if ($request->hasFile('file')) {

            $request->validate([
                'file' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);

            $path='assets/user/images/profile_pic/';


            $filename=$request->file;

            $imgUpload=$this->ImageUpload($path,$filename);

            if ($imgUpload['error_code']==10) {

                return $imgUpload['error_message'];
            }

            if ($imgUpload['error_code']==20) {

                return $imgUpload['error_message'];
            }
            if ($imgUpload['error_code']==0) {

                $UploadedImg=$imgUpload['value'];
            }

        }

       

        if ($request->hasFile('file')) {

            $update=User::where('id',Auth::user()->id)->update(['image_path'=>$UploadedImg]);

        }else {
            Session::flash('message', 'Please select image'); 
            return redirect('user/profile')->with(['emsg' => 'Try Again later', 'heading' => 'Warning!']);

        }

        return redirect('user/profile')->with(['emsg' => 'Try Again later', 'heading' => 'Warning!']);
        
      

}
    

  
  
 





 
 



    public function changePasswordForm(Request $request)
    {



        return view('user.changePassword');



    }


    public function changePassword(Request $request)
    {


        $session =  Auth::user();

        $og_psw = $session->password;

        $id = $session->id;

        $new_pass = $request->new_password;

        $con_pass = $request->conform_password;

        $newPwd = Hash::make($request->new_password);
        $request['password'] = $newPwd;


        if (Hash::check($request->current_password, $og_psw)) {
            $parents = User::findOrFail($id);

            if ($new_pass == $con_pass) {

                if ($parents->update($request->only(['password']))) {
                    return redirect()->intended('/user/logout')->with(['smsg' => 'Password Updated', 'heading' => 'Updated!']);
                } else {
                    Session::flash('message', 'old password is incorrect'); 
                    return redirect()->intended('/user/change_password_Form')->with(['emsg' => 'Try Again later', 'heading' => 'Warning!']);
                }
            } else {
                Session::flash('message', 'password miss match'); 
                return redirect()->intended('/user/change_password_Form')->with(['emsg' => 'Try Again later', 'heading' => 'Warning!']);
            }
        } else {

            return redirect()->intended('user/change_password_Form')->with(['smsg' => 'old password incorrect', 'heading' => 'failed!']);
        }
    }



}
