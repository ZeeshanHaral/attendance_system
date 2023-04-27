<?php
include('student_header.php');
?>





<div class="main_content">

    <div class="all_tables">
    <h3 class="sec_head">All Courses</h3>
    <table class="table table-striped">
        <thead class="">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Course Code</th>
            <th scope="col">Course Name</th>
            <th scope="col">Teacher Name</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">1</th>
            <td>cs242</td>
            <td>Course 1</td>
            <td>Teacher A</td>
            <td>
                <a href="attendence_course.php" class="for-color">View Attendance</a>
            </td>
            </tr>
        </tbody>
    </table>
</div>

</div>


















<?php
include('student_footer.php');
?>