<?php

namespace App\Http\Controllers\admin;

use App\Helper\JWTToken;
use App\Helper\Response;
use App\Http\Controllers\Controller;
use App\Models\Administrator;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'remember' => 'sometimes|boolean',
        ]);
        try {
            $email = $request->input('email');
            $password = $request->input('password');
            $user = Administrator::where('email', $email)->where('password', $password)->first();
            if ($user) {
                if ($request->input('remember') == true) {
                    $time = time() + 60 * 60 * 24 * 30;
                } else {
                    $time = time() + 60 * 60 * 24;
                }
                $token = JWTToken::createToken($email, $user->id, $time);
                noty()->success('Login Successfull');
                return redirect()->intended(route('dashboard'))->cookie('token', $token, $time);
            } else {
                noty()->error('Invalid Email or Password');
                return redirect()->back();
            }

        } catch (\Exception $e) {
            return Response::error();
            // return $e;
        }
    }

    public function userLogout()
    {
        return redirect(route('index'))->cookie('token', '', -1);
    }
}
