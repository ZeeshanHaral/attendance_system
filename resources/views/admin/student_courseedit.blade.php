@extends('layouts.admin')
@section('Title', 'Student Courses - Admin')
@section('content')

<div class="main_content">

    <div class="login-form-here">
        <form action="{{ route('update_stcourse') }}" method="POST">
            @csrf
            <h3 class="sec_head">Edit Student Courses</h3>
            <div class="row">
                <?php
                        $courseid = request()->get('studentcourse_id');   
                        $student = DB::table('studentcourses')->where('ID', $courseid)->first();
                        
                       

                        $stu_id = $student->StudentID;
                        $getStudent = DB::table('students')->where('StudentID', $stu_id)->First(); 
                        
                      
                    ?>


                <!-- Hidden input field -->
                <input type="hidden" name="crs_id" value="{{ $courseid }}">
        
                <!-- Student Name input (disabled) -->
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="student_name">Student Name</label>
                    <input type="text" name="student_id" value="{{ $stu_id }}" id="student_id" class="form-control" hidden>
                    <input type="text" name="student_name" value="{{ $getStudent->StudentName }}" id="student_id" class="form-control" disabled>
                </div>
        
                <!-- Course Code select input -->
                <div class="col-lg-6 col-sm-12">
                    <label for="course_code">Course Code</label>
                    <select class="form-control" id="course_code" name="course_code">
                        <?php 
                            $stud_coursecde = $student->CourseCode;    
                        ?>
                        <option value="{{$stud_coursecde}}">{{$stud_coursecde}}</option>
                        @foreach($student_courses as $course)
                            <option value="{{ $course->CourseCode }}">{{ $course->CourseCode }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-12 col-sm-12">
                    <button type="submit" class="btn btn-primary btn-block mb-4">Edit Course</button>
                </div>
            </div>
        </form>
        

 






    </div>


</div>



@endsection