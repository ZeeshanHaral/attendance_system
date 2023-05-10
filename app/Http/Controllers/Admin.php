<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Admin extends Controller
{
    public function login(){
        return view("admin/login");
    }

    public function dashboard(){
        return view("admin/dashboard");
    }

    public function add_teacher(){
        return view("admin/add_teachers");
    }

    public function add_course(){
        return view("admin/add_course");
    }
    public function add_student(){
        return view("admin/add_student");
    }
    public function student_course(){
        return view("admin/student_course");
    }

    public function attendance(){
        return view("admin/attendance");
    }
}
