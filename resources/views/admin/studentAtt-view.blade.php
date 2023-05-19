@extends('layouts.admin')
@section('Title', 'Attendance - Admin')
@section('content')


<div class="main_content">

    <div class="all_tables">
        <h3 class="sec_head">Attendance</h3>
        <table class="table table-striped">
            <thead class="">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Course Name</th>
                <th scope="col">Course Code</th>
                <th scope="col">Attendance Percentage</th> 
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($courses as $course)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>
                            <?php

                                $course_code = $course->CourseCode;

                                $getcourse = DB::table('courses')->where('CourseCode', $course_code)->first();

                                echo $getcourse->CourseName;


                            ?> 
                        </td>
                        
                        <td>{{$course_code}}</td>
                        <td>

                        <?php 
                            
                            $student_id =request()->segment(3);
                            
                            $courseCode = $course->CourseCode;
                            
                            $coursesst = DB::table('courses')->where('CourseCode', $courseCode)->first();
                            
                            
                            $absentCountper = DB::table('attendence')
                                ->where('Status', 1)
                                ->where('StudentID', $student_id)
                                ->where('CourseCode', $courseCode)
                                ->count();
                            
                            $presentCountper = DB::table('attendence')
                                ->where('Status', 2)
                                ->where('StudentID', $student_id)
                                ->where('CourseCode', $courseCode)
                                ->count();
                            
                                $totalCountper = $absentCountper + $presentCountper;
                               
                                if ($totalCountper != 0) {
                                    $presentPercentage = ($presentCountper / $totalCountper) * 100;
                                    $absentPercentage = ($absentCountper / $totalCountper) * 100;
                                
                                    $presentPercentage = number_format($presentPercentage, 2);
                                    $absentPercentage = number_format($absentPercentage, 2);
                                
                                    echo $presentPercentage . '%';
                                } else {
                                    echo "Not Yet Uploaded";
                                }
                            
                            ?>

                        </td>
                        <td>
                            <?php 
                            
                            if ($totalCountper > 0) {
                            ?>
                                
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#cross{{ $course->ID }}" style="background-color: green;">View Attendance</button>
                                    <div class="modal fade" id="cross{{ $course->ID }}" tabindex="-1" role="dialog" aria-labelledby="crossModalLabel{{ $course->ID }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document" style="max-width: 90%;">
                                            <div class="modal-content">
                                                <div class="modal-header">  
                                                        <h5 class="modal-title" id="crossModalLabel{{ $course->ID }}">View Attendance List of Course Code: {{$course_code}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body"> 
                                                    <div class="row">   
                                                        <div class="col-lg-12 col-sm-12">
                                                            <?php 
                                                            
                                                            $attendanceall = DB::table('attendence')
                                                            ->where('StudentID', $student_id)
                                                            ->where('CourseCode', $courseCode)
                                                            ->get(); 
                                                            ?>

                                                                <table class="table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>#</th>
                                                                            <th>Status</th>
                                                                            <th>Lecture No.</th>
                                                                            <th>Date</th>
                                                                            <th>Student</th>
                                                                            <th>Teacher</th>
                                                                            <th>Course Code</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                @foreach($attendanceall as $attendence)
                                                                    <tr>
                                                                        <th scope="row">{{ $loop->iteration }}</th>
                                                                        <td>
                                                                            <?php
                                                                                if($attendence->Status == 1){
                                                                                echo '<option value ="'.$attendence->Status.'" selected>Present</option>';   
                                                                                }else{
                                                                                    echo '<option value ="'.$attendence->Status.'" selected>Absent</option>';  
                                                                                }
                                                                            ?> 
                                                                        </td>
                                                                        
                                                                        <td>{{$attendence->LectureNo}}</td>
                                                                        <td>{{$attendence->Date}}</td>
                                                                        <td>
                                                                            
                                                                            <?php  
                                                                                $student_id = $attendence->StudentID;   
                                                                                $student = DB::table('students')->where('StudentID', $student_id)->first();
                                                                                echo $student->StudentName;
                                                                            ?>

                                                                        </td>
                                                                        <td>
                                                                            <?php  
                                                                                $Teacher_id = $attendence->TeacherID;   
                                                                                $Teacher = DB::table('teachers')->where('TeacherID', $Teacher_id)->first();
                                                                                echo $Teacher->TeacherName;
                                                                            ?>

                                                                        </td>
                                                                        <td>{{$attendence->CourseCode}}</td>
                                                                    </tr>
                                                                    </tbody>
                                                                @endforeach
                                                                </table>
                                                        </div>
                                                    </div>
                                                </form> 
                                                </div> 
                                            </div>
                                        </div>
                                    </div>


                            <?php
                            } else {
                            ?>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#cross{{ $course->ID }}" style="background-color: grey; color:black;" disabled>Not yet Uploaded</button>
                            <?php
                            }
                            
                            ?>
                        

                        </td>
                    
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>









@endsection