<?php

session_start(); // Starting Session
?>
<?php
if(isset($_SESSION['login_user']))
{
header("location:home.php");
}
?>

<!DOCTYPE html>
 <head>
	 <title>Registration Form</title>
	 <meta charset="UTF-8"/>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="css/login.css" type="text/css"/>
<style>
		Table
		 {
			Padding:3px;
			//border:3px solid red;
			
		 }
		td,tr 
		{
				border:0px solid blue;
				text-align:left;
		}
		
		input[type="text"],input[type="password"],input[type="email"],input[type="date"],input[type="password"]
		{
			width:300px;
			padding:5px;
			border-radius:3px;
		}
		select
		{
			width:315px;
			padding:5px;
		}
		input[type="submit"],input[type="reset"]
		{
			padding:5px;
			color:#fff;
			background:#0098cb;
			width:160px;
			margin:20px auto;
			margin-top:0px;
			border:0px;
			border-radius:3px;
			cursor:pointer;
		}
		input[type="submit"]:hover,input[type="reset"]:hover
		{
			background:#0098eb;
		}
</style>
	 <script src="jquery-3.2.1.min.js"></script>
<script src="javascript/password.js"></script>	 
<script>

$(document).ready(function()
{
	
$("#nm, #fnm, #email").keyup(function()
	{
		$("#nm, #fnm").css({"text-transform": "capitalize"});
		$("#email").css({"text-transform": "lowercase"});
		
	});
	
});
</script>
</head>
<body>	
<div style="width:100%; //border-bottom:2px solid black;height:75px;margin:auto; //box-shadow:0px 0px 10px 10px grey;//padding:10px;//margin-top:50px;">
	<h1> ONLINE SCHOOL MANAGEMENT SYSTEM</h1>
	<div style="height:25px; width:100px; float:right;border:1px solid black; box-shadow:3px 3px grey;position:relative;top:-50px;left:-30px;">
	<a href="index.php" style="height:20px; padding-top:5px;width:100px;display:block;text-decoration:none; color:white;background:green;">Login</a>
	
	</div>
	<hr style="width:100%;">
</div>
<div style="height:675px;width:1100px; margin:auto;background:lightblue;margin-top:50px;box-shadow:0px 0px 10px 10px grey;">
<div style="width:50%;float:left; height:750px;margin:auto;border:0px solid red;">
	<img src="image/485.png" alt="user-icon.png" height="50%" width="100%"style="position:relative;top:20%;"></img>
</div>
<div style="width:48%;float:left; height:100%;margin:auto;padding:10px;//margin-top:50px;">             
	<div style= "width:100%;margin:auto;">
		
		<form action= "" method = "post" enctype="multipart/form-data">
			<fieldset><legend> <b>Registration Form</b></legend>
				<table style= "width:95%;margin:auto;">
				<tbody>
					<tr>
						<td width="150px"> Name </td>
						<td> <input type="text" name="nm" placeholder= "Enter Your Name" id="nm" style="" ></input></br></td>
						<td rowspan="10">
					</tr>
					<tr>
						<td>Father's Name</td>
						<td><input type="text" id="fnm" name="fnm" placeholder = "Enter Your Father's Name" ></input></br></td>
					</tr>
					<tr>
						<td>Gender </td>
						<td><select name="gender"><option value="Male">Male</option><option value="Female">Female</option></select></td>
					</tr>
					<tr>
						<td>Date Of Birth</td>
						<td><br><input type="date" name="dob" ></input></br></td>
					</tr>
					<tr>
						<td>Mobile No.</td>
						<td><input type="text" name="mob" placeholder= "Mobile No." maxlength="10" ></input></br></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><input type="email" name="email" id="email" placeholder= "abc@example.com" ></input></br></td>
					</tr>
					<tr>
						<td>Username</td>
						<td><input type= "text" id="usernm"name="username" autocomplete="off" placeholder= "Enter Your Username" ></input>
						</td>
					</tr>
					<tr>
						<td colspan="2" style="height:10px;//width:100%;">
							<span style="height:0px;width:100%;display:block;position:relative;top:-15px;">
								<p style="font-weight:bold;text-align:center;font-size:15px;" id="p1"></p>
							</span>
						</td>
					</tr>
					<tr>
						<td>Password</td>
						<td><input type= "password" name="password" placeholder= "Enter Your Password" id="pass1"  ></input></br></td>
					</tr>
					<tr>
						<td></td>
						<td>
							<span id="pas_span"style="height:5px;width:80%;display:block;position:relative;top:-27px;"></span>
						</td>
					</tr>
					<tr>
						<td>Confirm Password</td>
						<td><input type= "password" name="password" placeholder= "Confirm Password" id="pass2" ></input></br>
						</td>
					</tr>
					<tr>
						<td colspan="2" style="height:10px;//width:100%;">
						<span style="height:0px;width:100%;display:block;position:relative;top:-30px;">
								<p style="font-weight:bold;text-align:center;font-size:15px;" id="p2"></p>
							</span>
						</td>
					</tr>
					<tr>
						<td></td>
						<td align="center">
							<input type="submit" name="submit" value="Sign Up" style="width:315px;height:40px;font-size:20px;"></input>
						</td>
					</tr>
				</tbody>
				</table>
			</fieldset>
		</form>
		<!--<div style= "position:relative;font-weight:bold;color:red;font-size:20px;">Already have an Account please<a href="index.php"> click here </a>to Sign in</div>/-->
	</div>         
</div>
<div style="width:0%;float:right; height:750px;margin:auto;border:0px solid red;box-shadow:-0px 10px 10px grey;"></div>
</div>
<div style="width:100%;height:100px;font-size:18px;color:white;margin-top:30px;font-weight:bold;//border:2px solid red;float:left;position:relative;top:-50px;
//border-top:2px solid red;background:lightgreen;">
<hr style="width:100%;">
	Contact Us:</br>Kandarp Kishor Jha</br>E-mail: kandarpkishor@gmail.com</br>Mobile: 8298444957
</div>
	 
<?php

if(isset($_POST['submit']))
{
	$name = $_POST['nm'];
	$fname = $_POST['fnm'];
	$gender = $_POST['gender'];
	$dob = $_POST['dob'];
	$mob = $_POST['mob'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	date_default_timezone_set("Asia/Kolkata");
	$date= date("Y-m-d G:i:s");
	$connect = mysqli_connect("localhost","root","") or die("could not connect to the local host");
		
		$sql1="INSERT INTO user_data VALUES (NULL,'$username', '$name', '$fname','', '$dob', '$gender', '$mob', '$email','','','','','$date')";
		$sql2="INSERT INTO user_detail (ID, NAME, TYPE, USERNAME, PASSWORD) VALUES (NULL,'$name','Admin', '$username', '$password' )";
		mysqli_select_db($connect,"registration") or die ("database not found");
		$insert1=mysqli_query($connect, $sql1);
		$insert2=mysqli_query($connect, $sql2);
   if(!$insert1) 
   {
     die('data not insarted: ' . mysqli_error($connect));
   }
   else
   {
	/*$conndb=mysqli_connect('localhost', 'root', '');
	//$db=mysqli_select_db($conn,"school");
	$createdb="CREATE DATABASE $username";
	$createdbquery=mysqli_query($conndb,$createdb);
	if($createdbquery)
	{
	$selectdb=mysqli_select_db($conndb,$username);
	$bill="CREATE TABLE bill (ID int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY, S_ID varchar(13) NOT NULL, BILL_ID varchar(6) NOT NULL, S_NAME varchar(60) NOT NULL,
	  ROLL varchar(4) NOT NULL, CLASS varchar(15) NOT NULL, MONTH varchar(15) NOT NULL, YEAR varchar(4) NOT NULL, TUATION_FEE float NOT NULL,
	  TRANSPORT_FEE float NOT NULL, OTHER_FEE float NOT NULL, PREV_DUES float NOT NULL, DATE datetime NOT NULL )";
	$createbill=mysqli_query($conndb,$bill);

	$class="CREATE TABLE class (ID int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY, S_ID varchar(13) NOT NULL, S_NAME varchar(60) NOT NULL, CLASS varchar(15) NOT NULL,
	ROLL int(4) NOT NULL, STATUS varchar(15) NOT NULL)";
	$createclass=mysqli_query($conndb,$class);

	$faculty="CREATE TABLE `faculty` (`ID` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,`F_ID` varchar(13) NOT NULL,`NAME` varchar(60) NOT NULL,`F_NAME` varchar(60) NOT NULL,
  `M_NAME` varchar(60) NOT NULL,`DOB` date NOT NULL,`SEX` varchar(7) NOT NULL,`QUALIFICATION` varchar(200) NOT NULL,`MOBILE` varchar(12) NOT NULL,
  `EMAIL` varchar(200) NOT NULL,`ADDRESS` varchar(200) NOT NULL,`DISTRICT` varchar(60) NOT NULL,`STATE` varchar(60) NOT NULL,`PIN` varchar(6) NOT NULL,
  `JOINING_DATE` date NOT NULL) ENGINE=MyISAM DEFAULT CHARSET=latin1";
	$createfaculty=mysqli_query($conndb,$faculty);

	$image="CREATE TABLE `image` (`ID` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,`S_ID` varchar(13) NOT NULL,`IMAGE` longblob NOT NULL,`IMAGE_TYPE` varchar(200) NOT NULL) ENGINE=MyISAM DEFAULT CHARSET=latin1";
	$createimage=mysqli_query($conndb,$image);

	$payment="CREATE TABLE `payment` (`ID` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,`S_ID` varchar(13) NOT NULL,`BILL_ID` varchar(6) NOT NULL,`S_NAME` varchar(60) NOT NULL,
  `ROLL` varchar(4) NOT NULL,`CLASS` varchar(10) NOT NULL,`MONTH` varchar(15) NOT NULL,`YEAR` varchar(4) NOT NULL,`TOTAL_AMOUNT` float NOT NULL,
  `PAID` float NOT NULL,`DUES` float NOT NULL,`BALANCE` float NOT NULL,`DATE` date NOT NULL) ENGINE=MyISAM DEFAULT CHARSET=latin1";
	$createpayment=mysqli_query($conndb,$payment);

	$student="CREATE TABLE `student` (`ID` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,`S_ID` varchar(13) NOT NULL,`S_NAME` varchar(60) NOT NULL,`F_NAME` varchar(60) NOT NULL,
  `M_NAME` varchar(60) NOT NULL,`DOB` date NOT NULL,`SEX` varchar(10) NOT NULL,`CAST` varchar(20) NOT NULL,`MOBILE` varchar(12) NOT NULL,
  `EMAIL` varchar(250) NOT NULL,`ADMISSION_DATE` date NOT NULL,`ADDRESS` varchar(500) NOT NULL,`DISTRICT` varchar(50) NOT NULL,`STATE` varchar(50) NOT NULL,
  `PIN` varchar(8) NOT NULL) ENGINE=MyISAM DEFAULT CHARSET=latin1";	
	$createstudent=mysqli_query($conndb,$student);
	*/
   //$msg= "Sign up Sucessfull Please Sign In";
   //echo '<script type="text/javascript">alert("Data Submmitted Successfully");</script>';
   $_SESSION['login_user']=$username; // Initializing Session
	header("location:home.php"); // Redirecting To Other Page
	echo '<meta content="0;home.php" http-equiv="refresh" />';
	mysqli_close($connect);
   //}
	//else 
			//echo mysqli_error($conndb);
   }
}
?>
</body>
 </html>