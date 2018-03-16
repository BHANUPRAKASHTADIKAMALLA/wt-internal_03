<?php
include ('server.php');
session_start();

		if (isset($_POST['Login'])) {
			$username = $_POST['username'];
			$password = $_POST['password1'];
			if(empty($username)){
				array_push($errors,"Username is required");
			}
			if(empty($password)){
					array_push($errors,"Password is required");
			}else {
								array_push($errors," Wrong password,Try again");
        				}
        				$password = md5($password);
				 $qry = "SELECT * FROM user WHERE `username` = '$username' AND `password`='$password';";
				
				$sql = mysqli_query($db,$qry);

				 	
				 		 if(mysqli_num_rows($sql)>0) {
    			    	    		$row=mysqli_fetch_assoc($sql);
    			    	    		$_SESSION['uid'] = $row['uid']; 
    			    	    		$_SESSION['username'] = $row['username'];
    			    	    		$_SESSION['password'] = $row['password'];
    			    	    		$_SESSION['monthly_limit'] = $row['monthly_limit'];
     			    	 
						$_SESSION['success'] = "You are now logged in";
        			    		header('location:index.php');
        				}
        				
				
		}
?>
<!DOCTYPE>
<html>
<head>
	<title>Registration From</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	
</head>
<body>
	<div class="header">
		<h2>Login</h2>
	</div>
	<form method="post" action="">
		<?php include('errors.php')?>
		<div class="input_group">
			<label>Username</label>
			<input type="text" name="username" placeholder="Name">
		</div>
		<div class="input_group">
			<label>Password</label>
			<input type="password" name="password1" placeholder="Your password">
		</div>
		<div class="input_group">
			<button type="submit" name="Login" >Login</button>
		</div>
		<p>
			Not yet registered? <a href="register.php">Sign up</a>
		</p>
		
	</form>
</body>
</html>
