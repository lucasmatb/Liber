<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Professor;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;


class ProfessorLoginController extends Controller
{
    use AuthenticatesUsers;

    public function showLoginForm()
    {
        return view('auth.professor-login');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('professor');
    }

//redirect
    public function redirectPath()
    {
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/professor';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('guest')->except('logout');
    }

    protected function attemptLogin(Request $request)
{
    $credentials = $this->credentials($request);

    $credentials['unconfirmed'] = 5; // Additional field you want to check

    return $this->guard()->attempt(
            $credentials, $request->filled('remember')
        );
}

public function logout(Request $request)
{
    $this->guard()->logout();

    $request->session()->invalidate();

    return $this->loggedOut($request) ?: redirect('/professor');
}

public function protectLogout(Request $request)
{
    return abort(404);
}

protected function credentials(Request $request)
{
    $credentials = $request->only($this->username(), 'password');
    $credentials['unconfirmed'] = 5;

    return $credentials;
}


protected function sendFailedLoginResponse(Request $request)
{
    $errors = [$this->username() => trans('auth.failed')];

    // Load user from database
    $user = Professor::where($this->username(), $request->{$this->username()})->first();

    // Check if user was successfully loaded, that the password matches
    // and active is not 1. If so, override the default error message.
    if ($user && Hash::check($request->password, $user->password) && $user->unconfirmed != 5) {
        $errors = [$this->username() => 'Sua conta não está ativa, entre em contato conosco.'];
    }

    if ($request->expectsJson()) {
        return response()->json($errors, 422);
    }

    return redirect()->back()
        ->withInput($request->only($this->username(), 'remember'))
        ->withErrors($errors);
}



}