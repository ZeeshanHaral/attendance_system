<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Attendance System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../assets/style.css?v=8657">
    
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar fixed-top" id="mainNav">
    <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars" aria-hidden="true"></i></button>
    <ul class="navbar-nav2 ml-auto">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome <span class="theme_text">[Teacher]</span></a>
            <ul class="dropdown-menu">
                <li class="divider"></li>
                <li class="resflset"><a href="login.php"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
            </ul>
        </li>
      </ul>
    <div class="collapse navbar-collapse" id="navbarResponsive">
    
      <ul class="navbar-nav navbar-sidenav" id="navHide">

          <a class="nav-link navlogo text-center" href="{{route('teacherDashboard')}}">
            <h2>Attendance <span>System</span></h2>
            <hr>
          </a>

        <li class="nav-item">
          <a class="nav-link sidefrst" href="{{route('teacherDashboard')}}">
            <span class="textside"><i class="fa fa-dashcube" aria-hidden="true"></i> Dashboard</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link sidesecnd" href="{{route('teacher_allcourses')}}">
            <span class="textside"><i class="fa fa-book" aria-hidden="true"></i> All Courses</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link sidesecnd" href="{{route('teacherAttendance')}}">
            <span class="textside"><i class="fa fa-file-image-o" aria-hidden="true"></i> Attendance</span>
          </a>
        </li>
      </ul>
      
    </div>
    
  </nav>





  <section class="adding_form">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2 col-sm-12">
                    
                </div>

                <div class="col-lg-10 col-sm-12 p-0">



  @yield('content')









</div>

</div>
</div>
</section>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.min.js"></script>

</body>
</html>