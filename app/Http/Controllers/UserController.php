<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Session\Session;

use Illuminate\Http\Request;

class UserController extends Controller
{
    use RegistersUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function login(Request $request)
    {

        if (Auth::user()) {
            return redirect('/package-checkout');
        }
        return view('user.login');
    }

    public function register(Request $request)
    {

        $this->validate($request, [
            'first_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'first_name' => 'required|max:255',
            'dob' => 'required',
            'gender'=>'required',
            'password' => [
                'required',
                'confirmed',
                'string',
                'min:8',
                'regex:/[a-z]/',
                'regex:/[0-9]/',
            ],

            'password_confirmation' =>  [
                'required',
                'string',
                'min:8',
                'regex:/[a-z]/',
                'regex:/[0-9]/',
            ],

        ]);

        $user = new User([
            'name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'dob' => $request->get('dob'),
            'gender' => $request->get('gender')

        ]);
        $save_user = $user->save();
        if (is_null($save_user)) {
            $result = ['sucess' => false, 'mesage' => ' Please try again'];
        } else {
            Auth::login($user);
            $result = ['sucess' => true, 'mesage' => 'Successfull', 'mobile_number' => $request->mobile];
        }

        return response()->json($result);
    }



    public function logout(Request $request)
    {
        Auth::logout();

        return redirect('/');
    }



    public function customerlogin(Request $request)
    {
        if (Auth::user()) {
            return redirect('/checkout');
        }
         $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $userdata = [
          'email' => $request->get('email') ,
          'password' => $request->get('password')
        ];
        $result = [];
        if (Auth::attempt($userdata)){
            $result = ['sucess' => true,'mesage' => 'Successfull'];
        }else{
            $result = ['sucess' => false,'mesage' => 'Invalid user name or password. Please try again'];
        }
         return response()->json($result);
    }


}
