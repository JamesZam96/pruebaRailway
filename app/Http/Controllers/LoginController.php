<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function showLoginFormCustomer()
    {
        return view('auth.customer_login');
    }
    
    public function showLoginFormCompany()
    {
        return view('auth.company_login');
    }

    public function loginCustomer(Request $request)
    {

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->roles->contains('name','customer')){
                $request->session()->regenerate();
                return redirect()->route('home.customer');
            }else{
                Auth::logout();
                return back()->withErrors(['role' => 'You do not have permission to access this area.',]);
            }
            
        }

        return back()->withErrors(['email' => 'The provided credentials do not match our records.',]);
    }

    public function loginCompany(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->roles->contains('name','company')){
                $request->session()->regenerate();
                return redirect()->route('home.company');
            }else{
                Auth::logout();
                return back()->withErrors(['role' => 'You do not have permission to access this area.',]);
            }
            
        }

        return back()->withErrors(['email' => 'The provided credentials do not match our records.',]);
    }

    public function logoutCustomer(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.form.customer');
    }

    public function logoutCompany(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.form.company');
    }

}