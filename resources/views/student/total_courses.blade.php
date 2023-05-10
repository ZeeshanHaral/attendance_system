@extends('layouts.student')
@section('Title', 'My Courses - Student')
@section('content')


<div class="main_content">
<h3 class="sec_head">All Courses</h3>
      <div class="row">

      <!-- Course Cards-->

        <div class="col-lg-3 col-md-4 col-sm-4 col-12 mb-2 mt-4">
            <div class="infocourse">
                    <h5>Course (CS201)</h5>
                    <h6>Teacher 2</h6>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-4 col-12 mb-2 mt-4">
            <div class="infocourse">
                    <h5>Course (CS208)</h5>
                    <h6>Teacher 6</h6>
            </div>
        </div>

        <div class="col-lg-3 col-md-4 col-sm-4 col-12 mb-2 mt-4">
            <div class="infocourse">
                    <h5>Course (MT401)</h5>
                    <h6>Teacher 1</h6>
            </div>
        </div>

    </div>
</div>




@endsection