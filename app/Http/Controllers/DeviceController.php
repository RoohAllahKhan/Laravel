<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $data = Device::where('name', 'like','%'.$name.'%')->get();
        if($data->count() > 0) {
            return $data;
        }
        return ["message" => "No data found"];
    }

    public function testData(Request $request)
    {
        $rules = array(
            "user_id" => "required | min:2 | max:4"
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 401);
        }
        $device = new Device;
        $device->name = $request->name;
        $device->user_id = $request->user_id;
        $result = $device->save();
        if ($result) {
            return ["Result" => "Data has been saved"];
        }
        return ["Result" => "Operation failed"];
    }
}
