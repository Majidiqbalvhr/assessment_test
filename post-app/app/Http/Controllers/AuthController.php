<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use function PHPUnit\Framework\result;
use function Symfony\Component\Mime\to;


class AuthController extends Controller
{

    public function createregistration()
    {
        return View('auth.register');
    }
    public function view_login()
    {
        return view('auth.login');
    }
    protected function login(LoginRequest $request)
    {
        if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
            $notificationMessage = "login success";
            return redirect()->route('user.dashboard')->with('notificationMessage', $notificationMessage);
        }
        else{
            $notificationMessage = "login failed";
            return redirect()->route('login')->with('notificationMessage', $notificationMessage);
        }
    }
    public function Registration(UserRegisterRequest $request)
    {

        $attribute = $request->all();
        $attribute['password'] = Hash::make($attribute['password']);
        $attribute['phone_number'] = $request->input('phone_number');
        $profilePicture = $request->file('profile_picture');
        if ($profilePicture)
        {
            $publicPath = public_path('ProfilePicture');
            $profilePictureName = time().'.'.$profilePicture->getClientOriginalExtension();
            $profilePicture->move($publicPath, $profilePictureName);
            $attribute['profile_picture'] = $profilePictureName;
        }
        $user = User::create($attribute);
        if ($user) {
            $notificationMessage = "User registration successful. Please log in.";
            return redirect()->route('login')->with('notificationMessage', $notificationMessage);
        } else {
            // User creation failed, so return to the login page with an error message
            $notificationMessage = "User registration failed. Please try again.";
            return redirect()->route('login')->with('notificationMessage', $notificationMessage);
        }
    }
    public function destroy()
    {
        $user = Auth::user();
        Auth::logout();
        Session::invalidate();
        Session::regenerate();
        $user->tokens->each(function ($token, $key) {
            $token->delete();
        });
        return redirect()->route('login');
    }
}
