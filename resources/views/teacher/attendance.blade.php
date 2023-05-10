@extends('layouts.teacher')
@section('Title', 'Attendance - Teacher')
@section('content')



<div class="login-form-here main_content">
        <form>
            <h3 class="sec_head">Attendance</h3>
            <div class="row">
                <!-- Status input -->
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="status">Status</label>
                    <input type="text" id="status" class="form-control" />
                    
                </div>
                <!-- Lecture input -->
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="lecture">Lecture No</label>
                    <select class="form-control" id="teacher_id">
                        <option> 1</option>
                        <option> 2</option>
                        <option> 3</option>
                        <option> 4</option>
                        <option> 5</option>
                        <option> 6</option>
                        <option> 7</option>
                        <option> 8</option>
                        <option> 9</option>
                        <option> 10</option>
                    </select>
                </div>
                <!-- Date input -->
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="date">Date</label>
                    <input type="date" id="date" class="form-control" />
                </div>
                <!-- Student input -->
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="studentId">Student Name</label>
                    <select class="form-control" id="teacher_id">
                        <option>Student 1</option>
                        <option>Student 2</option>
                        <option>Student 3</option>
                    </select>
                </div>
                <!-- Course Code input -->
                <div class="col-lg-6 col-sm-12">
                    <label for="course_code">Course Code</label>
                    <select class="form-control" id="Course Code">
                        <option>CS201</option>
                        <option>SE202</option>
                        <option>MT241</option>
                    </select>
                </div>
                <!-- Submit button -->
                <div class="col-lg-12 col-sm-12">
                    <button type="button" class="btn btn-primary btn-block mb-4">Attendance</button>
                </div>
            </div>
        </form>
    </div>

    <div class="all_tables main_content">
    <h3 class="sec_head">Attendance</h3>
    <table class="table table-striped">
        <thead class="">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Student name</th>
            <th scope="col">Course Name</th>
            <th scope="col">Semester No</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">1</th>
            <td>Student 1</td>
            <td>CS201</td>
            <td>4th</td>
            <td>
                <a href="{{route('teacherattendanceCourse')}}" class="for-color">View Attendance</a>
            </td>
            </tr>
        </tbody>
    </table>
</div>

</div>



@endsection
