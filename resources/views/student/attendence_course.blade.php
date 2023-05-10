@extends('layouts.student')
@section('Title', 'Attendance-courses - Student')
@section('content')




<div class="main_content">

    <div class="all_tables">
    <h3 class="sec_head">Attendance for <span>CS201</span></h3>
    <table class="table table-striped">
        <thead class="">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Date</th>
            <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">1</th>
            <td>26-Mar-2023</td>
            <td>Present</td>
            </tr>
            <tr>
            <th scope="row">2</th>
            <td>27-Mar-2023</td>
            <td>Absent</td>
            </tr>
        </tbody>
    </table>
</div>

</div>










@endsection