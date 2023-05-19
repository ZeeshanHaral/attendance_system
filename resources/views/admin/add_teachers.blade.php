@extends('layouts.admin')
@section('Title', 'Add Teachers - Admin')
@section('content')

<div class="main_content">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="login-form-here">
        <form action="{{ route('teachers.store') }}" method="POST">
            @csrf
            <h3 class="sec_head">Add Teacher</h3>
            <div class="row">
                <!-- Name input -->
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="teacher_name">Name</label>
                    <input type="text" id="teacher_name" name="teacher_name" class="form-control" required />
                </div>
                <!-- Email input -->
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" required />
                </div>
                <!-- Password input -->
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="formpassword">Password</label>
                    <input type="password" id="formpassword" name="formpassword" class="form-control" required />
                </div>
                <!-- Submit button -->
                <div class="col-lg-12 col-sm-12">
                    <button type="submit" class="btn btn-primary btn-block mb-4">Add Teacher</button>
                </div>
            </div>
        </form>
        
    </div>

    <div class="all_tables">
    <h3 class="sec_head">All Teachers</h3>
    <table class="table table-striped">
        <thead class="">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th> 
            <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($allteachers as $teacher)
              
                <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$teacher->TeacherName}}</td>
                <td>{{$teacher->email}}</td> 
                <td>
                    <a href="{{ route('teacher.destroy', $teacher->TeacherID) }}" title="Delete" class="red">
                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                    </a>
                    <a href="{{route('admin_teacheredit')}}?teacher_id={{$teacher->TeacherID}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                </td>
                </tr>
             
            @endforeach
        </tbody>
    </table>
</div>

</div>






@endsection