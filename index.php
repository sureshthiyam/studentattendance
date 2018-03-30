<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Online Attendance System | Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>


<nav class="navbar navbar-light" style="background-color: #9933CC;">
  <div class="container-fluid">
    <div class="navbar-header"><strong>
      <a class="navbar-brand" style="background-color:yellow" >Online Attendance System</a></strong>
    </div>
   

   
  </div>
</nav>
<body>
<div class="container">
	    <div class="row">
	    	<div class="col-lg-12">
	    		
	    	
	    	<div class="col-lg-4 col-lg-offset-4">
	    		
	    		<div class="panel panel-info">
					  <div class="panel-heading">
					  <h4 class = "panel-title">Login</h4>
					  </div>
					  <div class="panel-body">
					    		<div class="form-group col-lg-12">

  <form method="post" action="Login_action.php" >
						    			
		<div class="row">
			<div class="form-group">
				<input class="form-control" required name="email" type="email" placeholder="Email">
			</div>
		</div>
		<div class="row">
			<div class="form-group">
				<input class="form-control" required name="pass" type="password" placeholder="Password" >
			</div>
		</div>
		<div class="row">
			<div class="form-group text-center">
				<input class="btn btn-default" type="submit" value="Login"><br><br>
				<p>Create new account?				
				<a href="signup.php" >Sign Up</a></p><br>
				<p>Forgot Password ?<a>click here</a></p>
				
			</div>
		</div>
	
	</form>
</div>
							</div>
   		  				</div>
					</div>
       			</div>	
      		</div>
      </div> 
</body>
</html>





