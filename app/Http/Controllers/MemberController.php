<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    //
    public function show()
    {
        $data = User::paginate(5);
        return view('list', ['members' => $data]);
    }

    public function addData(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->save();

        return redirect('add-user');
    }
}
