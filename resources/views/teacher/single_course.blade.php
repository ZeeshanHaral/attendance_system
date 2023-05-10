@extends('layouts.teacher')
@section('Title', 'Single Course - Teacher')
@section('content')


<div class="main_content">

    <div class="all_tables">
    <h3 class="sec_head">Course 1 <span>CS201</span></h3>
    <table class="table table-striped">
        <thead class="">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Student Name</th>
            <th scope="col">Current Course</th>
            <th scope="col">Semester</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">1</th>
            <td>Name 1</td>
            <td>Course CS242</td>
            <td>5th</td>
            </tr>
            <tr>
            <th scope="row">1</th>
            <td>Name 1</td>
            <td>Course MT533</td>
            <td>4th</td>
            </tr>
        </tbody>
    </table>
</div>

</div>







@endsection
