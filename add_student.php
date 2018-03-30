<?php
include 'config.php';
session_start();
?>
<link rel="stylesheet" href="assets/css/bootstrap.css">
<link rel="stylesheet" href="assets/css/app.css">
<?php
	if($_SESSION['Login']!=null){
		if($_SESSION['Login']=="true"){
			
		}else{
			header("Location:index.php",TRUE);
		
		}
		
	}else{
		
		header("Location:index.php",TRUE);  
	}
	
	$id=0;
	$student_name="";
	$roll_no="";
	$course="";
	$fname="";
	$mname="";
	$gender="";
	$address="";
	$category="";
	$email="";
	$mobile="";
	
	if(isset($_GET['student_id'])){
		$id=$_GET['student_id'];
		$sql=mysqli_query($link, "SELECT student_id,student_name,roll_no,course,fname,mname,gender,address,category,
            email,mobile FROM student WHERE student_id='$id'");
		
		/*$result=mysqli_query($link,$sql);
		if($result){*/
			while ($row=mysqli_fetch_assoc($sql)){
				$id=$row['student_id'];
				$student_name=$row['student_name'];
				$roll_no=$row['roll_no'];
				$course=$row['course'];
				$fname=$row['fname'];
				$mname=$row['mname'];
				$gender=$row['gender'];
				$address=$row['address'];
				$category=$row['category'];
				$email=$row['email'];
				$mobile=$row['mobile'];
				
				}
	}
	
	
?>
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
	    		
	    	<div class="col-lg-4">
	    		
	    		<div class="panel panel-default">
					<div class="panel-heading">
					<h3>Add Student</h3>
					</div>
					  <div class="panel-body">
					    		<div class="form-group col-lg-12">
					    		
			
	<form method="post" action="save_student.php" >
		<input name="student_id" type="hidden" value="<?php echo $id;?>">
		<div class="align-top">
		<label>Name Of The Student:</label>
		<input class="form-control" required type="text" name="student_name" placeholder="Student Name" value="<?php echo $student_name?>">
		</div>
		<div class="align-top">
		<label>Roll No.:</label>
		<input class="form-control" required type="text"  name="roll_no"  placeholder="Roll No" value="<?php echo $roll_no?>" >
		</div>
		<div class="align-top">
		<label>Course:</label>
		<input class="form-control" required type="text" name="course" value="<?php echo $course?>" placeholder="Course">
		</div>
		<div class="align-top">
		<label>Father's Name:</label>
		<input class="form-control"  type="text" name="fname" placeholder="Father's Name" value="<?php echo $fname?>" >
		</div>
		<div class="align-top">
		<label>Mother's Name:</label>
		<input class="form-control"  type="text" name="mname" placeholder="Mother's Name" value="<?php echo $mname?>">
		</div>
		<div class="align-top">
		<label>Gender:</label>
		<select class="input-text" name="gender" required="required"><option value="select_gender">Select Gender</option>
									<option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="transgender">Transgender</option>
		</select>
																
																	
		</div>
		<div class="align-top">
		<label>Address:</label>
		<input class="form-control"  type="text" name="address" placeholder="Address" value="<?php echo $address?>" >
		</div>
		<div class="align-top">
		<label>Category:</label>
		 <select class="form-control" name="category" >
                                    <option value="select_category">Select Category</option>
                                    <option value="GEN">GEN</option>
                                    <option value="OBC">OBC</option>
                                    <option value="SC">SC</option>
                                    <option value="ST">ST</option>
                                    <option value="OTHERS">OTHERS</option>
        </select>
		</div>
		<div class="align-top">
		<label>Email:</label>
		<input class="form-control"  type="text" name="email" placeholder="Email" value="<?php echo $email?>">
		</div>
		<div class="align-top">
		<label>Mobile:</label>
		<input class="form-control"  type="text" name="mobile" placeholder="Mobile" value="<?php echo $mobile?>">
		</div>
		<div style="text-align: center; width:100%" class="align-top">
		<input type="submit" value="save" name="savebtn" class="btn btn-info">
		</div>
	
	</form>
	
	
	
			</div>
		<div style="color:#336699">
    		<?php 
        	   //session_start();
        		
        		if($_SESSION['msg']!=null){
        			echo $_SESSION['msg'];
        			
        		}
        		$_SESSION['msg']=null;
        		session_commit();
		      ?>
		</div>
			</div>
			</div>
		</div>
		<div class="col-lg-8">
		<div class="panel panel-default">
						<div class="panel-heading">
					
						</div>
				<div class="table-responsive">
				<table class="table" border="1">
				<tr><th>ID</th>
				<th>Name Of The Student</th>
				<th>Roll No</th>
				<th>Course</th>
				<th>Father's Name</th>
				<th>Mother's Name</th>
				<th>Gender</th>
				<th>Address</th>
				<th>Category</th>
				<th>Email</th>
				<th>Mobile</th>
				<th>Edit</th>
				<th>Delete</th>
				</tr>
				
				
<?php

	
	$sql="SELECT student_id,student_name,roll_no,course,fname,mname,gender,address,category,email,mobile FROM student ORDER BY student_id DESC ";
	
	$result=mysqli_query($link,$sql);
	
	if($result){
		while ($row=mysqli_fetch_assoc($result)){
		    $id=$row['student_id'];
		    $student_name=$row['student_name'];
		    $roll_no=$row['roll_no'];
		    $course=$row['course'];
		    $fname=$row['fname'];
		    $mname=$row['mname'];
		    $gender=$row['gender'];
		    $address=$row['address'];
		    $category=$row['category'];
		    $email=$row['email'];
		    $mobile=$row['mobile'];
			?>
			<tr><td><?php echo $id;?></td>
			<td><?php echo $student_name;?></td>
			<td><?php echo $roll_no;?></td>
			<td><?php echo $course;?></td>
			<td><?php echo $fname;?></td>
			<td><?php echo $mname;?></td>
			<td><?php echo $gender;?></td>
			<td><?php echo $address;?></td>
			<td><?php echo $category;?></td>
			<td><?php echo $email;?></td>
			<td><?php echo $mobile;?></td>
			<td><a href="add_student.php?student_id=<?php echo $id;?>">Edit</a></td>
			<td><a title="<?php echo $id;?>" onclick="javascript:return confirm('Are you sure?')" href="delete_student.php?student_id=<?php echo $id;?>">Delete</a></td>
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
	
	
</body>
	<script src="assets/js/jquery-1.11.1.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.js" type="text/javascript"></script>
</html>