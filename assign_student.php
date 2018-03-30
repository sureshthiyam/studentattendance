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
		$sql="SELECT student_id,student_name,roll_no,course,fname,mname,gender,address,category,email,mobile FROM student WHERE student_id='$id'";
		
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
			
			}
		}
		
	}
	
	
	include 'global_header.php';
	?>
   
   
   <body> 
  
    <div class="container">
    <div class="row">
	    	<div class="col-lg-12">
	    		
	    	<div class="col-lg-12">
	    		
	    		<div class="panel panel-default">
					<div class="panel-heading">
					<h3>Assign Student</h3>
					</div>
					  <div class="panel-body">
					    		<div class="form-group col-lg-12">
					    		
			
	<form method="post" action="save_assign.php" >
		
    		<input name="student_id" type="hidden" value="<?php echo $id;?>">
    		
		<div class="col-lg-4">
		<div class="align-top">
		<label>Session:</label>
             <select class="form-control" name="session" >
             <option value="0">Select Session</option>
             	<?php 
             	$sql="SELECT `session_id`, `session_name` FROM `session` WHERE IsActive=1";
             	
             	$result=mysqli_query($link,$sql);
             	
             	if($result){
             	    while ($row=mysqli_fetch_assoc($result)){
             	       
             	        ?>
             	        <option value="<?php echo $row['session_id'];?>"><?php echo $row['session_name'];?></option>
             	        <?php 
             	      
             	        
             	    }
             	}
             	
             	?>
             </select>
        </div>
        </div>
        
        	<div class="col-lg-4">
		<div class="align-top">
		<label>Course:</label>
             <select class="form-control" name="course" >
             <option value="0">Select Course</option>
             	<?php 
             	$sql="SELECT `course_id`, `course_name` FROM `course` WHERE IsActive=1";
             	
             	$result=mysqli_query($link,$sql);
             	
             	if($result){
             	    while ($row=mysqli_fetch_assoc($result)){
             	       
             	        ?>
             	        <option value="<?php echo $row['course_id'];?>"><?php echo $row['course_name'];?></option>
             	        <?php 
             	      
             	        
             	    }
             	}
             	
             	?>
             </select>
        </div>
        </div>
        	<div class="col-lg-4">
		<div class="align-top">
		<label>Semester:</label>
             <select class="form-control" name="semester" >
             <option value="0">Select Semester</option>
             	<?php 
             	$sql="SELECT `semester_id`, `semester_name` FROM `semester` WHERE IsActive=1";
             	
             	$result=mysqli_query($link,$sql);
             	
             	if($result){
             	    while ($row=mysqli_fetch_assoc($result)){
             	       
             	        ?>
             	        <option value="<?php echo $row['semester_id'];?>"><?php echo $row['semester_name'];?></option>
             	        <?php 
             	      
             	        
             	    }
             	}
             	
             	?>
             </select>
        </div>
        </div>
			<div class="col-lg-12">
		<div class="align-top">
		<label>Student:</label>
             <select class="form-control" name="student" >
             <option value="0">Select Student</option>
             	<?php 
             	$sql="SELECT `student_id`, `student_name`, `roll_no`, `course`, `fname`, `mname`, `gender`, `address`, `category`, `email`, `mobile` FROM `student` WHERE IsActive=1";
             	
             	$result=mysqli_query($link,$sql);
             	
             	if($result){
             	    while ($row=mysqli_fetch_assoc($result)){
             	       
             	        ?>
             	        <option value="<?php echo $row['student_id'];?>"><?php echo $row['roll_no'];?> | <?php echo $row['student_name'];?> | <?php echo $row['address'];?></option>
             	        <?php 
             	      
             	        
             	    }
             	}
             	
             	?>
             </select>
        </div>
        </div>
		<div class="col-lg-12">
		<div style="text-align: center; width:100%" class="align-top">
		<input type="submit" value="save" class="btn btn-info">
		</div>
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
		<div class="col-lg-12">
		<div class="panel panel-default">
						<div class="panel-heading">
						<h3>Students List</h3>
						</div>
				<div class="table-responsive">
				<table class="table" border="1">
				<tr>
				<th>Session</th>
				<th>Name</th>
				<th>Roll No</th>
				<th>Address</th>
				<th>Course</th>
				<th>Semester</th>
				<th>Edit</th>
				<th>Delete</th>
				</tr>
				
				
<?php

$sql="SELECT 
SCR.ID AS ID,
ses.session_name AS sessionName,
CR.course_name AS course,
SM.semester_name AS sem,
ST.student_name AS studentName,
ST.roll_no AS Roll,
ST.address AS Address


FROM student_col_relation SCR
LEFT JOIN session ses ON ses.session_id=SCR.session_id
LEFT JOIN course CR ON CR.course_id=SCR.course_id
LEFT JOIN semester SM ON SM.semester_id=SCR.sem_id
LEFT JOIN student ST ON ST.student_id=SCR.student_id

WHERE ST.IsActive=1";

$result=mysqli_query($link,$sql);
	
	if($result){
		while ($row=mysqli_fetch_assoc($result)){
		    $ID=$row['ID'];
		    $sessionName=$row['sessionName'];
		    $course=$row['course'];
		    $sem=$row['sem'];
		    $studentName=$row['studentName'];
		    $Roll=$row['Roll'];
		    $Address=$row['Address'];
			?>
			<tr><td><?php echo $sessionName;?></td>
			<td><?php echo $studentName;?></td>
			<td><?php echo $Roll;?></td>
			<td><?php echo $Address;?></td>
			<td><?php echo $course;?></td>
			<td><?php echo $sem;?></td>
			<td><a href="assign_student.php?student_id=<?php echo $ID;?>">Edit</a></td>
			<td><a title="<?php echo $id;?>" onclick="javascript:return confirm('Are you sure?')" href="del_assign.php?student_id=<?php echo $ID;?>">Delete</a></td>
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