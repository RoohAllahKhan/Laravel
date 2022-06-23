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
        $request->session()->flash('user', $user);
        return redirect('add-user');
    }

    public function delete($id, Request $request)
    {
        $data = User::find($id);
        $data->delete();
        $request->session()->flash('user', $data);
        return redirect('list');
    }

    public function showData($id)
    {
        $data =  User::find($id);
        return view('edit', ['data' => $data]);
    }

    public function update(Request $request)
    {
        $data = User::find($request->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->save();
        $data->message = $data->name." has been updated successfully";
        $request->session()->flash('user', $data);
        return redirect('list');
    }
}
