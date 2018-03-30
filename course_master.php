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
	
	$cid=0;
	$course_name="";
	
	
	if(isset($_GET['course_id'])){
		$cid=$_GET['course_id'];
		$sql="SELECT course_id, course_name FROM course WHERE course_id='$cid'";
		
		$result=mysqli_query($link,$sql);
		
		if($result){
			while ($row=mysqli_fetch_assoc($result)){
				$cid=$row['course_id'];
				$course_name=$row['course_name'];
				
			}
		}
		
	}
	include 'global_header.php';
	?>
	<body> 
  
    <div class="container">
    <div class="row">
	    	<div class="col-lg-12">
	    		
	    	<div class="col-lg-4">
	    		
	    		<div class="panel panel-default">
					<div class="panel-heading">
					<h3>Add Course</h3>
					</div>
					  <div class="panel-body">
					    		<div class="form-group col-lg-12">
					    		
			
	<form method="post" action="save_course.php" >
		<input name="course_id" type="hidden" value="<?php echo $cid;?>">
		<div class="align-top">
		<label>Course Name:</label>
		<input name="course_name" class="form-control" required type="text" placeholder="Course Name" value="<?php echo $course_name?>" >
		</div>
		
		<div style="text-align: center; width:100%" class="align-top">
		<input type="submit" value="save" class="btn btn-info">
		</div>
	<?php 
		//session_start();
		
		if($_SESSION['msg']!=null){
	?>

	<div class="alert alert-success alert-dismissible" role="alert" style="color:#336699">
	 	 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	 	 <strong style="color: #000">Message! </strong> <span style="color: #000"><?php echo $_SESSION['msg'];?></span>
	</div>
	<?php
			}
			$_SESSION['msg']=null;
			session_commit();
			
?>

	</form>
	
	
	
			</div>
			</div>
			</div>
		</div>
		<div class="col-lg-8">
		<div class="panel panel-default">
						<div class="panel-heading">
						<h3>View Course</h3>
						</div>
				<div class="table-responsive">
				<table class="table" border="1">
				<tr><th>Course ID</th>
				<th>Course Name</th>
				<th>Edit</th>
				<th>Delete</th>
				</tr>
				
	<?php 			
	$sql=mysqli_query($link,"SELECT course_id, course_name FROM course ORDER BY course_id DESC");
	if($sql){
		while ($row=mysqli_fetch_array($sql)){
		$cid=$row['course_id'];
		$course_name=$row['course_name'];
	   ?>
		    <tr><td><?php echo $cid;?></td>
			<td><?php echo $course_name;?></td>
			<td><a href="course_master.php?course_id=<?php echo $cid;?>">Edit</a></td>
			<td><a onclick="javascript:return confirm('Are you sure?')" href="delete_course.php?course_id=<?php echo $cid; ?>">Delete</a></td>
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