
@extends('layouts.admin')
@section('Title', 'Add Courses - Admin')
@section('content')


<div class="main_content">

    <div class="login-form-here">
        <form action="{{ route('course.update') }}" method="POST">
            @csrf
            <h3 class="sec_head">Add Course</h3>
            <div class="row">
                <!-- Email input -->
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="courseCode">Course Code</label>
                    
                    <select class="form-control" name="courseCodes" id="courseCode" disabled>
                        <?php  
                        $courseid = request()->get('course_id');   
                        $course = DB::table('courses')->where('CourseCode', $courseid)->first();
                        
                        ?>
                        
                        <option value="{{ $course->CourseCode}}">{{ $course->CourseCode}}</option>
                    </select>
                    <input type="text" name="courseCode" value="{{$courseid}}" hidden/>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="course_name">Course Name</label>
                    <input type="text" id="course_name" value="{{ $course->CourseName}}" name="course_name" class="form-control" />
                    
                </div>
                <!-- Email input -->
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="credit_hours">Credit Hours</label>
                    <input type="text" id="credit_hours" value="{{ $course->CreditHours}}" name="credit_hours" class="form-control" />
                </div>
                <!-- Submit button -->
                <div class="col-lg-12 col-sm-12">
                    <button type="submit" class="btn btn-primary btn-block mb-4">Edit Course</button>
                </div>
            </div>
        </form>
    </div>

</div>




@endsection