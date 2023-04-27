
<?php
include('teacher_header.php');
?>


<div class="main_content">

    <div class="login-form-here">
        <form>
            <h3 class="sec_head">Attendance</h3>
            <div class="row">
                <!-- Status input -->
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="status">Status</label>
                    <input type="text" id="status" class="form-control" />
                    
                </div>
                <!-- Lecture input -->
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="lecture">Lecture No</label>
                    <select class="form-control" id="teacher_id">
                        <option> 1</option>
                        <option> 2</option>
                        <option> 3</option>
                    </select>
                </div>
                <!-- Date input -->
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="date">Date</label>
                    <input type="date" id="date" class="form-control" />
                </div>
                <!-- Student input -->
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="studentId">Student Name</label>
                    <select class="form-control" id="teacher_id">
                        <option>Student 1</option>
                        <option>Student 2</option>
                        <option>Student 3</option>
                    </select>
                </div>
                <!-- Course Code input -->
                <div class="col-lg-6 col-sm-12">
                    <label for="course_code">Course Code</label>
                    <select class="form-control" id="Course Code">
                        <option>CS201</option>
                        <option>SE202</option>
                        <option>MT241</option>
                    </select>
                </div>
                <!-- teacher Id input -->
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="teacher_id">Teacher Name</label>
                    <select class="form-control" id="teacher_id">
                        <option>Teacher 1</option>
                        <option>Teacher 2</option>
                        <option>Teacher 3</option>
                    </select>
                </div>
                <!-- Submit button -->
                <div class="col-lg-12 col-sm-12">
                    <button type="button" class="btn btn-primary btn-block mb-4">Attendance</button>
                </div>
            </div>
        </form>
    </div>

    <div class="all_tables">
    <h3 class="sec_head">Attendance</h3>
    <table class="table table-striped">
        <thead class="">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Status</th>
            <th scope="col">Lecture #</th>
            <th scope="col">Date</th>
            <th scope="col">Student</th>
            <th scope="col">Teacher</th>
            <th scope="col">Course Code</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">1</th>
            <td>Status</td>
            <td>Lecture #</td>
            <td>Date</td>
            <td>Student 1</td>
            <td>Teacher 1</td>
            <td>Course Code</td>
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
include('teacher_footer.php');
?>