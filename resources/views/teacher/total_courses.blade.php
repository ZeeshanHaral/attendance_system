@extends('layouts.teacher')
@section('Title', 'Single Course - Teacher')
@section('content')







<div class="main_content">
      <div class="row">

      <!-- Course Cards-->
      @foreach($attendence as $attendence)
        <div class="col-lg-3 col-md-4 col-sm-4 col-12 mb-2 mt-4">
            <div class="infocourse">
                <a href="{{route('teachersingleCourses')}}?totalstudents_id={{$attendence->AttendenceID}}" class="for-color">
                    <h5>{{($attendence->CourseCode)}}</h5>
                </a>
            </div>
        </div>
        @endforeach

    </div>
</div>








@endsection