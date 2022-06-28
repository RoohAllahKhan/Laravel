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
}
