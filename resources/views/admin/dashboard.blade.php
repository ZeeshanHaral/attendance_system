@extends('layouts.admin')
@section('Title', 'Dashboard - Admin')
@section('content')

<div class="main_content">

 
      <div class="row">

      <!-- Icon Cards-->
        
        <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-2 mt-4">
            <a href="{{route('admin_addteacher')}}">
            <div class="inforide">
              <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-4 col-4 ridetwo">
                    <img src="../assets/img/teacher.png">
                </div>
                <div class="col-lg-9 col-md-8 col-sm-8 col-8 fontsty">
                    <h4>Teachers</h4>
                    <h2>
                      <?php 
                        $count = DB::table('teachers')->count();
                        echo $count;
                        ?>
                    </h2>
                </div>
              </div>
            </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-2 mt-4">
            <a href="{{route('admin_addstudent')}}">
              <div class="inforide">
                <div class="row">
                  <div class="col-lg-3 col-md-4 col-sm-4 col-4 ridethree">
                      <img src="../assets/img/student.png">
                  </div>
                  <div class="col-lg-9 col-md-8 col-sm-8 col-8 fontsty">
                      <h4>Students</h4>
                      <h2>
                        <?php 
                          $count = DB::table('students')->count();
                          echo $count;
                          ?>
                      </h2>
                  </div>
                </div>
              </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-2 mt-4">
            <a href="{{route('admin_addcourse')}}">
              <div class="inforide">
                <div class="row">
                  <div class="col-lg-3 col-md-4 col-sm-4 col-4 rideone">
                      <img src="../assets/img/courses_all.png">
                  </div>
                  <div class="col-lg-9 col-md-8 col-sm-8 col-8 fontsty">
                      <h4>Courses</h4>
                      <h2>
                        <?php 
                          $count = DB::table('courses')->count();
                          echo $count;
                          ?>
                      </h2>
                  </div>
                </div>
              </div>
            </a>
        </div>

    </div>
 

</div>


@endsection