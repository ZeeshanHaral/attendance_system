<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Student extends Controller
{

    public function login(){

        return view("student/login");
    }

    public function dashboard(){

        return view("student/dashboard");
    }

    public function my_courses(){

        return view("student/mycourses");
    }

    public function attendance_course(){

        return view("student/attendence_course");
    }

    public function total_courses(){

        return view("student/total_courses");
    }
}
