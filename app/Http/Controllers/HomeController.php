<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Http;


class HomeController extends Controller
{
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


    public function index()
    {
 $post_details=[];
$result=$this->getAllREdditData();
$post_details=[];
if(count($result) >0)
{
    $data = isset($result['data']) ? $result['data'] : [];
    $post_details = isset($data['children']) ? $data['children'] : [];

}

return view('user.home', ['post_details' =>  $post_details ]);
    }





    protected function getAllREdditData()
    {
 $result=Http::get('https://www.reddit.com/r/webdev.json', [
    ]);
    $result1=$result->body();
     $res=json_decode($result1, true);
     return  $res;
    }




}