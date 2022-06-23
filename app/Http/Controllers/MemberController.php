<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    //
    public function show()
    {
        $data = User::all();
        return view('list', ['members' => $data]);
    }
}
