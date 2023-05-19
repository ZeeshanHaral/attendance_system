
@extends('layouts.admin')
@section('Title', 'Add Students - Admin')
@section('content')

<div class="main_content">

    <div class="login-form-here">
        <form action="{{ route('student.update') }}" method="POST">
            @csrf
            <h3 class="sec_head">Add Student</h3>
            <div class="row">
                <!-- Email input -->
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="student_name">Student Name</label>
                    <?php
                        $studentid = request()->get('student_id');   
                        $student = DB::table('students')->where('StudentID', $studentid)->first();

                    ?>
                    <input type="text" name="StudentID" value="{{$studentid}}" hidden/>
                    <input type="text" name="student_name" value="{{ $student->StudentName}}" id="student_name" class="form-control" />
                    
                </div>
                <!-- Email input -->
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="email">Email</label>
                    <input type="email" name="email" value="{{ $student->email}}" id="email" class="form-control" />
                </div>
               
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="Semester">Semester</label>
                    <input type="text" value="{{ $student->Semester}}" name="Semester" id="formpassword" class="form-control" />
                </div>
                <!-- Submit button -->
                <div class="col-lg-12 col-sm-12">
                    <button type="submit" class="btn btn-primary btn-block mb-4">Edit Student</button>
                </div>
            </div>
        </form>
    </div>

</div>







@endsection