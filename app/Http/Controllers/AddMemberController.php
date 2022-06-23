<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddMemberController extends Controller
{
    public function addMember(Request $request)
    {
        $data = $request->input('user');
        $request->session()->flash('user', $data);
        return redirect('add');
    }
}
