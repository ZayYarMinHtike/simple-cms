<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class AdminLoginController extends Controller
{
    //
    use AuthenticatesUsers;
    
    /**
    * Where to redirect users after login.
    *
    * @var string
    */
    protected $redirectTo = '/administrator';
    
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }
    
    public function showAdminLoginForm()
    {
        return view('auth.login', ['url' => 'admin']);
    }
    
    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
            ]);
            
            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
                
                return redirect()->intended('/administrator');
            }
            return back()->withInput($request->only('email', 'remember'));
    }    
    
}
    