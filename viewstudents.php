
<html>
	<head>
		<title>View Students</title>
		<link rel="stylesheet" href="assets/css/bootstrap.css">
	</head>
	<nav class="navbar navbar-light" style="background-color: #9933CC;">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#" style="color: white">Online Attendance System</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
     
     
      <ul class="nav navbar-nav navbar-right">
        <li><a href="viewstudents.php" class="btn btn-primary btn-lg" href="#" role="button" style="color:white">View All Students</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"  style="color: white"><?php session_start(); $name=$_SESSION['name'];  echo $name; ?><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="index.php" >Log Out</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	
	
	
	<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-11 col-lg-offset-1">
					<div class="panel panel-default">
						<div class="panel-heading">
					
					<a href="add_student.php" class="btn btn-primary btn-lg" role="button">Add New Students</a>
						</div>
				<div class="table-responsive">
				<table class="table" border="1">
				<tr><th>ID</th>
				<th>Roll No</th>
				<th>Name Of The Student</th>
				<th>Course</th>
				<th>Father Name</th>
				<th>Mother Name</th>
				<th>Address</th>
				<th>Email</th>
				<th>Mobile</th>
				</tr>
				
				
<?php
include 'config.php';
//session_start();
	if($_SESSION['Login']!=null){
		if($_SESSION['Login']=="true"){
			
		}else{
			header("Location:index.php",TRUE);
		
		}
		
	}else{
		
		header("Location:index.php",TRUE);  
	}
	
	$sql="SELECT id,roll_no,student_name,course,fname,mname,address,email,mobile FROM view_all_students ";
	
	$result=mysqli_query($link,$sql);
	
	if($result){
		while ($row=mysqli_fetch_assoc($result)){
		    $id=$row['id'];
		    $roll_no=$row['roll_no'];
		    $student_name=$row['student_name'];
		    $course=$row['course'];
		    $fname=$row['fname'];
		    $mname=$row['mname'];
		    $address=$row['address'];
		    $email=$row['email'];
		    $mobile=$row['mobile'];
			?>
			<tr><td><?php echo $id;?></td>
			<td><?php echo $roll_no;?></td>
			<td><?php echo $student_name;?></td>
			<td><?php echo $course;?></td>
			<td><?php echo $fname;?></td>
			<td><?php echo $mname;?></td>
			<td><?php echo $address;?></td>
			<td><?php echo $email;?></td>
			<td><?php echo $mobile;?></td>
			<td><a href="add_student.php?id=<?php echo $id;?>">Edit</a></td>
			<td><a title="<?php echo $id;?>" onclick="javascript:return confirm('Are you sure?')" href="delete_student.php?id=<?php echo $id;?>">Delete</a></td>
			</tr>
		
			<?php 
		}
	}
		
	
?>
				
				
			</table>
				
					</div>
			
				</div>
				</div>
			</div>
		
		</div>	
	</div>
	
			
	
			<?php 
		//session_start();
		
		if($_SESSION['msg']!=null){
			echo $_SESSION['msg'];	
		}
		$_SESSION['msg']=null;
		session_commit();
		
		?>
	</body>
	<script src="assets/js/jquery-1.11.1.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.js" type="text/javascript"></script>
</html>