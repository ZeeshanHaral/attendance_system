@extends('layouts.student')
@section('Title', 'Attendance-courses - Student')
@section('content')

<div class="main_content">

    <div class="all_tables">
        <h3 class="sec_head">Attendance for <span>{{ $courseCode = request()->query('course_code');
 }}</span></h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date</th>
                    <th scope="col">Lecture No</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
            @if($attendances->count() > 0)
                @foreach($attendances as $attendance)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{ $attendance->Date }}</td>
                    <td>{{ $attendance->LectureNo }}</td>
                    <td>
                        @if($attendance->Status == 1)
                            <option value="1" selected>Absent</option>
                        @elseif($attendance->Status == 2)
                            <option value="2" selected>Present</option>
                        @endif
                    </td>
                </tr>
                @endforeach
                @else
                    <div class="alert alert-danger">No Attendance Record Found!</div>
                @endif
            </tbody>
        </table>
    </div>
   
</div>

@endsection
