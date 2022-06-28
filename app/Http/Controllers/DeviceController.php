<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    //
    public function index(Device $key)
    {
        return $key;
    }

    public function list()
    {
        return Device::all();
    }

    public function add(Request $request)
    {
        $device = new Device;
        $device->name = $request->name;
        $device->user_id = $request->user_id;
        $result = $device->save();
        if ($result) {
            return ["Result" => "Data has been saved"];
        }
        return ["Result" => "Operation failed"];
    }

    public function search($name)
    {
        return Device::where('name', 'like','%'.$name.'%')->get();
    }
}
