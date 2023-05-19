@extends('layouts.student')
@section('Title', 'Dashboard - Student')
@section('content')


<div class="main_content">
      <div class="row">
        <div class="col-12">
          
          @php
$studentID = Auth::id(); // Get the currently authenticated student's ID

// Retrieve all course codes for the student
$courseCodes = DB::table('studentcourses')
    ->where('StudentID', $studentID)
    ->pluck('CourseCode')
    ->toArray();

// Define the dynamic course code
$courseCode = 'CHM191'; // Replace with the actual dynamic value

// Check if the course code is valid for the student
if (!in_array($courseCode, $courseCodes)) {
    
} else {
    // Calculate the attendance percentage for the student in the specific subject
    $attendance = DB::table('attendence')
        ->join('courses', 'attendence.CourseCode', '=', 'courses.CourseCode')
        ->where('attendence.StudentID', $studentID)
        ->where('courses.CourseCode', $courseCode)
        ->where('attendence.Status', '=', '2')
        ->count();

    // Calculate the total number of lectures for the course
    $totalLectures = DB::table('attendence')
        ->where('CourseCode', $courseCode)
        ->count();

    // Calculate the attendance percentage
    $attendancePercentage = ($attendance / $totalLectures) * 100;

    // Check if the attendance percentage is less than 50%
    if ($attendancePercentage < 50) {
      
        echo "<div class='alert alert-danger'>Sorry: You are not allowed to sit in the exam due to low attendance. Your attendence percentage must be above 50%</div>";
      
      } else {
         
    }
}
@endphp

         
        </div>
      </div>
      <div class="row">

      <!-- Icon Cards-->
        <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-2 mt-4">
            <div class="inforide">
              <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-4 col-4 rideone">
                    <i class="fa fa-list-alt" aria-hidden="true"></i>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-8 col-8 fontsty">
                  <a href="#0" class="for-color">
                      <h4>Current Courses</h4>
                      <h2>
                        <?php 
                        $count = DB::table('studentcourses')->where('StudentID',Auth::id())->count();
                        echo $count;
                        ?>
                        </h2>
                  </a>
                </div>
              </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-2 mt-4">
            <div class="inforide">
              <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-4 col-4 ridetwo">
                    <i class="fa fa-pie-chart" aria-hidden="true"></i>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-8 col-8 fontsty">
                  <a href="#0" class="for-color">
                      <h4>Overall Attendence</h4>
                      <h2>
                        <?php 
                       $student_id = Auth::id();

                       $absentCount = DB::table('attendence')
                           ->where('Status', 1)
                           ->where('StudentID', $student_id)
                           ->count();
                       
                       $presentCount = DB::table('attendence')
                           ->where('Status', 2)
                           ->where('StudentID', $student_id)
                           ->count();
                       
                       $totalCount = $absentCount + $presentCount;
                       
                       if ($totalCount != 0) {
                           $presentPercentage = ($presentCount / $totalCount) * 100;
                       } else {
                           $presentPercentage = 0;
                       }
                       
                    ?>
                    <h2>
                      <?php
                        echo  $presentPercentage . "%";
                      ?>
                    </h2>
                      </h2>
                  </a>
                </div>
              </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-2 mt-4">
            <div class="inforide">
              <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-4 col-4 ridethree">
                    <i class="fa fa-hand-o-right" aria-hidden="true"></i>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-8 col-8 fontsty">
                    <h4>Current Smester</h4>
                    <h2>
                      <?php 
                        $student_id = Auth::id();
                        $studentget = DB::table('students')->where('StudentID', $student_id)->first();
                        echo $studentget->Semester;
                      ?>
                      
                    </h2>
                </div>
              </div>
            </div>
        </div>

    </div>
    
    <section class=" mt-5">
    <div class="row">
          
          @foreach ($coursesst as $cours)
          <div class="col-md-4">
            <div class="card">
              <div class="card-header">
                <h5>
                   <?php
                  $student_id = Auth::id();
                  $courseCode = $cours->CourseCode;
                  
                  $coursesst = DB::table('courses')->where('CourseCode', $courseCode)->first();
                  echo $coursesst->CourseName;
                  
                  $absentCountper = DB::table('attendence')
                      ->where('Status', 1)
                      ->where('StudentID', $student_id)
                      ->where('CourseCode', $courseCode)
                      ->count();
                  
                  $presentCountper = DB::table('attendence')
                      ->where('Status', 2)
                      ->where('StudentID', $student_id)
                      ->where('CourseCode', $courseCode)
                      ->count();
                  
                  $totalCountper = $absentCountper + $presentCountper;
                  
                  if ($totalCountper != 0) {
                      $presentPercentage = ($presentCountper / $totalCountper) * 100;
                      $absentPercentage = ($absentCountper / $totalCountper) * 100;
                  
                      $presentPercentage = number_format($presentPercentage, 2);
                      $absentPercentage = number_format($absentPercentage, 2);
                  } else {
                      $presentPercentage = 0;
                      $absentPercentage = 0;
                  }
                   ?>



                </h5>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12"> 
                    <p>Present <span style="float: right; color: #2cb46d; font-weight: 500;"> {{$presentPercentage}}%</span></p>
                    <div class="progress mb-5">
                      <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: {{$presentPercentage}}%" aria-valuenow="{{$presentPercentage}}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p>Absent <span style="float: right; color: red; font-weight: 500;"> {{$absentPercentage}}%</span></p>
                    <div class="progress">
                      <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: {{$absentPercentage}}%" aria-valuenow="{{$absentPercentage}}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> 
                    
                </div>
                <?php 
                if ($presentPercentage == 0 && $absentPercentage == 0) {
                  echo "<p class='alert alert-warning mt-4 w-100'>Attendance has not been uploaded yet.</p>";
              }
                elseif ($presentPercentage < 50) {
                    echo "<p class='alert alert-danger mt-4'>In this Course, you will not be eligible to sit in the exam due to attendance being below 50%.</p>";
                } 
              ?>
                </div>
              </div>
            </div>
           </div>
          @endforeach
          

        
        </div>
    </section>
</div>


@endsection