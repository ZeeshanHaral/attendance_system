<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Teacher extends Controller
{
    public function login(){

        return view("teacher/login");
    }

    public function dashboard(){

        return view("teacher/dashboard");
    }

    public function all_course(){

        return view("teacher/all_course");
    }


    public function attendance(){

        return view("teacher/attendance");
    }

    public function attendancecourse(){

        return view("teacher/attendence_course");
    }

    public function singleCourse(){

        return view("teacher/single_course");
    }

    public function totalCourse(){

        return view("teacher/total_courses");
    }

}
