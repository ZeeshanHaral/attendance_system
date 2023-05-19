@extends('layouts.teacher')
@section('Title', 'Attendance - Teacher')
@section('content')


<div class="main_content">

    <div class="login-form-here">
        <form action="{{ route('teacherattendance.edit') }}" method="POST">
            @csrf
            <h3 class="sec_head">Edit Attendance </h3>
            <div class="row">
                <!-- Status input -->
                <?php
                    $att_id = request()->get('att_id');   
                    $attendence = DB::table('attendence')->where('AttendenceID', $att_id)->first();
                    
                    $att_status = $attendence->Status;
                   
                    if($att_status == 1){
                        echo '<option value ="'.$attendence->Status.'" selected>Absent</option>';   
                    }elseif($att_status == 2){
                        echo '<option value ="'.$attendence->Status.'" selected>Present</option>';  
                    }
                    
                ?>
            <input type="text" name="att_id" value="{{$att_id}}" class="form-control" hidden/>
               <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="status">Status</label>
                    <select class="form-control" name="Status" id="status">
                        
                        <option value ="1"> Present</option>
                        <option value="2"> Absent</option>
                    </select>
                    
                </div>
                
                <!-- Lecture input -->
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="lecture">Lecture No</label>
                    <input type="text" id="teacher_id" value="{{$attendence->LectureNo}}" name="LectureNo" class="form-control" required />
                </div>
                <!-- Date input -->
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="date">Date</label>
                    
                    <input type="date" value="{{ $date_att->Date ?? '' }}" id="date" name="Date" class="form-control" />
                </div>
                <!-- Student input -->
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="studentId">Student Name</label>
                    <select class="form-control"  name="StudentID" id="teacher_id">
                        <?php 
                                $student_id = $attendence->StudentID;
                                $student = DB::table('students')->where('StudentID', $student_id)->first();
                              
                                echo '<option value="'.$attendence->StudentID.'" selected>'.$student->StudentName.'</option>';

                            ?>
                        @foreach($students as $student)
                            <option value="{{$student->StudentID}}">{{$student->StudentName}}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Course Code input -->
                <div class="col-lg-6 col-sm-12">
                    <label for="course_code">Course Code</label>
                    <select class="form-control" name="CourseCode" id="Course Code">
                        @foreach($courses as $course)
                            <option value="{{$course->CourseCode}}">{{$attendence->CourseCode}}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Submit button -->
                <div class="col-lg-12 col-sm-12">
                    <button type="Submit" class="btn btn-primary btn-block mb-4"> ADD Attendance</button>
                </div>
            </div>
        </form>
    </div>

 
</div>









@endsection