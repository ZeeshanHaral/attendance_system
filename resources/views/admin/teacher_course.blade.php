@extends('layouts.admin')
@section('Title', 'Student Courses - Admin')
@section('content')

<div class="main_content">

    <div class="login-form-here">
        <form action="{{ route('teachercourse') }}" method="POST">
            @csrf
            <h3 class="sec_head">Assign Courses to Teacher</h3>
            <div class="row">
                <!-- Student Name select input -->
                <div class="col-lg-6 col-sm-12">
                    <label for="student_id">Teacher Name</label>
                    <select class="form-control" id="student_id" name="student_id">
                        @foreach($students as $student)
                            <option value="{{$student->TeacherID}}">{{$student->TeacherName}}</option>
                        @endforeach
                    </select>
                </div>
    
                <!-- Course Code select input -->
                <div class="col-lg-6 col-sm-12">
                    <label for="course_code">Course Code</label>
                    <select class="form-control" id="course_code" name="course_code">
                        @foreach($student_courses as $courses)
                            <option value="{{$courses->CourseCode}}">{{$courses->CourseCode}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-12 col-sm-12">
                    <button type="submit" class="btn btn-primary btn-block mb-4">Assign Course</button>
                </div>
            </div>
        </form>
    </div>
    
 

    <div class="all_tables">
    <h3 class="sec_head">All Assigned Courses</h3>
    <table class="table table-striped">
        <thead class="">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Teacher Name</th>
            <th scope="col">Course Code</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($studentsCourses as $st_course)
           
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <?php  
                        $studentID = $st_course->TeacherID;
                        $getStudent = DB::table('teachers')->where('TeacherID', $studentID)->First(); 

                        ?>
                        <td>{{$getStudent->TeacherName}}</td>
                        <td>{{$st_course->CourseCode}}</td>
                        <td>
                            <a href="{{ route('teachercour.destroy', $st_course->ID) }}" >
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </a>
                            
                            {{-- <form id="delete-form" action="{{ route('teachercour.destroy', $st_course->ID) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form> --}}

                            <a href="{{ route('admin_editteachercourse') }}?teachercourse_id={{ $st_course->ID }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        </td>
                    </tr>
           
            @endforeach
        
                
            
          
        </tbody>
    </table>
</div>

</div>



@endsection