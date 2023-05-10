<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Index;
use App\Http\Controllers\Teacher;
use App\Http\Controllers\Student;
use App\Http\Controllers\Admin;
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


//Admin login route
Route::get('admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

//Teacher login route
Route::get('teacher/login', 'Auth\TeacherLoginController@showLoginForm')->name('teacher.login');
Route::post('teacher/login', 'Auth\TeacherLoginController@login')->name('teacher.login.submit');

//Student login route
Route::get('student/login', 'Auth\StudentLoginController@showLoginForm')->name('student.login');
Route::post('student/login', 'Auth\StudentLoginController@login')->name('student.login.submit');



//Student Route
Route::get('/admin/login', [Admin::class, 'login'])->name('admin_login');
Route::get('/admin/dashboard', [Admin::class, 'dashboard'])->name('admin_dashboard');
Route::get('/admin/add_teachers', [Admin::class, 'add_teacher'])->name('admin_addteacher');
Route::get('/admin/add_course', [Admin::class, 'add_course'])->name('admin_addcourse');
Route::get('/admin/add_student', [Admin::class, 'add_student'])->name('admin_addstudent');
Route::get('/admin/student_course', [Admin::class, 'student_course'])->name('Admin_studentcourse');
Route::get('/admin/attendance', [Admin::class, 'attendance'])->name('admin_attendance');

//Teacher Routes
Route::get('/teacher/login', [Teacher::class, 'login'])->name('teacherLogin');
Route::get('/teacher/dashboard', [Teacher::class, 'dashboard'])->name('teacherDashboard');
Route::get('/teacher/all_course', [Teacher::class, 'all_course'])->name('teacher_allcourses');
Route::get('/teacher/attendance', [Teacher::class, 'attendance'])->name('teacherAttendance');
Route::get('/teacher/attendance_course', [Teacher::class, 'attendancecourse'])->name('teacherattendanceCourse');
Route::get('/teacher/single_course', [Teacher::class, 'singleCourse'])->name('teachersingleCourses');
Route::get('/teacher/total_courses', [Teacher::class, 'totalCourse'])->name('teachertotalCourse');

//Student Route
Route::get('/student/login', [Student::class, 'login'])->name('student_login');
Route::get('/student/dashboard', [Student::class, 'dashboard'])->name('student_dashboard');
Route::get('/student/mycourses', [Student::class, 'my_courses'])->name('student_mycourses');
Route::get('/student/attendence_course', [Student::class, 'attendance_course'])->name('studentcourse_attendance');
Route::get('/student/total_courses', [Student::class, 'total_courses'])->name('student_allcourse');





