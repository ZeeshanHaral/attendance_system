
@extends('layouts.admin')
@section('Title', 'Add Courses - Admin')
@section('content')


<div class="main_content">

    <div class="login-form-here">
        <form action="{{ route('course.store') }}" method="POST">
            @csrf
            <h3 class="sec_head">Add Course</h3>
            <div class="row">
                <!-- Email input -->
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="courseCode">Course Code</label>
                    <input type="text" id="courseCode" name="courseCode" class="form-control" required />
                    
                </div>
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="course_name">Course Name</label>
                    <input type="text" id="course_name" name="course_name" class="form-control" required />
                    
                </div>
                <!-- Email input -->
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="credit_hours">Credit Hours</label>
                    <input type="text" id="credit_hours" name="credit_hours" class="form-control" required />
                </div>
                <!-- Submit button -->
                <div class="col-lg-12 col-sm-12">
                    <button type="submit" class="btn btn-primary btn-block mb-4">Add Course</button>
                </div>
            </div>
        </form>
    </div>

    <div class="all_tables">
    <h3 class="sec_head">All Courses</h3>
    <table class="table table-striped">
        <thead class="">
            <tr>
            <th scope="col">Course Code</th>
            <th scope="col">Course Name</th>
            <th scope="col">Credit hours</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($student_course as $courses)
                <tr>
                <th scope="row">{{$courses->CourseCode}}</th>
                    <td>{{$courses->CourseName}}</td>
                    <td>{{$courses->CreditHours}}</td>
                    <td>
                        <a href="{{ route('course.destroy', $courses->CourseCode) }}" title="Delete" class="red">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </a>
                        <a href="{{route('admin_editcourse')}}?course_id={{$courses->CourseCode}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</div>




@endsection