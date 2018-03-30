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
	$session_name="";

	
	if(isset($_GET['session_id'])){
		$sid=$_GET['session_id'];
		$sql="SELECT session_id, session_name FROM session WHERE session_id='$sid'";
		
		$result=mysqli_query($link,$sql);
		
		if($result){
			while ($row=mysqli_fetch_assoc($result)){
				$sid=$row['session_id'];
				$session_name=$row['session_name'];
				
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
					<h3>Add Session</h3>
					</div>
					  <div class="panel-body">
					    		<div class="form-group col-lg-12">
					    		
			
	<form method="post" action="save_session.php" >
		<input name="session_id" type="hidden" value="<?php echo $sid;?>">
		<div class="align-top">
		<label>Session Name:</label>
		<input name="session_name" class="form-control" required type="text" placeholder="Session Name" value="<?php echo $session_name?>" >
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
						<h3>View Session</h3>
						</div>
				<div class="table-responsive">
				<table class="table" border="1">
				<tr><th>Session ID</th>
				<th>Session Name</th>
				<th>Edit</th>
				<th>Delete</th>
				</tr>
				
	<?php 			
	$sql=mysqli_query($link,"SELECT session_id, session_name FROM session ORDER BY session_id DESC");
	if($sql){
		while ($row=mysqli_fetch_array($sql)){
		$sid=$row['session_id'];
		$sname=$row['session_name'];
	   ?>
		    <tr><td><?php echo $sid;?></td>
			<td><?php echo $sname;?></td>
			<td><a href="session_master.php?session_id=<?php echo $sid;?>">Edit</a></td>
			<td><a onclick="javascript:return confirm('Are you sure?')" href="delete_session.php?session_id=<?php echo $sid; ?>">Delete</a></td>
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