<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Str;

class AuthController extends Controller
{
    /**
     * Shows Login Page.
     */
    public function login()
    {
        return view('pages.auth.login');
    }

    /**
     * Authenticates User.
     */
    public function authenticate(Request $request)
    {

        $request->validate([
            'email' => ['bail', 'required', 'email'],
            'password' => [
                'bail',
                'required',
                'min:8',
                'regex:/[a-zA-Z]/', // must contain at least one letter
                'regex:/[0-9]/', // must contain at least one digit
            ],
        ], [
            'password.regex' => 'The password must contain at least one letter, and one number.',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();

            return redirect()->intended(route('tasks.index', ['mytasks' => true]));
        }

        throw ValidationException::withMessages([
            'password' => ['The provided credentials do not match our records.'],
        ]);
    }

    /**
     * Shows Register Page
     */
    public function register()
    {
        return view('pages.auth.register');
    }

    /**
     * Stores newly registered user
     */
    public function store(Request $request) {}

    /**
     * Shows forgot password form.
     */
    public function forgot()
    {
        return view('pages.auth.forgot-password');
    }

    /**
     * Submits forgot password form.
     */
    public function sendForgotMail(Request $request)
    {
        $request->validate([
            'email' => ['bail', 'required', 'email', 'exists:users,email'],
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    /**
     * Shows reset password form.
     */
    public function reset($token)
    {
        return view('pages.auth.reset-password', ['token' => $token]);
    }

    /**
     * Submits reset password form.
     */
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => ['bail','required'],
            'email' => ['bail','required', 'email', 'exists:users,email'],
            'password' => [
                'bail',
                'required',
                'min:8',
                'regex:/[a-zA-Z]/', // must contain at least one letter
                'regex:/[0-9]/', // must contain at least one digit
            ],
        ], [
            'password.regex' => 'The password must contain at least one letter, and one number.',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

    /**
     * Logout authenticated user
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
