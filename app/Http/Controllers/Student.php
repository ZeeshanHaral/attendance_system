<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Attendence;
use App\Models\Teachers;
use App\Models\Students;
use App\Models\Courses;
use App\Models\Studentcourse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; 


class Student extends Controller
{

    public function login(){

        return view("student/login");
    }

    public function dashboard(){

        $studentID = Auth::id();

        $coursesst = DB::table('studentcourses')->where('StudentID', $studentID)->get();

        return view("student/dashboard",compact('coursesst'));



    }

    public function my_courses(){
 
        $studentID = Auth::id();

        $courses = DB::table('studentcourses')->where('StudentID', $studentID)->get();
        $attendence = attendence::all();
        
        return view("student/mycourses", [
            
            'courses' => $courses,
            'attendence' => $attendence

            
        ]);
    }

    public function attendance_course(){
        $studentID = Auth::id();
        $courseCode = request('course_code'); // Assuming the variable name in the URL is 'course_code'
    
        $attendance = DB::table('attendence')
            ->where('StudentID', $studentID)
            ->where('CourseCode', $courseCode)
            ->get();
    
        return view("student.attendence_course", [
            'attendances' => $attendance
        ]);
    }
    

    public function total_courses(){
 
        $studentID = '1';

        $courses = DB::table('studentcourses')->where('StudentID', $studentID)->get();
        $attendence = attendence::all();
        return view("student/total_courses", [
            
            'courses' => $courses,
            'attendence' => $attendence
        ]);
    }



}


