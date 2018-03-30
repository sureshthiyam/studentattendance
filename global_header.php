<html>
<head>
	<title>
	</title>
</head>


<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Online Attendance System</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
     
     
      <ul class="nav navbar-nav navbar-right">
      <li><a href="assign_student.php" style="color: white" >Assign Student</a></li>
      <li><a href="add_student.php" style="color: white" >Add Student</a></li>
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"  style="color: white">Masters<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="session_master.php" >Session Master</a></li>
             <li role="separator" class="divider"></li>
            <li><a href="course_master.php">Course Master</a></li>
             <li role="separator" class="divider"></li>
            <li><a href="semester_master.php">Semester Master</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="subject_master.php">Subject Master</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"  style="color: white"><?php $name=$_SESSION['name'];  echo $name; ?><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="index.php" >Log Out</a></li>
             </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>