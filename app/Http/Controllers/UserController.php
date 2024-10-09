<?php

namespace App\Http\Controllers;

use App\Helper\JWTToken;
use App\Helper\Response;
use App\Http\Requests\UserRequests;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userAddress()
    {
        return view('components.front-end.profile.address');
    }
    public function userOrders()
    {
        return view('components.front-end.profile.account-orders');
    }
    public function userInfo(Request $request)
    {
        $userId = $request->header('id');
        $user = User::find($userId);
        // return $user->makeHidden(['id', 'password']);
        return view('components.front-end.profile.account-setting', compact('user'));
    }

    public function register(UserRequests $request)
    {
        $requestvalidated = $request->validated();
        try {
            $user = new User();
            $user->firstName = $requestvalidated['firstName'];
            $user->lastName = $requestvalidated['lastName'];
            $user->email = $requestvalidated['email'];
            $user->phone = $requestvalidated['phone'];
            $user->password = $requestvalidated['password'];
            $user->save();
            return Response::success('Registration Successfull');
        } catch (\Exception $e) {
            return Response::error();
        }
    }

    public function login(UserRequests $request)
    {
        $requestvalidated = $request->validated();
        try {
            $email = $requestvalidated['email'];
            $password = $requestvalidated['password'];
            $user = User::where('email', $email)->where('password', $password)->first();
            if ($user) {
                if ($requestvalidated['remember'] == true) {
                    $time = time() + 60 * 60 * 24 * 30;
                } else {
                    $time = time() + 60 * 60 * 24;
                }
                $token = JWTToken::createToken($email, $user->id, $time);
                return Response::success('Login Successfull')->cookie('token', $token, $time);
            } else {
                return Response::error('Invalid Credentials');
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
