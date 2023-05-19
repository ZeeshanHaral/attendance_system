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
        <form action="{{ route('teachers.update') }}" method="POST">
            @csrf
            <h3 class="sec_head">Edit Teacher</h3>
            <div class="row">
                <!-- Name input -->
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="teacher_name">Name</label>
                    <?php
                        $teacher_id = request()->get('teacher_id');   
                        $teacher = DB::table('teachers')->where('TeacherID', $teacher_id)->first();

                    ?>
                    <input type="text" name="teacherID" value="{{$teacher_id}}" hidden/>
                    <input type="text" id="teacher_name" value="{{ $teacher->TeacherName }}" name="teacher_name" class="form-control" required />
                </div>

                <!-- Email input -->
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="email">Email</label>
                    
                    <input type="email" id="email" value="{{ $teacher->email}}" name="email" class="form-control" required />
                </div>
                
               
                <!-- Submit button -->
                <div class="col-lg-12 col-sm-12">
                    <button type="submit" class="btn btn-primary btn-block mb-4">Update</button>
                </div>
            </div>
        </form>
        
    </div>

</div>






@endsection