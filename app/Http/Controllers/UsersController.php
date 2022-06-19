<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function loadView($user)
    {
        return view("users", ["name" => $user]);
    }
}
