

@extends('layouts.teacher')
@section('Title', 'Dashboard - Teacher')
@section('content')





<div class="main_content">
      <div class="row">

      <!-- Icon Cards-->
        <div class="col-lg-6 col-md-6 col-sm-6 col-12 mb-2 mt-4">
            <div class="inforide">
              <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-4 col-4 rideone">
                  <img src="../assets/img/courses.png">
                </div>
                <div class="col-lg-9 col-md-8 col-sm-8 col-8 fontsty">
                    <a href="{{route('teacher_allcourses')}}" class="for-color">
                      <h4>All Courses</h4>
                      <h2><?php 
                        $count = DB::table('teachs')->where('TeacherID',Auth::id())->count();
                        echo $count;
                        ?></h2>
                    </a>
                </div>
              </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-12 mb-2 mt-4">
            <div class="infoinforide">
              <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-4 col-4 ridetwo">
                    <img src="../assets/img/student.png">
                </div>
                <div class="col-lg-9 col-md-8 col-sm-8 col-8 fontsty">
                  <a href="#" class="for-color">
                      <h4>Total Registered Students</h4>
                      <h2><?php 
                        $getteacher_courses = DB::table('teachs')->where('TeacherID', Auth::id())->get();

                        $courseCodes = $getteacher_courses->pluck('CourseCode');
                        
                        $count = DB::table('studentcourses')->whereIn('CourseCode', $courseCodes)->count();
                        
                        echo $count;
                        
                        ?></h2>
                  </a>    
                </div>
              </div>
            </div>
        </div>

    </div>
</div>



@endsection


