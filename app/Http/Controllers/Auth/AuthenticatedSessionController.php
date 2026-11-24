<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $user = Auth::user();

        if ($request->routeIs('ui.sign-in.submit') && ! $request->session()->has('url.intended')) {
            $destination = $user->role === 'staff'
                ? 'ui.staff.dashboard'
                : 'ui.student.dashboard';

            $request->session()->put('url.intended', route($destination));
        }

        if ($user->two_factor_secret && $user->two_factor_confirmed_at) {
            Auth::guard('web')->logout();

            $request->session()->put([
                'login.id' => $user->getKey(),
                'login.remember' => $request->boolean('remember'),
            ]);

            return redirect()->route('two-factor.login');
        }

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return $request->routeIs('ui.logout')
            ? redirect()->route('ui.sign-in')
            : redirect('/');
    }
}
