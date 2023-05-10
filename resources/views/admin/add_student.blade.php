
@extends('layouts.admin')
@section('Title', 'Add Students - Admin')
@section('content')

<div class="main_content">

    <div class="login-form-here">
        <form>
            <h3 class="sec_head">Add Student</h3>
            <div class="row">
                <!-- Email input -->
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="student_name">Student Name</label>
                    <input type="text" id="student_name" class="form-control" />
                    
                </div>
                <!-- Email input -->
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="email">Email</label>
                    <input type="email" id="email" class="form-control" />
                </div>
                <!-- Password input -->
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="formpassword">Password</label>
                    <input type="password" id="formpassword" class="form-control" />
                </div>
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="Semester">Semester</label>
                    <select class="form-control" id="Semester">
                        <option>1st</option>
                        <option>2nd</option>
                        <option>3rd</option>
                        <option>4th</option>
                        <option>5th</option>
                        <option>6th</option>
                        <option>7th</option>
                        <option>8th</option>
                    </select>
                </div>
                <!-- Submit button -->
                <div class="col-lg-12 col-sm-12">
                    <button type="button" class="btn btn-primary btn-block mb-4">Add Student</button>
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
            <tr>
                <th scope="row">1</th>
                <td>Student name</td>
                <td>student@gmail.com</td>
                <td>5th</td>
                <td>
                    <button type="button" onclick=""><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                    <button type="button" onclick=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                </td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Student name</td>
                <td>student@gmail.com</td>
                <td>5th</td>
                <td>
                    <button type="button" onclick=""><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                    <button type="button" onclick=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                </td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Student name</td>
                <td>student@gmail.com</td>
                <td>5th</td>
                <td>
                    <button type="button" onclick=""><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                    <button type="button" onclick=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                </td>
            </tr>
            <tr>
                <th scope="row">4</th>
                <td>Student name</td>
                <td>student@gmail.com</td>
                <td>5th</td>
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