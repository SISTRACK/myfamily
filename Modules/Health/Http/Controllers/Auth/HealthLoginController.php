<?php

namespace Modules\Health\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class HealthLoginController extends Controller
{
    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';
       public function __construct()
       {
           $this->middleware('guest:health')->except('logout');
       }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('health::Doctor.Auth.login');
    }

    public function loginHealth(Request $request)
    {

      // Validate the form data
      $request->validate([
        'email'   => 'required|email',
        'password' => 'required|min:6'
      ]);
      // Attempt to log the user in
      if (Auth::guard('health')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        // if successful, then redirect to their intended location
        return redirect()->intended(route('health.dashboard'));
      }
      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('health')->logout();
        return redirect()->route('health.auth.login');
    }
}
