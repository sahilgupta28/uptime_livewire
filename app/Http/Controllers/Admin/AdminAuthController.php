<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function loginForm(): View|RedirectResponse
    {
        return view('admin.loginForm');
    }

    public function login(Request $request): RedirectResponse
    {
        $request->validate(
            [
                'email' => ['required', 'email', 'exists:admins,email'],
                'password' => ['required'],
            ]
        );
        $credentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }
        return redirect()->route('admin.loginForm')->withErrors(
            [
                'email' => 'The provided credentials do not match our records.',
            ]
        );
    }

    public function dashboard(): View
    {
        return view('admin.dashboard');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();

        if (Auth::guard('web')->check()) {
            $request->session()->regenerate();
            return redirect(route('admin.loginForm'));
        }

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('admin.loginForm'));
    }
}
