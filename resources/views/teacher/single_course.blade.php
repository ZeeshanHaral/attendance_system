@extends('layouts.teacher')
@section('Title', 'Single Course - Teacher')
@section('content')


<div class="main_content">
    
    <div class="all_tables">
        <h3 class="sec_head">Students in Course: <span>{{request('id')}}</span></h3>
        <table class="table table-striped">
            <thead class="">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Student Name</th>
                <th scope="col">Current Course</th>
                <th scope="col">Semester</th>
                <th scope="col">Attendance</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($students as $stud)
                <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <?php 
                    $studentID = $stud->StudentID;
                    $getStudent = DB::table('students')->where('StudentID', $studentID)->First(); 
                ?>
                <td>{{$getStudent->StudentName}}</td>
                <td>{{request('id')}}</td>
                <td>{{$getStudent->Semester}}</td>
                <td>
                    <?php  
                    
                    $student_id = $studentID;
                    $courseCode = request('id'); 
 
                    
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
                        
                            $presentPercentage = number_format($presentPercentage, 0);
                            $absentPercentage = number_format($absentPercentage, 0);
                        
                            echo $presentPercentage . '%';
                        } else {
                            $presentPercentage = 0;
                            $absentPercentage = 0;
                        }
                    
                    ?>



                </td>
                <td>


                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#resultModal{{ $getStudent->StudentID }}" style="background-color: #24ca40;">View / Add Attendance</button>
                        
                        <div class="modal fade" id="resultModal{{ $getStudent->StudentID }}" tabindex="-1" role="dialog" aria-labelledby="resultModalLabel{{ $getStudent->StudentID }}" aria-hidden="true">
                            <div class="modal-dialog" role="document" style="max-width:80%;">
                                <div class="modal-content">
                                    <div class="modal-header">  
                                            <h5 class="modal-title" id="resultModalLabel{{ $getStudent->StudentID }}">Add Attendance of Student: <span class="badge badge-primary" style="margin-right:10px;">{{$getStudent->StudentName}}</span><span class="badge badge-info">{{request('id')}}</span></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="login-form-here">
                                            <form action="{{ route('teacherattendance.add') }}" method="POST">
                                                @csrf
                                                <h3 class="sec_head">Attendance</h3>
                                                <div class="row">
                                                        <input type="date" id="date" name="TeacherID" class="form-control" hidden/>
                                                
                                                    <!-- Status input -->
                                                    <div class="col-lg-6 col-sm-12">
                                                        <label class="form-label" for="status">Status</label>
                                                        <select class="form-control" name="Status" id="status">
                                                            <option value="2"> Present</option>
                                                            <option value="1"> Absent</option>
                                                        </select>
                                                        
                                                    </div>
                                                    <!-- Lecture input -->
                                                    <?php
                                                        $studentId = $studentID;
                                                        $courseCode = request('id');
                                                        $existingLectures = DB::table('attendence')
                                                            ->where('StudentID', $studentId)
                                                            ->where('CourseCode', $courseCode)
                                                            ->pluck('LectureNo')
                                                            ->toArray();
                                                        ?>

                                                        <div class="col-lg-6 col-sm-12">
                                                            <label class="form-label" for="lecture">Lecture No</label>
                                                            <select id="teacher_id" name="LectureNo" class="form-control" required>
                                                                @for ($i = 1; $i <= 30; $i++)
                                                                    @if (in_array($i, $existingLectures))
                                                                        <option value="{{ $i }}" disabled>{{ $i }}</option>
                                                                    @else
                                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                                    @endif
                                                                @endfor
                                                            </select>
                                                        </div>

                                                    <!-- Date input -->
                                                    
                                                    <div class="col-lg-6 col-sm-12">
                                                        <label class="form-label" for="date">Date</label>
                                                        <input type="date" id="date" name="Date" class="form-control" required/>
                                                    </div>
                                                    <!-- Student input -->
                                                    <div class="col-lg-6 col-sm-12">
                                                      
                                                        <input type="text" id="date" name="StudentID" class="form-control" value="{{$studentID}}" hidden />

                                                    </div>
                                                    <!-- Course Code input -->
                                                    <div class="col-lg-6 col-sm-12">
                                                         
                                                        <input type="text" id="date" name="CourseCode" class="form-control" value="{{request('id')}}" hidden />
                                                        
                                                    </div>
                                                    <!-- teacher Id input -->
                                                    <!-- Submit button -->
                                                    <div class="col-lg-12 col-sm-12">
                                                        <button type="Submit" class="btn btn-primary btn-block mb-4"> ADD Attendance</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>


                                        <div class="all_tables">
                                            <h3 class="sec_head">Attendance</h3>
                                            <table class="table table-striped">
                                                <thead class="">
                                                    <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Lecture #</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Student</th>
                                                    <th scope="col">Course Code</th>
                                                    <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>


                                                <?php 
                                                    $studentID = $studentID;
                                                    $couscod = request('id');

                                                    $attendancespecific = DB::table('attendence')
                                                    ->where('StudentID', $studentID)
                                                    ->where('CourseCode', $couscod) // Add the first WHERE condition 
                                                    ->get();
                                                
                                                ?>  


                                                    @foreach($attendancespecific as $attendence)
                                                        <tr>
                                                            <th scope="row">{{ $loop->iteration }}</th>
                                                            <td>
                                                                <?php
                                                                    if($attendence->Status == 1){
                                                                    echo '<option value ="'.$attendence->Status.'" selected>Absent</option>';   
                                                                    }elseif($attendence->Status == 2){
                                                                        echo '<option value ="'.$attendence->Status.'" selected>Present</option>';  
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
                                                            <td>{{$attendence->CourseCode}}</td>
                                                            <td>
                                                           
                                                                <a href="{{ route('teacher_delete_att', ['id' => $attendence->AttendenceID]) }}" class="btn"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                                <a href="{{route('teacherattendance.edit')}}?att_id={{$attendence->AttendenceID}}" class="btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
   

</div>







@endsection
