<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function adminLogin(Request $request)
    {
        // Check if the "password" field exists in the request data
        if ($request->has('password')) {
            $email = $request->input('email');
            $password = $request->input('password');
            
            // Authenticate the user using Laravel's built-in Auth facade and the 'admin' guard
            if (Auth::guard('admin')->attempt(['email' => $email, 'password' => $password])) {
                return redirect('/admin/dashboard');
            } else {
              
                // Authentication failed
                return back()->withErrors([
                    'email' => 'Invalid credentials',
                ]);
            }
        } else {
            // "password" field is missing in the request data
            return back()->withErrors([
                'password' => 'Password is required',
            ]);
        }
    }


  

    public function teacherLogin(Request $request)
    {
       // Check if the "password" field exists in the request data
       if ($request->has('password')) {
        $email = $request->input('email');
        $password = $request->input('password');
       
        // Authenticate the user using Laravel's built-in Auth facade and the 'teacher' guard
        if (Auth::guard('teacher')->attempt(['email' => $email, 'password' => $password])) {
            return redirect('/teacher/dashboard');
        } else {
            
            // Authentication failed
            return back()->withErrors([
                'email' => 'Invalid credentials',
            ]);
        }
    } else {
        // "password" field is missing in the request data
        return back()->withErrors([
            'password' => 'Password is required',
        ]);
    }
    }

    public function studentLogin(Request $request)
    {
        // Check if the "password" field exists in the request data
        if ($request->has('password')) {
            $email = $request->input('email');
            $password = $request->input('password');
            
            // Authenticate the user using Laravel's built-in Auth facade and the 'coordinator' guard
            if (Auth::guard('student')->attempt(['email' => $email, 'password' => $password])) {
                return redirect('/student/dashboard');
            } else {
                // Authentication failed
                return back()->withErrors([
                    'email' => 'Invalid credentials',
                ]);
            }
        } else {
            // "password" field is missing in the request data
            return back()->withErrors([
                'password' => 'Password is required',
            ]);
        }
    }


  

    public function logout()
    {
        Auth::guard('admin')->logout();

        // Redirect to the login page or any other page you desire
        return redirect()->route('login');
    }

  
    public function logoutTeacher()
    {
        Auth::guard('teacher')->logout();

        // Redirect to the login page or any other page you desire
        return redirect()->route('login');
    }
    public function logoutStudent()
    {
        Auth::guard('student')->logout();

        // Redirect to the login page or any other page you desire
        return redirect()->route('login');
    }

}
