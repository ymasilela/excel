<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create()
    {
        return view('registration.login');
    }
    
    public function store()
    {
        if (auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'The email or password is incorrect, please try again'
            ]);
        }
        
        return redirect()->to('/employee');
    }
    
    public function destroy()
    {
        auth()->logout();
        
        return redirect()->to('/');
    }
    public function logins()
    {
       
        
        return redirect()->to('/');
    }
}
