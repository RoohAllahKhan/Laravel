<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function dbOperations()
    {
        $data = DB::table('User')->get();
        $data = DB::table('User')
            ->where('address', 'GmbH');
        $data = DB::table('User')->find(7);
        $data = DB::table('User')->count();
        $data = DB::table('User')
            ->insert([
                'name' => 'rock',
                'email' => 'rock@GmbH.de',
                'address' => 'berlin'
            ]);
        $data = DB::table('User')
            ->where('id', 17)
            ->update([
                'name' => 'fluff',
                'email' => 'fluff@GmbH.de',
                'address' => 'frankfurt'
            ]);
        $data = DB::table('User')->where('id', 17)->delete();
        return $data;
//        return view('viewQuery', ['data' => $data]);
    }

    public function operations()
    {
//        return DB::table('User')->avg('id');
//        return DB::table('User')->sum('id');
        return DB::table('User')->max('id');
    }

    public function showJoin()
    {
//     return DB::table('User')
//         ->join('company', 'User.id', "=", 'company.employee_id')
//         ->select('company.*')
//         ->get();
    }
}
