<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use http\Client\Curl\User;
use Carbon\Carbon;
use App\users;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('layouts.admin-master');
    }
    public function indexView()
    {
    	$users = Users::where('deleted_at', '=', null)->get(); //tabloda deleted_at sütunu boş olanları çeker
    	return view('users', compact('users'));
    }
    public function delete($id)
    {
    	DB::table('users')->where('id','=', $id)->update(['deleted_at' => Carbon::now()]);
    	return "<script>alert('SİLİNDİ')</script>";

    }
    public function register()
    {
    	return view('register');

    }
    public function create(Request $Request)
    {
 	   $data = $Request->all();
 	   $password = $Request->get('password');
 	   DB::table('users')->insert([
 	   	'name' => $Request->get('name'),
 	   	'username' => $Request->get('username'),
 	   	'email' => $Request->get('email'),
 	   	'password' => Hash::make($password),
 	   	'created_at' => Carbon::now(),

 	   ]);
 	   	return "<script>alert('KAYIT BAŞARIYLA TAMAMLANDI')</script>";
    }
        public function updateView($id)
        {
            $user=users::where('id',$id)->get();
            $user=$user->first();
            return view('update' , compact('user'));
        }
        public function update(Request $Request,$id)
    {
        Users::where('id' , $id)->update([
            'name' => $Request->get('name'),
            'username' => $Request->get('username'),
            'email' => $Request->get('email'),
            'updated_at' => Carbon::now()
        ]);
            return "<script>alert('KAYIT GÜNCELLENDİ')</script>";
    }
}
