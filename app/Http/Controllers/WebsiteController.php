<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // Import Validator facade
use App\UserInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class WebsiteController extends Controller
{
    public function sign_up_save(Request $request)
    {

        $rules = [
            'user_name' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'mobile_no' => 'required|unique:users|max:10|min:10',
            'country' => 'required',
            'org_name' => 'required',
            'password' => 'required',
            

        ];

        // Validate the request data
        $validator = Validator::make($request->all(), $rules);

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            $errors = '';
            foreach ($validator->errors()->all() as $error) {
                $errors .= $error . '<br>';
            }
            return redirect()->back()->with('errors', $errors);
        }

        // Validation passed, proceed to create the user and user info
        $user = User::create([
            'user_name' => $request->input('user_name'),
            'name' => $request->input('org_name'),
            'email' => $request->input('email'),
            'mobile_no' => $request->input('mobile_no'),
            'role'=>$request->input('role'),
            'password'=>Hash::make($request->input('password')),

        ]);

        $user->userInfo()->create([
            'country' => $request->input('country'),
            'org_name' => $request->input('org_name'),
        ]);
        return redirect()->route('sign-in')->with('success', 'Sign up successfully.');
    }

    public function sign_in_attempt(Request $request)
    {
        $rules = [
            'user_name' => 'required',
            'password' => 'required',
        ];
        // Validate the request data
        $validator = Validator::make($request->all(), $rules);
        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            $errors = '';
            foreach ($validator->errors()->all() as $error) {
                $errors .= $error . '<br>';
            }
            return redirect()->back()->with('errors', $errors);
        }
        $user = User::where('email', $request->user_name)
            ->orWhere('user_name', $request->user_name)
            ->first();
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user, true);
            return redirect()->route('dashboard')->with('success', 'sign in successfully.');
        } else {
            return redirect()->route('sign-in')->with('errors', 'Please check username or password');
        }
    }
    public function log_out(){
        Auth::logout();
        return redirect()->route('sign-in')->with('success', 'sign out successfully.');

    }
}
