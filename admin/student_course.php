
<?php
include('admin_header.php');
?>


<div class="main_content">

    <div class="login-form-here">
        <form>
            <h3 class="sec_head">Student Courses</h3>
            <div class="row">
                <!-- Email input -->
                <div class="col-lg-6 col-sm-12">
                        <label for="student_id">Student ID</label>
                    <select class="form-control" id="student_id">
                        <option>Name 1</option>
                        <option>Name 2</option>
                        <option>Name 3</option>
                    </select>
                </div>

                <div class="col-lg-6 col-sm-12">
                    <label for="course_code">Course Code</label>
                    <select class="form-control" id="Course Code">
                        <option>CS201</option>
                        <option>SE202</option>
                        <option>MT241</option>
                    </select>
                </div>
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
            <th scope="col">Student Name</th>
            <th scope="col">Course Code</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">1</th>
            <td>Student A</td>
            <td>CS201</td>
            <td>
                <button type="button" onclick=""><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                <button type="button" onclick=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
            </td>
            </tr>
            <tr>
            <th scope="row">2</th>
            <td>Student B</td>
            <td>MT241</td>
            <td>
                <button type="button" onclick=""><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                <button type="button" onclick=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
            </td>
            </tr>
            <tr>
            <th scope="row">3</th>
            <td>Student C</td>
            <td>SE202</td>
            <td>
                <button type="button" onclick=""><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                <button type="button" onclick=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
            </td>
            </tr>
        </tbody>
    </table>
</div>

</div>













<?php
include('admin_footer.php');
?>