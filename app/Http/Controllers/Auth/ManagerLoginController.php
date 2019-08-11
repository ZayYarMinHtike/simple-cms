<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class ManagerLoginController extends Controller
{
    //
    use AuthenticatesUsers;
    
    /**
    * Where to redirect users after login.
    *
    * @var string
    */
    protected $redirectTo = '/manager';
    
    public function __construct()
    {
        $this->middleware('guest:manager')->except('logout');
    }
    
    public function showManagerLoginForm()
    {
        return view('auth.login', ['url' => 'manager']);
    }
    
    public function managerLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
            ]);
            
            if (Auth::guard('manager')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
                
                return redirect()->intended('/manager');
            }
            return back()->withInput($request->only('email', 'remember'));
    }    
        
}
    