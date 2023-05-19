<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendence;
use App\Models\Teachers;
use App\Models\Students;
use App\Models\Courses;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Teacher extends Controller
{
    public function login(){

        return view("teacher/login");
    }

    public function dashboard(){

        return view("teacher/dashboard");
    }

    public function all_course(){
        $teacherID = Auth::id();
        
        $assign_courses = DB::table('teachs')->where('TeacherID', $teacherID)->get();


        return view("teacher/all_course", [

        'assign_courses' => $assign_courses
        ]);
    }

    public function singleCourse($id){
        $teacherID = Auth::id();

        $students = DB::table('studentcourses') 
        ->where('CourseCode', $id) // Add the first WHERE condition 
        ->get();
        
        return view("teacher/single_course", [

        'students' => $students

        ]);

        
    }




    public function deleteAttendance($id)
    {
        

        try {
            DB::table('attendence')->where('AttendenceID', $id)->delete();
            return redirect()->back()->with('status', 'Record deleted successfully');
            
            // If the deletion is successful, display a success message
            // Else, display an alert informing that child records exist
        } catch (\Illuminate\Database\QueryException $exception) {
            if ($exception->getCode() === 23000) {
                return redirect()->back()->with('status','Cannot Delete this record If you still want to delete the department, you must first delete the child records');
            } else {
                return redirect()->back()->with('status','Cannot Delete this record If you still want to delete the department, you must first delete the child records');
            }
        }
    }




    public function attendance(){
        $all_teacher = teachers::all();
        $all_student = students::all();
        $all_courses = Courses::all();
        $attendence = attendence::all();


        return view("teacher/attendance", [
            'teachers' => $all_teacher,
            'students' => $all_student,
            'courses' => $all_courses,
            'attendence' => $attendence
        ]);
    }

    public function attendanceadd(Request $request)
    {
        $Status = $request->input('Status');
        $lecture = $request->input('LectureNo');
        $studentid = $request->input('StudentID');
        $date = $request->input('Date');
        $teacherid = Auth::id();
        $coursecode = $request->input('CourseCode');


        dd($teacherid);


        DB::table('attendence')->insert([
            'Status' => $Status,
            'LectureNo' => $lecture,
            'StudentID' => $studentid,
            'Date' => $date,
            'TeacherID' => $teacherid,
            'CourseCode' => $coursecode
        ]); 

        return redirect()->back()->with('status', 'Student added successfully!');
    }
    public function attendanceEdit(Request $request)
    {
        
       
        $attendence = attendence::all();
       
       


        return view("teacher/attendance", [
            
        
            'attendence' => $attendence
        ]);




    }

    public function attendence(Request $request)
    {
        $status = $request->input('Status');
        $lecture = $request->input('LectureNo');
        $studentId = $request->input('StudentID');
        $date = $request->input('Date');
        $teacherId = Auth::id();
        $courseCode = $request->input('CourseCode');
    
        $existingDateRecord = DB::table('attendence')
            ->where('Date', $date)
            ->where('CourseCode', $courseCode)
            ->where('StudentID', $studentId)
            ->exists();
    
        $existingLectureRecord = DB::table('attendence')
            ->where('LectureNo', $lecture)
            ->where('CourseCode', $courseCode)
            ->where('StudentID', $studentId)
            ->exists();
    
        if ($existingDateRecord) {
            // Record with the same date and student ID already exists
            // You can show an error message or handle it as per your requirement
            return redirect()->back()->with(['status' => 'Attendance record with the same date already exists.']);
        }
    
        if ($existingLectureRecord) {
            // Record with the same lecture number and student ID already exists
            // You can show an error message or handle it as per your requirement
            return redirect()->back()->with(['status' => 'Attendance record with the same lecture number already exists.']);
        }
    
        DB::table('attendence')->insert([
            'Status' => $status,
            'LectureNo' => $lecture,
            'StudentID' => $studentId,
            'Date' => $date,
            'TeacherID' => $teacherId,
            'CourseCode' => $courseCode
        ]);
    
        // Successful insertion
        return redirect()->back()->with(['status' => 'Attendance recorded successfully.']);
    }
    


    public function attendanceUpdate(Request $request)
{
    $att_id = $request->input('att_id');
    $status = $request->input('Status');
    $lecture = $request->input('LectureNo');
    $studentId = $request->input('StudentID');
    $date = $request->input('Date');
    $courseCode = $request->input('CourseCode');

    $existingDateRecord = DB::table('attendence')
        ->where('Date', $date)
        ->where('CourseCode', $courseCode)
        ->where('StudentID', $studentId)
        ->where('AttendenceID', '!=', $att_id)
        ->exists();

    $existingLectureRecord = DB::table('attendence')
        ->where('LectureNo', $lecture)
        ->where('CourseCode', $courseCode)
        ->where('StudentID', $studentId)
        ->where('AttendenceID', '!=', $att_id)
        ->exists();

    if ($existingDateRecord) {
        // Record with the same date, course code, and student ID already exists
        // You can show an error message or handle it as per your requirement
        return redirect()->back()->with(['status' => 'Attendance record with the same date already exists.']);
    }

    if ($existingLectureRecord) {
        // Record with the same lecture number, course code, and student ID already exists
        // You can show an error message or handle it as per your requirement
        return redirect()->back()->with(['status' => 'Attendance record with the same lecture number already exists.']);
    }

    DB::table('attendence')
        ->where('AttendenceID', $att_id)
        ->update([
            'Status' => $status,
            'LectureNo' => $lecture,
            'StudentID' => $studentId,
            'Date' => $date,
        ]);

    // Successful update
    return redirect()->back()->with('status', 'Your selected attendance has been updated');
}




    public function attendancecourse(){

        return view("teacher/attendence_course");
    }

   

    public function totalCourse(){
        $attendence = attendence::all();

        return view("teacher/total_courses",[
            'attendence' => $attendence
        ]);

    }

}
