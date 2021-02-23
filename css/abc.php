<?php
$conn=mysqli_connect('localhost','root','');


?>
<html>
<title>
</title>
<head>
</head>
<body>
<form method="POST" action="">
<input type="text" name="dbname"/>
<input type="submit" name="crtdb" value="Create Database"/>
</form>

<?php
if (isset($_POST['crtdb']))
{
	$dbname=$_POST['dbname'];
	$creatdb=mysqli_query($conn,"CREATE DATABASE $dbname");
	if ($creatdb)
	{
		echo "Database Created Successfully";
		$db=mysqli_select_db($conn,$dbname);
		$crttable=mysqli_query($conn,"CREATE TABLE user (ID INT(10), USER_ID varchar(50), PASSWORD varchar(50))");
		$crttable1=mysqli_query($conn,"CREATE TABLE user1 (ID INT(10), USER_ID varchar(50), PASSWORD varchar(50))");
		if($crttable1)
		{
						
			
			echo "Table user1 Created Successfully";
		}
		else
		{
			echo "Not Created";
			//each mysqli_error($conn); 
		}
		
	}
	else
		
		echo "Not Created";
	echo mysqli_error($conn);
}


?>


</body>
</html>