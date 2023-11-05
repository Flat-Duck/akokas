<?php
namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!auth()->attempt($credentials)) {
            throw ValidationException::withMessages([
                'email' => [trans('auth.failed')],
            ]);
        }

        $user = User::whereEmail($request->email)->firstOrFail();

        $token = $user->createToken('auth-token');

        return response()->json([
            'token' => $token->plainTextToken,
        ]);
    }

     /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|unique:users,email',
            'name' => 'required',
            'password' => 'required',
            'fcm_token' => 'required',
            'ime' => 'required'
        ]);
       
        $password = Hash::make($data['password']);
        $device['fcm_token'] = $data['fcm_token'];
        $device['ime'] = $data['ime'];
        
        unset($data['fcm_token']);
        unset($data['fcm_token']);
        unset($data['password']);
        $data['password'] = $password;

        $user = User::create($data);
        DB::table('devices')->updateOrInsert(
            ["ime" => $device['ime']],
            
            [
                "fcm_token" => $device['fcm_token'],
                "last_login" => now()
            ]);

        return response()->json([
            "status" => "Success",
            "message" => "Sign up success",
            "data" => "Your Account has been created please login"
        ]);
    }
}
