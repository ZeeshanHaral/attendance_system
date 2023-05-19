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
            <th scope="col">Status</th>
            <th scope="col">Lecture #</th>
            <th scope="col">Date</th>
            <th scope="col">Student</th>
            <th scope="col">Teacher</th>
            <th scope="col">Course Code</th>
            </tr>
        </thead>
        <tbody>
            @foreach($attendence as $attendence)
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
            @endforeach
        </tbody>
    </table>
</div>

</div>









@endsection