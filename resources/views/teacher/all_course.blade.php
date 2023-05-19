@extends('layouts.teacher')
@section('Title', 'All Courses - Teacher')
@section('content')




<div class="main_content">
<h3 class="sec_head">All Courses</h3>
      <div class="row">

      <!-- Course Cards-->
      @foreach($assign_courses as $courses)
        <div class="col-lg-3 col-md-4 col-sm-4 col-12 mb-2 mt-4">
            <div class="infocourse">

                <?php  

                    $teacherID = Auth::id();
                    $courseCode = $courses->CourseCode;

                
                ?>    



                <a href="{{route('teachersingleCourses', ['id' => $courseCode])}}" class="for-color">
                    <h5>{{$courses->CourseCode}}</h5>
                </a>
            </div>
        </div>
     @endforeach
    

    </div>
</div>











@endsection