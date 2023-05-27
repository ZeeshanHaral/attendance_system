<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\Courses;
use App\Models\Teachers;
use App\Models\Attendence;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class Admin extends Controller
{
    public function login(){
        return view("admin/login");
    }

    public function dashboard(){
        return view("admin/dashboard");
    }

    public function add_teacher(){
        $all_teacher = teachers::all();
        


        return view("admin/add_teachers", [
            'allteachers' => $all_teacher
        ]);
    }
    public function teacheredit(){
        $all_teacher = teachers::all();


        return view("admin/teacherEdit", [
            'allteachers' => $all_teacher
        ]);
    }



    public function add_course(){
        $student_courses = courses::all();

        return view("admin/add_course", [
            'student_course' => $student_courses
        ]);
    }
    public function destroyaddcourse($id)
    {
        
        $addCourseID = $id;
     
        $deleteRecord = DB::table('courses')->where('CourseCode', $addCourseID)->delete();

        if($deleteRecord){
            // Redirect or return a response
            return redirect()->back()->with('status', 'Student Courses record deleted successfully!');
        }else{
            // Redirect or return a response
            return redirect()->back()->with('status', 'Cannot delete');
        }
        
    }

    public function add_student(){
        $students = students::all();

        return view("admin/add_student", [
            'students' => $students 
        ]);
    }
    public function studentEdit(){
        $students = students::all();

        return view("admin/studentEdit", [
            'students' => $students 
        ]);
    }

   
    public function student_courseedit(){
        $student_courses = Courses::all();
        $students = Students::all();
        
    
        return view("admin/student_courseedit", [
            'student_courses' => $student_courses,
            'students' => $students
        ]);
    }
    
    public function editcourse(){
        $student_courses = Courses::all();
        $students = Students::all();
        
    
        return view("admin/courseEdit", [
            'student_courses' => $student_courses,
            'students' => $students
        ]);
    }
    
    public function attendance($id){
   
        
      
        $all_courses = DB::table('studentcourses')->where('StudentID', $id)->get();

        return view("admin/studentAtt-view", [ 
            'courses' => $all_courses 
        ]);
    }

    public function attendanceEdit(){
        $all_teacher = teachers::all();
        $all_student = Students::all();
        $all_courses = Courses::all();
        $attendence = attendence::all();


        return view("admin/edit_attendance", [
            'teachers' => $all_teacher,
            'students' => $all_student,
            'courses' => $all_courses,
            'attendence' => $attendence
        ]);
    }


    public function storeteacher(Request $request)
    {
        $teacherName = $request->input('teacher_name');
        $email = $request->input('email');
        $password = Hash::make($request->input('formpassword'));
        $teachsField = $request->input('teachs_field');

        // Check if teacher with the same email already exists
        $existingTeacher = DB::table('teachers')
            ->where('email', $email)
            ->first();

        if ($existingTeacher) {
            return redirect()->back()->with('error', 'Teacher with the same email already exists!');
        }

        // Insert the new teacher record
        $updateTeacher = DB::table('teachers')->insert([
            'TeacherName' => $teacherName,
            'email' => $email,
            'password' => $password
        ]);

        return redirect()->back()->with('status', 'Teacher added successfully!');

    }
    
    public function updateteacher(Request $request)
    {
        
        $teacherID =  $request->input('teacherID');
        $teacherName = $request->input('teacher_name');
        $email = $request->input('email'); 



         DB::table('teachers')
        ->where('TeacherID', $teacherID) // Assuming $teacherID holds the ID of the teacher you want to update
        ->update([
            'TeacherName' => $teacherName,
            'email' => $email
        ]);

        

        return redirect()->back()->with('status', 'Teacher Updated successfully!');
    }
    


    public function storestudent(Request $request)
    {
        $studentName = $request->input('student_name');
        $email = $request->input('email');
        $password = Hash::make($request->input('formpassword'));
        $semester = $request->input('Semester');
        
        // Check if student with the same email already exists
        $existingStudent = DB::table('students')
            ->where('email', $email)
            ->first();
        
        if ($existingStudent) {
            return redirect()->back()->with('error', 'Student with the same email already exists!');
        }
        
        // Insert the new student record
        DB::table('students')->insert([
            'StudentName' => $studentName,
            'email' => $email,
            'password' => $password,
            'Semester' => $semester
        ]);
        
        return redirect()->back()->with('status', 'Student added successfully!');
        
    }

    public function updatestudent(Request $request)
    {
        $studentID =  $request->input('StudentID');
        $StudentName = $request->input('student_name');
        $email = $request->input('email'); 
        $semester = $request->input('Semester');
        

         DB::table('students')
        ->where('StudentID', $studentID) // Assuming $teacherID holds the ID of the teacher you want to update
        ->update([
            'StudentName' => $StudentName,
            'email' => $email, 
            'Semester' => $semester
            
        ]);
        return redirect()->back()->with('status', 'Student Updated successfully!');
    }

    public function destroystudent($id)
    {
        
        $studentCourseID = $id;
     
        try {
            $deleteRecord = DB::table('students')->where('StudentID', $studentCourseID)->delete();
        
            if ($deleteRecord) {
                // Redirect or return a response
                return redirect()->back()->with('status', 'Student Courses record deleted successfully!');
            } else {
                // Redirect or return a response
                return redirect()->back()->with('status', 'Cannot delete');
            }
        } catch (\Illuminate\Database\QueryException $e) {
            // Check if the error is due to a foreign key constraint violation
            if ($e->getCode() === '23000') {
                // Redirect or return a response with the appropriate alert message
                return redirect()->back()->with('error', 'Please delete the related data first.');
            } else {
                // Redirect or return a response with a general error message
                return redirect()->back()->with('error', 'An error occurred while deleting the student courses record.');
            }
        }
        
        
    }


    public function storecourse(Request $request)
    {
        $courseCode = $request->input('courseCode');
        $courseName = $request->input('course_name');
        $creditHours = $request->input('credit_hours');

        DB::table('courses')->insert([
            'CourseCode' => $courseCode,
            'CourseName' => $courseName,
            'CreditHours' => $creditHours
        ]);

        return redirect()->back()->with('status', 'Course added successfully!');
    }
    public function update_course(Request $request)
    {
        $courseid = $request->input('courseCode');
        $courseName = $request->input('course_name');
        $creditHours = $request->input('credit_hours');

         DB::table('courses')->where('CourseCode', $courseid) // Assuming $StudentID holds the ID of the teacher you want to update
        ->update([
            
            'CourseCode' => $courseid,
            'CourseName' => $courseName,
            'CreditHours' => $creditHours
        ]);

    
        return redirect()->back()->with('status', 'Course Updated successfully!');
    }


    public function student_course(){
        $student_courses = Courses::all();
        $students = Students::all();
        $studentsCourses = DB::table('studentcourses')->get();
    
        return view("admin/student_course", [
            'student_courses' => $student_courses,
            'students' => $students,
            'studentsCourses' => $studentsCourses
        ]);


    }


    public function storestudentcourse(Request $request)
    {
        $StudentID = $request->input('student_id');
        $CourseCode = $request->input('course_code');
    
        // Check if the same record already exists
        $existingRecord = DB::table('studentcourses')
            ->where('StudentID', $StudentID)
            ->where('CourseCode', $CourseCode)
            ->first();
    
        if ($existingRecord) {
            return redirect()->back()->with('status', 'Already assigned the same course to this student!');
        }
    
        DB::table('studentcourses')->insert([
            'StudentID' => $StudentID,
            'CourseCode' => $CourseCode
        ]);
    
        return redirect()->back()->with('status', 'Student Assign Course added successfully!');
    }
    


    public function teacher_course(){
        $student_courses = Courses::all();
        $students = Teachers::all();
        $studentsCourses = DB::table('teachs')->get();
    
        return view("admin/teacher_course", [
            'student_courses' => $student_courses,
            'students' => $students,
            'studentsCourses' => $studentsCourses
        ]);


    }


    public function storeteachercourse(Request $request)
    {
        $StudentID = $request->input('student_id');
        $CourseCode = $request->input('course_code');
    
        // Check if the same record already exists
        $existingRecord = DB::table('teachs')
            ->where('TeacherID', $StudentID)
            ->where('CourseCode', $CourseCode)
            ->first();
    
        if ($existingRecord) {
            return redirect()->back()->with('status', 'Already assigned the same course to this teacher!');
        }
    
        // Check if the course is already assigned to another teacher
        $assignedTo = DB::table('teachs')
            ->where('CourseCode', $CourseCode)
            ->where('TeacherID', '!=', $StudentID)
            ->first();
    
        if ($assignedTo) {
            $teacherName = DB::table('teachers')->where('TeacherID', $assignedTo->TeacherID)->value('TeacherName');
            return redirect()->back()->with('status', "This course is already assigned to another teacher: $teacherName");
        }
    
        DB::table('teachs')->insert([
            'TeacherID' => $StudentID,
            'CourseCode' => $CourseCode
        ]);
    
        return redirect()->back()->with('status', 'Teacher Assign Course added successfully!');
    }
    


    public function update_tecourse(Request $request)
    {
        $crs_id = $request->input('crs_id');
        $student_id = $request->input('student_id');
        $CourseCode = $request->input('course_code');
        
        // Check if the same record already exists
        $existingRecord = DB::table('teachs')
            ->where('TeacherID', $student_id)
            ->where('CourseCode', $CourseCode)
            ->where('ID', '!=', $crs_id)
            ->first();
    
        if ($existingRecord) {
            $assignedTeacherName = DB::table('teachers')->where('TeacherID', $existingRecord->TeacherID)->value('TeacherName');
            return redirect()->back()->with('status', "This course is already assigned to  this teacher");
        }
    
        // Check if the course is already assigned to another teacher
        $assignedToAnotherTeacher = DB::table('teachs')
            ->where('CourseCode', $CourseCode)
            ->where('TeacherID', '!=', $student_id)
            ->first();
    
        if ($assignedToAnotherTeacher) {
            $assignedTeacherName = DB::table('teachers')->where('TeacherID', $assignedToAnotherTeacher->TeacherID)->value('TeacherName');
            return redirect()->back()->with('status', "This course is already assigned to another teacher: $assignedTeacherName");
        }
    
        $updateCourse = DB::table('teachs')
            ->where('ID', $crs_id)
            ->update([
                'TeacherID' => $student_id,
                'CourseCode' => $CourseCode
            ]);
        
        if ($updateCourse) {
            return redirect()->back()->with('status', 'Teacher Assign Course updated successfully!');
        } else {
            return redirect()->back()->with('status', 'This course is already assigned to this teacher');
        }
    }
    



public function teacher_courseedit(){
    $student_courses = Courses::all();
    $students = Students::all();
    

    return view("admin/teacher_courseedit", [
        'student_courses' => $student_courses,
        'students' => $students
    ]);
}

public function destroyTeacherCour($id)
{
    
    $teacherCourseID = $id;
 
    try {
        $deleteRecord = DB::table('teachs')->where('ID', $teacherCourseID)->delete();
    
        if ($deleteRecord) {
            // Redirect or return a response
            return redirect()->back()->with('status', 'Teacher Assigned Courses record deleted successfully!');
        } else {
            // Redirect or return a response
            return redirect()->back()->with('status', 'Teacher Assigned Courses record cannot be deleted');
        }
    } catch (\Illuminate\Database\QueryException $e) {
        // Check if the error is due to a foreign key constraint violation
        if ($e->getCode() === '23000') {
            // Redirect or return a response with the appropriate alert message
            return redirect()->back()->with('error', 'Please delete the related data first.');
        } else {
            // Redirect or return a response with a general error message
            return redirect()->back()->with('error', 'An error occurred while deleting the Teacher Assigned Courses record.');
        }
    }
    
    
}







public function destroyTeacherCourse($id)
{
   
    $teacherCourseID = $id;

    try {
        $deleteRecord = DB::table('teachers')->where('teacherID', $teacherCourseID)->delete();
    
        if ($deleteRecord) {
            // Redirect or return a response
            return redirect()->back()->with('status', 'Teacher record deleted successfully!');
        } else {
            // Redirect or return a response
            return redirect()->back()->with('status', 'Teacher record cannot be deleted');
        }
    } catch (\Illuminate\Database\QueryException $e) {
        $errorMessage = 'Cannot delete';
    
        // Check if the error is due to a foreign key constraint violation
        if (DB::getDriverName() === 'mysql' && $e->getCode() === '23000') {
            $errorMessage = 'Please delete the foreign key related data first';
        }
    
        // Redirect or return a response
        return redirect()->back()->with('status', $errorMessage);
    }
    
    
}





public function update_stcourse(Request $request)
{
    $crs_id = $request->input('crs_id');
    $student_id = $request->input('student_id');
    $CourseCode = $request->input('course_code');
    
    // Check if the same record already exists
    $existingRecord = DB::table('studentcourses')
        ->where('StudentID', $student_id)
        ->where('CourseCode', $CourseCode)
        ->where('ID', '!=', $crs_id)
        ->first();

    if ($existingRecord) {
        return redirect()->back()->with('status', 'Already assigned the same course to this student!');
    }

    $updateCourse = DB::table('studentcourses')
        ->where('ID', $crs_id)
        ->update([
            'StudentID' => $student_id,
            'CourseCode' => $CourseCode
        ]);
    
    if ($updateCourse) {
        return redirect()->back()->with('status', 'Assigned Course updated successfully!');
    } else {
        return redirect()->back()->with('status', 'Already assigned the same course to this student!');
    }
}




public function destroyStudentCourse($id)
{
    $studentCourseID = $id;

    try {
        $deleteRecord = DB::table('studentcourses')->where('ID', $studentCourseID)->delete();

        if ($deleteRecord) {
            // Redirect or return a response
            return redirect()->back()->with('status', 'Student Assigned Courses record deleted successfully!');
        } else {
            // Redirect or return a response
            return redirect()->back()->with('status', 'Something Went Wrong!');
        }
    } catch (\Illuminate\Database\QueryException $e) {
        $errorMessage = 'Something Went Wrong!';

        // Check if the error is due to a foreign key constraint violation
        if (DB::getDriverName() === 'mysql' && $e->getCode() === '23000') {
            $errorMessage = 'Please delete the foreign key related data first';
        }

        // Redirect or return a response
        return redirect()->back()->with('status', $errorMessage);
    }
}

    public function attendence(Request $request)
    {
        $Status = $request->input('Status');
        $lecture = $request->input('LectureNo');
        $studentid = $request->input('StudentID');
        $date = $request->input('Date');
        $teacherid = $request->input('TeacherID');
        $coursecode = $request->input('CourseCode');


        


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




















}