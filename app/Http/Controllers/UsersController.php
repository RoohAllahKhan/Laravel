<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class UsersController extends Controller
{
    //
    public function loadView()
    {
//        $data = ['rooh', 'khan', 'peter', 'jason'];
//        return view("users", ["user" => "rooh", "users" => $data]);
//        dd(DB::);
        return DB::select("select * from User");
    }

    public function signIn(Request $request)
    {
        $request->validate([
            'username' => 'required | email | max:10',
            'userpassword' => 'required | min:5'
        ]);

        return $request->input();
    }

    public function getUsers()
    {
        return User::all();
    }

    public function index()
    {
        $collection = Http::get('https://reqres.in/api/users?page=1');
        return view('profiles', ['collection' => $collection['data']]);
    }
}
