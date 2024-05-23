<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        // Attempt to authenticate the user with the provided credentials
        $credentials = $request->only('email', 'password');

        $user = \App\Models\User::where('email', $credentials['email'])->first();

        if ($user && $user->isArchived()) {
            throw ValidationException::withMessages([
                'email' => ['Your account has been archived and cannot log in.'],
            ]);
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();
            $redirectRoute = 'dashboard'; // Default route

            switch ($user->user_type) {
                case 'admin':
                    $redirectRoute = 'admin.admindashboard';
                    break;
                case 'coach':
                case 'player':
                    $redirectRoute = 'dashboard';
                    break;
            }

            return redirect()->intended(route($redirectRoute));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

