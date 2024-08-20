<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    public function userRegistrationForm()
    {
        return view('registerLogin.userRegistrationForm');
    }

    public function userRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registration successful! Please log in.');
    }

    public function LoginForm()
    {
        return view('registerLogin.login');
    }



    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
    ]);

    if (Auth::attempt($credentials)) {
        // Generate a new token for the authenticated user
        $user = Auth::user();
        $token = $user->createToken('API Token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => $user,
        ]);
    }

    return response()->json([
        'error' => 'The provided credentials do not match our records.',
    ], 401);
}
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }




    public function changePasswordForm(Request $request)
        {

            return view('admin.changePassword');
        }

        public function changePassword(Request $request)
        {
            try {
                $user = Auth::user();
                if (!$user) {
                    return response()->json(['message' => 'User not authenticated'], 401);
                }
        
                if (!Hash::check($request->current_password, $user->password)) {
                    return response()->json(['errors' => ['current_password' => ['Current password is incorrect.']]], 422);
                }
        
                // Update the user's password
                $user->password = Hash::make($request->new_password);
                $user->save();
        
                return response()->json(['message' => 'Password changed successfully.'], 200);
            } catch (\Exception $e) {
                return response()->json(['message' => 'An error occurred', 'error' => $e->getMessage()], 500);
            }
        }
                public function ResetPasswordForm()
        {
            return view('admin.resetPasswordForm');
        }

        public function resetPassword(Request $request)
        {
            $request->validate(['email' => 'required|email']);

            $status = Password::sendResetLink($request->only('email'));

            return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
        }

}