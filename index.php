<?php
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user']))
{
header("location:home.php");
}
?>
<html>
<head>
<title>
Login
</title>
<link href ="css/login.css" type= "text/css"rel="stylesheet"/>
</head>
	<body>
	<div class= "head"><h1> ONLINE SCHOOL MANAGEMENT SYSTEM</h1></div>
	<center>
	
	
	<div style="height:320px;width:60%; box-shadow: 0 0 10px 10px grey;float:left;margin-left:20%;padding-top:30px;background:lightblue;">
	<h3>Please Login To Continue</h3>
	<table>
		<tr>
		<td>
		<form action= "" method = "post">
		
			<input type= "text" name="username" placeholder= "Enter your Username"></input></br>
			<?php //echo $msg ?>
			<input type= "password" name="password" placeholder= "Enter your Password" ></input></br>
		</center>
			<input name = "submit" type= "submit" value= "Log in"></br>
			
		</form>
		</td>
		<td>
			<div style="height:190px; width:250px; margin-left:20px;border:0px solid black;position:relative;top:-20px;">
				<img src="image/user-icon.png" alt="user-icon.png" height="100%" width="100%"></img>
			</div>
		</td>
		</tr>
		<tr>
			
			<td colspan="2" style="text-align:center;">
			<span style= "color:red;text-decoration:underline; position:relative;top:-25px;"><?php echo $error; ?></span>
			<div class= "not_ac">Don't have an Account <a href="registration.php">click here</a> to Sign Up</div>
			
			
			</td>
		</tr>
	</table>
		
		</div>
	</center>
	</body>
</html>