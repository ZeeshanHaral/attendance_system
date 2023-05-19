<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Index;
use App\Http\Controllers\Teacher;
use App\Http\Controllers\Student;
use App\Http\Controllers\Admin;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Main Index page
Route::get('/', [Index::class, 'home'])->name('home');

Route::get('/', [Index::class, 'home'])->name('login');
 



Route::post('admin/login', [AuthController::class, 'adminLogin'])->name('admin.login');

Route::post('teacher/login', [AuthController::class, 'teacherLogin'])->name('teacher.login');
Route::post('student/login', [AuthController::class, 'studentLogin'])->name('student.login');

Route::get('/admin/login', [Admin::class, 'login'])->name('admin_login');

Route::group(['middleware' => ['auth:admin']], function () {
//Admin Route

    Route::get('/admin/dashboard', [Admin::class, 'dashboard'])->name('admin_dashboard');
    Route::get('/admin/add_teachers', [Admin::class, 'add_teacher'])->name('admin_addteacher');
    Route::get('/admin/teacheredit', [Admin::class, 'teacheredit'])->name('admin_teacheredit');


    Route::get('/admin/add_course', [Admin::class, 'add_course'])->name('admin_addcourse');
    Route::get('/admin/EditCourse', [Admin::class, 'editcourse'])->name('admin_editcourse');
    Route::get('/admin/add_student', [Admin::class, 'add_student'])->name('admin_addstudent');
    Route::get('/admin/studentEdit', [Admin::class, 'studentEdit'])->name('admin_studentEdit');
    Route::post('/students/update', [Admin::class, 'updatestudent'])->name('student.update');


    Route::get('/admin/student_course', [Admin::class, 'student_course'])->name('Admin_studentcourse');
    Route::post('/admin/courseupdate', [Admin::class, 'update_stcourse'])->name('update_stcourse');

    Route::get('/admin/student_courseedit', [Admin::class, 'student_courseedit'])->name('admin_editstudentcourse');
    
    Route::get('/admin/attendanceView/{id}', [Admin::class, 'attendance'])->name('admin_attendance');

    Route::get('/admin/edit-attendance', [Admin::class, 'attendanceEdit'])->name('Adminattendance.edit');


    Route::post('/teachers/update', [Admin::class, 'updateteacher'])->name('teachers.update');
    Route::post('/teachers', [Admin::class, 'storeteacher'])->name('teachers.store');
    Route::post('/students', [Admin::class, 'storestudent'])->name('students.store');
    Route::post('/courses', [Admin::class, 'storecourse'])->name('course.store');
    Route::post('/courses/update', [Admin::class, 'update_course'])->name('course.update');

    Route::post('/attendence', [Admin::class, 'attendence'])->name('attendence');
    Route::post('/studentcourse', [Admin::class, 'storestudentcourse'])->name('studentcourse');



    Route::post('/admin/courseupdatet', [Admin::class, 'update_tecourse'])->name('update_tecourse');
    Route::get('/admin/teacher_course', [Admin::class, 'teacher_course'])->name('Admin_teachercourse');
    Route::post('/teachercourse', [Admin::class, 'storeteachercourse'])->name('teachercourse');
    Route::get('/teachercourdelete/{id}', [Admin::class, 'destroyTeacherCour'])->name('teachercour.destroy');
    Route::get('/admin/teacher_courseedit', [Admin::class, 'teacher_courseedit'])->name('admin_editteachercourse');

    //Delete Records
    Route::get('/studentcoursedelete/{id}', [Admin::class, 'destroyStudentCourse'])->name('studentscourse.destroy');
    Route::get('/addteacherdelete/{id}', [Admin::class, 'destroyTeacherCourse'])->name('teacher.destroy');
    Route::get('/addstudentdelete/{id}', [Admin::class, 'destroystudent'])->name('student.destroy');
    Route::get('/addcoursedelete/{id}', [Admin::class, 'destroyaddcourse'])->name('course.destroy');


});









Route::get('/teacher/login', [Teacher::class, 'login'])->name('teacherLogin');

Route::group(['middleware' => ['auth:teacher']], function () {

//Teacher Routes

Route::get('/teacher/dashboard', [Teacher::class, 'dashboard'])->name('teacherDashboard');
Route::get('/teacher/all_course', [Teacher::class, 'all_course'])->name('teacher_allcourses');
Route::get('/teacher/attendance', [Teacher::class, 'attendance'])->name('teacherAttendance');
Route::get('/teacher/attendance_course', [Teacher::class, 'attendancecourse'])->name('teacherattendanceCourse');
Route::get('/teacher/single_course/{id}', [Teacher::class, 'singleCourse'])->name('teachersingleCourses');
Route::get('/teacher/total_courses', [Teacher::class, 'totalCourse'])->name('teachertotalCourse');

Route::get('/teacher/edit-attendance', [Teacher::class, 'attendanceEdit'])->name('teacherattendance.edit');
Route::post('/teacher/update-attendance', [Teacher::class, 'attendanceUpdate'])->name('teacherattendance.update');
Route::POST('/teacher/add-attendance', [Teacher::class, 'attendence'])->name('teacherattendance.add');


Route::get('/admin/deleteAttend/{id}', [Teacher::class, 'deleteAttendance'])->name('teacher_delete_att');




});



Route::get('/students/login', [Student::class, 'login'])->name('student_login');

Route::group(['middleware' => ['auth:student']], function () {
//Student Route

Route::get('/student/dashboard', [Student::class, 'dashboard'])->name('student_dashboard');
Route::get('/student/mycourses', [Student::class, 'my_courses'])->name('student_mycourses');
Route::get('/student/attendence_course', [Student::class, 'attendance_course'])->name('studentcourse_attendance');
Route::get('/student/total_courses', [Student::class, 'total_courses'])->name('student_allcourse');

});








Route::post('/admin/logout', [AuthController::class, 'logout'])->name('logout.admin');
Route::post('/teacher/logout', [AuthController::class, 'logoutTeacher'])->name('logout.teacher');
Route::post('/student/logout', [AuthController::class, 'logoutStudent'])->name('logout.student');

