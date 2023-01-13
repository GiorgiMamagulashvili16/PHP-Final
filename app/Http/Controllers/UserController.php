<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function loginPage()
    {
        return view('login');
    }

    public function registrationPage()
    {
        return view('registration');
    }

    public function registerUser(Request $request)
    {
        $data =  $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4|max:8',
        ]);

        $data['password'] = Hash::make($data['password']);
        $result = User::create($data);
        if ($result) {
            return back()->with('success', 'You Have registered');
        } else {
            return back()->with('error', 'error occured');
        }
    }

    public function loginUSer(Request $request)
    {
        $data =  $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4|max:8',
        ]);

        $user = User::where(['email' => $data['email']])->first();
        if ($user) {
            if (Hash::check($data['password'], $user->password)) {
                Auth::login($user);
                if($user->id == 1) {
                    return redirect(route("adminDashPage"));
                } else {
                    return redirect(route("dashPage"));
                }
                
            } else {
                return back()->with("error", "password incorrect");
            }
        }
    }
}
