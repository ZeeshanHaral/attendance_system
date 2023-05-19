
@extends('layouts.admin')
@section('Title', 'Add Students - Admin')
@section('content')

<div class="main_content">

    <div class="login-form-here">
        <form action="{{ route('students.store') }}" method="POST">
            @csrf
            <h3 class="sec_head">Add Student</h3>
            <div class="row">
                <!-- Email input -->
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="student_name">Student Name</label>
                    <input type="text" name="student_name" id="student_name" class="form-control" required />
                    
                </div>
                <!-- Email input -->
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required />
                </div>
                <!-- Password input -->
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="formpassword">Password</label>
                    <input type="password" name="formpassword" id="formpassword" class="form-control" required />
                </div>
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="Semester">Semester</label>
                    <select class="form-control" name="Semester" id="Semester" required>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                    </select>
                </div>
                <!-- Submit button -->
                <div class="col-lg-12 col-sm-12">
                    <button type="submit" class="btn btn-primary btn-block mb-4">Add Student</button>
                </div>
            </div>
        </form>
    </div>

    <div class="all_tables">
    <h3 class="sec_head">All Students</h3>
    <table class="table table-striped">
        <thead class="">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th> 
            <th scope="col">Samester</th>
            <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$student->StudentName}}</td>
                    <td>{{$student->email}}</td> 
                    <td>{{$student->Semester}}</td>
                    <td>
                        <a href="{{ route('student.destroy', $student->StudentID) }}" title="Delete" class="red">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </a>
                        <a href="{{route('admin_studentEdit')}}?student_id={{$student->StudentID}}" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <a href="{{ route('admin_attendance', ['id' => $student->StudentID]) }}" title="View Attendance">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</div>







@endsection