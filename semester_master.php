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
	
	$sid=0;
	$semester_name="";

	
	if(isset($_GET['semester_id'])){
		$sid=$_GET['semester_id'];
		$sql="SELECT semester_id, semester_name FROM semester WHERE semester_id='$sid'";
		
		$result=mysqli_query($link,$sql);
		
		if($result){
			while ($row=mysqli_fetch_assoc($result)){
				$sid=$row['semester_id'];
				$semester_name=$row['semester_name'];
				
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
					<h3>Add Semester</h3>
					</div>
					  <div class="panel-body">
					    		<div class="form-group col-lg-12">
					    		
			
	<form method="post" action="save_semester.php" >
		<input name="semester_id" type="hidden" value="<?php echo $sid;?>">
		<div class="align-top">
		<label>Semester Name:</label>
		<input name="semester_name" class="form-control" required type="text" placeholder="Semester Name" value="<?php echo $semester_name?>" >
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
						<h3>View Semester</h3>
						</div>
				<div class="table-responsive">
				<table class="table" border="1">
				<tr><th>Semester ID</th>
				<th>Semester Name</th>
				<th>Edit</th>
				<th>Delete</th>
				</tr>
				
	<?php 			
	$sql=mysqli_query($link,"SELECT semester_id, semester_name FROM semester ORDER BY semester_id DESC");
	if($sql){
		while ($row=mysqli_fetch_array($sql)){
		$sid=$row['semester_id'];
		$semester_name=$row['semester_name'];
	   ?>
		    <tr><td><?php echo $sid;?></td>
			<td><?php echo $semester_name;?></td>
			<td><a href="semester_master.php?semester_id=<?php echo $sid;?>">Edit</a></td>
			<td><a onclick="javascript:return confirm('Are you sure?')" href="delete_semester.php?semester_id=<?php echo $sid; ?>">Delete</a></td>
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