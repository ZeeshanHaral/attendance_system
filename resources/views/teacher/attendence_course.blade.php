@extends('layouts.teacher')
@section('Title', 'AttendanceCourse - Teacher')
@section('content')




<div class="main_content">

    <div class="all_tables">
    <h3 class="sec_head">Attendance of Student 1 for <span>Course 1</span></h3>
    <table class="table table-striped">
        <thead class="">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Lecture</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>1</td>
                <td>Present</td>
                <td>
                    <a href="{{route('teacherAttendance')}}" class="for-color">Edit</a>
                </td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>2</td>
                <td>Present</td>
                <td>
                    <a href="attendence_course.php" class="for-color">Edit</a>
                </td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>3</td>
                <td>Absent</td>
                <td>
                    <a href="attendence_course.php" class="for-color">Edit</a>
                </td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>4</td>
                <td>Present</td>
                <td>
                    <a href="attendence_course.php" class="for-color">Edit</a>
                </td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>5</td>
                <td>Absent</td>
                <td>
                    <a href="attendence_course.php" class="for-color">Edit</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>

</div>









@endsection