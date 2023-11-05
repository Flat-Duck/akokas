<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\YourPostGotNewLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FCMController extends Controller
{
    function refresh_token(Request $request) {
        if(DB::table('devices')->updateOrInsert(
            ["ime" => $request->device_id],
            
            [
                "fcm_token" => $request->device_token,
                "type" => $request->device_type,
                "last_login" => now()
            ]
        ))return "ok";
        return "no";
    }

    function register_device(Request $request) {
        if(DB::table('devices')->updateOrInsert(
            ["ime" => $request->device_id],
            
            [
                "fcm_token" => $request->device_token,
                "type" => $request->device_type,
                "last_login" => now()
            ]
        ))return "ok";
        return "no";
    }
}
