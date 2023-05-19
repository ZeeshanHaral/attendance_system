@extends('layouts.student')
@section('Title', 'My Courses - Student')
@section('content')

<div class="main_content">
    <div class="all_tables">
        <h3 class="sec_head">All Courses</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Course Code</th>
                    <th scope="col">Course Name</th>
                    <th scope="col">Teacher Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($courses as $course)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $course->CourseCode }}</td>
                        <td>
                            <?php 
                                $coursecode = $course->CourseCode;
                                $getcourse = DB::table('courses')->where('CourseCode', $coursecode)->first();
                                if ($getcourse) {
                                    echo $getcourse->CourseName;
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                $courCode = $getcourse->CourseCode ?? null;
                                $getteachs = DB::table('teachs')->where('CourseCode', $courCode)->first();
                                if ($getteachs) {
                                    $teacher_id = $getteachs->TeacherID;
                                    $getteachers = DB::table('teachers')->where('TeacherID', $teacher_id)->first();
                                    if ($getteachers) {
                                        echo $getteachers->TeacherName;
                                    }
                                }
                            ?>
                        </td>
                        <td>
                            <a href="{{ route('studentcourse_attendance', ['course_code' => $coursecode]) }}" class="for-color">View Attendance</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
