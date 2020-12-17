<?php
	session_start();
	require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#bdc3c7 ; background-image: url('imgs/f4.jfif');
  background-repeat: no-repeat; background-attachment: fixed;
  background-size: cover;">

  	<marquee style = "background-color: black ; color : white ; text-shadow: 2px 2px 4px #000000;font-size: 30px;"><i>!!! FRIENDSHIP IS THE SHIP WHICH DOESN'T SINK !!!!</i></marquee>


	<br/>
	<br/>
	<br/>
	<br/>


	<center><h1 style="font-family: Comic Sans MS, sans-serif;
font-size: 50px;
font-weight: bold;
margin-top: 0px;
margin-bottom: 1px; text-shadow: 0 0 3px #FF0000, 0 0 5px #0000FF;">WELCOME TO MY FAMILY</h1></center>


	<div id="main-wrapper" style="background-image: url('imgs/f2.jfif' );
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover; ">
		<center>
			<h2>Login Form</h2>
			<img src="imgs/tom.jfif" class="avatar"/>
		</center>
	
		<form class="myform" action="index.php" method="post">
			<label><b>Username:</b></label><br>
			<input name="username" type="text" class="inputvalues" placeholder="Type your username" required/><br>
			<label><b>Password:</b></label><br>
			<input name="password" type="password" class="inputvalues" placeholder="Type your password" required/><br>
			<input name="login" type="submit" id="login_btn" value="login"/><br>
			<a href="register.php"><input type="button" id="register_btn" value="Register"/></a>
		</form>
		<?php
		if(isset($_POST['login']))
		{
			$username=$_POST['username'];
			$password=$_POST['password'];
			$encrypted_password = md5($password);
			
			$query="select * from userinfotable WHERE username='$username' AND password='$encrypted_password'";
			
			$query_run = mysqli_query($con,$query);
			if(mysqli_num_rows($query_run)>0)
			{
				// valid
				$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);

				$_SESSION['username']= $username;
				$_SESSION['password'] = $password;
				header('location:homepage.php');
			}
			else
			{
				// invalid
				echo '<script type="text/javascript"> alert("Invalid credentials") </script>';
			}
			
		}
		
		
		?>
		
	</div>
	<br/>
	<br/>
	

</body>

	<div style="text-align: right;">
		<i>creator @ charles</i>
	</div>
</html>