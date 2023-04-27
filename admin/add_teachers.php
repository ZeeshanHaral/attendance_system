
<?php
include('admin_header.php');
?>


<div class="main_content">

    <div class="login-form-here">
        <form>
            <h3 class="sec_head">Add Teacher</h3>
            <div class="row">
                <!-- Email input -->
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="teacher_name">Name</label>
                    <input type="text" id="teacher_name" class="form-control" />
                    
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
                <!-- Submit button -->
                <div class="col-lg-12 col-sm-12">
                    <button type="button" class="btn btn-primary btn-block mb-4">Add Teacher</button>
                </div>
            </div>
        </form>
    </div>

    <div class="all_tables">
    <h3 class="sec_head">All Teachers</h3>
    <table class="table table-striped">
        <thead class="">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th> 
            <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">1</th>
            <td>Teahcer name</td>
            <td>teacher tgesting@gmail.com</td> 
            <td>
                <button type="button" onclick=""><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                <button type="button" onclick=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
            </td>
            </tr>
            <tr>
            <th scope="row">2</th>
            <td>Teahcer name</td>
            <td>teacher@gmail.com</td>
            <td>
                <button type="button" onclick=""><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                <button type="button" onclick=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
            </td>
            </tr>
            <tr>
            <th scope="row">3</th>
            <td>Teahcer name</td>
            <td>teacher@gmail.com</td>
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