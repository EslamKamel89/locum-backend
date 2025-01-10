<?php

namespace App\Http\Controllers\healthcare\Auth;

use App\Enums\UserType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Exception;

class WebAuthController extends Controller
{
    public function login_form()
    {
        return view('healthcare.auth.login');
    }

    public function register_form()
    {
        return view('healthcare.auth.register');
    }

    public function login(Request $request)
    {
        try {
            $credentials = $request->only('email', 'password');
            if (Auth::guard('web')->attempt($credentials)) {
                return redirect()->route('healthcare.dashboard');
            } else {
                return redirect()->route('healthcare.login');
            }
        } catch (Exception $e) {
            return view('error', ['message' => $e->getMessage(), 'code' => $e->getCode()]);
        }
    }

    public function register(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'state_id' => 'required|exists:states,id',
                'district_id' => 'required|exists:districts,id',
                'password' => 'required|min:6',
                'password_confirmation' => 'required|same:password',
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'state_id' => $request->state_id,
                'district_id' => $request->district_id,
                'password' => bcrypt($request->password),
                'type' => UserType::hospital,
            ]);

            Auth::guard('healthcare')->login($user);
            return redirect()->route('healthcare.dashboard');
        } catch (\Throwable $th) {
            return view('error')->with(['message', $th->getMessage(), 'code' => $th->getCode()]);
        }
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('healthcare.login');
    }
}
