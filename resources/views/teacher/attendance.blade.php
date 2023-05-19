@extends('layouts.teacher')
@section('Title', 'Attendance - Teacher')
@section('content')




<div class="main_content">

    <div class="login-form-here">
        <form action="{{ route('teacherattendance.update') }}" method="POST">
            @csrf
            <?php 
                $att_id = request()->input('att_id');
                $attend = DB::table('attendence')
                ->where('AttendenceID', $att_id) 
                ->first();
            
            
                $getstudent = DB::table('students')
                ->where('StudentID', $attend->StudentID) 
                ->first();

                $courses = DB::table('teachs')
                ->where('TeacherID', Auth::id()) 
                ->get();

               
            ?>
            
            
            <h3 class="sec_head">Edit Attendance of <span class="badge badge-success">{{$getstudent->StudentName}}</span>  <span class="badge badge-success">{{$attend->CourseCode}}</span> </h3>



            <div class="row">
                    <input type="text" id="date" name="TeacherID" value="{{Auth::id()}}" class="form-control" hidden/>
                    <input type="text" name="att_id" value="{{$att_id}}" hidden/>
                <!-- Status input -->
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="status">Status</label>
                    <select class="form-control" name="Status" id="status">
                        <?php   
                        
                            $att_status = $attend->Status;
                        
                            if($att_status == 1){
                                echo '<option value ="'.$attend->Status.'" selected>Absent</option>';   
                            }elseif($att_status == 2){
                                echo '<option value ="'.$attend->Status.'" selected>Present</option>';  
                            }
                        
                        ?>
                    
                        <option value="2"> Present</option>
                        <option value="1"> Absent</option>
                    </select>
                    
                </div>
                <!-- Lecture input -->
                <?php
                    // $studentId = $attend->StudentID;
                    // $courseCode = $attend->CourseCode;
                    // $existingLectures = DB::table('attendence')
                    //     ->where('StudentID', $studentId)
                    //     ->where('CourseCode', $courseCode)
                    //     ->pluck('LectureNo')
                    //     ->toArray();
                    ?>

                    <div class="col-lg-6 col-sm-12">
                        <label class="form-label" for="lecture">Lecture No</label>
                        <select id="teacher_id" name="LectureNo" class="form-control" required>

                           
                               
                                    <option value="{{ $attend->LectureNo }}">{{ $attend->LectureNo }}</option>
                       
                        </select>
                    </div>

                <!-- Date input -->
                
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="date">Date</label>
                    <input type="date" id="date" name="Date" class="form-control" value="{{$attend->Date}}"/>
                </div>
                <!-- Student input -->
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="studentId">Student Name</label>
                    <select class="form-control"  name="StudentID" id="teacher_id" readonly>
                        <option value="{{$getstudent->StudentID}}">{{$getstudent->StudentName}}</option>
                      
                    </select>
                </div>
                <!-- Course Code input -->
                <div class="col-lg-6 col-sm-12"> 
                    <select class="form-control" name="CourseCode" id="CourseCode" hidden>
                        <option value="{{$attend->CourseCode}}">{{$attend->CourseCode}}</option>

                        @foreach($courses as $course)
                            <option value="{{$course->CourseCode}}">{{$course->CourseCode}}</option>
                        @endforeach
                    </select>
                </div>
                <!-- teacher Id input -->
                <!-- Submit button -->
                <div class="col-lg-12 col-sm-12">
                    <button type="Submit" class="btn btn-primary btn-block mb-4"> Edit Attendance</button>
                </div>
            </div>
        </form>
    </div>

   

</div>




@endsection
