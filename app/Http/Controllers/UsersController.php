<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function loadView()
    {
        $data = ['rooh', 'khan', 'peter', 'jason'];
        return view("users", ["user" => "rooh", "users" => $data]);
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
