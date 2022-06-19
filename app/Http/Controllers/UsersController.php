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
}
