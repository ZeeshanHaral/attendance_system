@extends('layouts.teacher')
@section('Title', 'All Courses - Teacher')
@section('content')




<div class="main_content">
<h3 class="sec_head">All Courses</h3>
      <div class="row">

      <!-- Course Cards-->

        <div class="col-lg-3 col-md-4 col-sm-4 col-12 mb-2 mt-4">
            <div class="infocourse">
                <a href="{{route('teachersingleCourses')}}" class="for-color">
                    <h5>Course Name (CS201)</h5>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-4 col-12 mb-2 mt-4">
            <div class="infocourse">
                <a href="single_course.php" class="for-color">
                    <h5>Course Name (CS201)</h5>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-4 col-sm-4 col-12 mb-2 mt-4">
            <div class="infocourse">
                <a href="single_course.php" class="for-color">
                    <h5>Course Name (CS201)</h5>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-4 col-sm-4 col-12 mb-2 mt-4">
            <div class="infocourse">
                <a href="single_course.php" class="for-color">
                    <h5>Course Name (CS201)</h5>
                </a>
            </div>
        </div>


        <div class="col-lg-3 col-md-4 col-sm-4 col-12 mb-2 mt-4">
            <div class="infocourse">
                <a href="#" class="for-color">
                    <h5>Course Name (CS201)</h5>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-4 col-sm-4 col-12 mb-2 mt-4">
            <div class="infocourse">
                <a href="#" class="for-color">
                    <h5>Course Name (CS201)</h5>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-4 col-sm-4 col-12 mb-2 mt-4">
            <div class="infocourse">
                <a href="#" class="for-color">
                    <h5>Course Name (CS201)</h5>
                </a>
            </div>
        </div>

    </div>
</div>











@endsection