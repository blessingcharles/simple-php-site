<?php
	require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Registration Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#bdc3c7 ; background-image: url('imgs/tomandjerry.jfif');
  background-repeat: no-repeat; background-attachment: fixed;
  background-size: cover;">


  <center><h1 style="font-family: Comic Sans MS, sans-serif;
font-size: 50px;
font-weight: bold;
margin-top: 0px;
margin-bottom: 1px; text-shadow: 0 0 3px #FF0000, 0 0 5px #0000FF;">SIGN UP TO JOIN US</h1></center>
<br/>
<br/>
	
	<div id="main-wrapper" style="background-image: url('imgs/f2.jfif' );
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover; ">
		<center>
			<h2>Registration Form</h2>
			<img src="imgs/tom.jfif" class="avatar"/>
		</center>
	
		<form class="myform" action="register.php"method="post">
			<label><b>Full name:</b></label><br>
			<input name="fullname" type="text" class="inputvalues" placeholder="Type your Fullname" required/><br>
			<label><b>Gender: </b></label> 
			<input type="radio" class="radiobtns" name="gender" value="male" checked required> Male
			<input type="radio" class="radiobtns" name="gender" value="female" required> Female<br>
			<label><b>RELATIONSHIP: </b></label> 
			<select class="qualification" name="qualification">
			  <option value="PLAY GOD">PLAYGOD</option>
			  <option value="COMMITED">COMMITED</option>
			  <option value="MORRATU SINGLE">MORRATUSINGLE</option>
			  <option value="SINGLE">SINGLE</option>
			</select><br>
			
			<label><b>Username:</b></label><br>
			<input name="username" type="text" class="inputvalues" placeholder="Type your username" required/><br>
			<label><b>Password:</b></label><br>
			<input name="password" type="password" class="inputvalues" placeholder="Your password" required/><br>
			<label><b>Confirm Password:</b></label><br>
			<input name="cpassword" type="password" class="inputvalues" placeholder="Confirm password" required/><br>
			<input name="submit_btn" type="submit" id="signup_btn" value="Sign Up"/><br>
			<a href="index.php"><input type="button" id="back_btn" value="Back"/></a>
			<b>click back to go to login page</b>
		</form>
		
		<?php
			if(isset($_POST['submit_btn']))
			{
				//echo '<script type="text/javascript"> alert("Sign Up button clicked") </script>';
				
				$fullname = $_POST['fullname'];
				$gender = $_POST['gender'];
				$qualification = $_POST['qualification'];
				
				$username = $_POST['username'];
				$password = $_POST['password'];
				$cpassword = $_POST['cpassword'];
				
				if($password==$cpassword)
				{
					$encrypted_password = md5($password);
					
					$query= "select * from userinfotable WHERE username='$username'";
					$query_run = mysqli_query($con,$query);
					
					if(mysqli_num_rows($query_run)>0)
					{
						// there is already a user with the same username
						echo '<script type="text/javascript"> alert("User already exists.. try another username") </script>';
					}
					else
					{
						$query= "insert into userinfotable values('','$username','$fullname','$gender','$qualification','$encrypted_password')";
						$query_run = mysqli_query($con,$query);
						
						if($query_run)
						{
							echo '<script type="text/javascript"> alert("User Registered.. Go to login page to login") </script>';
						}
						else
						{
							echo '<script type="text/javascript"> alert("Error!") </script>';
						}
					}
					
					
				}
				else{
				echo '<script type="text/javascript"> alert("Password and confirm password does not match!") </script>';	
				}
				
				
				
				
			}
		?>
	</div>
</body>


<div style="text-align: right;">
		<i>creator @ charles</i>
	</div>
</html>