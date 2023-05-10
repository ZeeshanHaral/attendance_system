
@extends('layouts.admin')
@section('Title', 'Add Courses - Admin')
@section('content')


<div class="main_content">

    <div class="login-form-here">
        <form>
            <h3 class="sec_head">Add Course</h3>
            <div class="row">
                <!-- Email input -->
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="course_name">Course Name</label>
                    <input type="text" id="course_name" class="form-control" />
                    
                </div>
                <!-- Email input -->
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="credit_hours">Credit Hours</label>
                    <input type="text" id="credit_hours" class="form-control" />
                </div>
                <!-- Submit button -->
                <div class="col-lg-12 col-sm-12">
                    <button type="button" class="btn btn-primary btn-block mb-4">Add Course</button>
                </div>
            </div>
        </form>
    </div>

    <div class="all_tables">
    <h3 class="sec_head">All Courses</h3>
    <table class="table table-striped">
        <thead class="">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Course Name</th>
            <th scope="col">Credit hours</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">1</th>
            <td>Course Name</td>
            <td>Credit hours</td>
            <td>
                <button type="button" onclick=""><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                <button type="button" onclick=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
            </td>
            </tr>
            <tr>
            <th scope="row">2</th>
            <td>Course Name</td>
            <td>Credit hours</td>
            <td>
                <button type="button" onclick=""><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                <button type="button" onclick=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
            </td>
            </tr>
            <tr>
            <th scope="row">3</th>
            <td>Course Name</td>
            <td>Credit hours</td>
            <td>
                <button type="button" onclick=""><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                <button type="button" onclick=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
            </td>
            </tr>
        </tbody>
    </table>
</div>

</div>




@endsection