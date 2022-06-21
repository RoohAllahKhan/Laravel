<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}
