

<?php
$conn2=mysqli_connect('localhost', 'root', '');
$db=mysqli_select_db($conn2,"registration");
$msg="";
$id=$_POST['id'];
if(!empty($id))
{
	$query=mysqli_query($conn2,"SELECT USERNAME FROM user_detail WHERE USERNAME='$id'");
	$num=mysqli_num_rows($query);
	if($num==1)
	{
		echo '<span style="color:red;font-weight:bold;text-align:center;">User Already Exists Please Select Different Username</span>';
	}
	else
	{
	echo '<span style="color:green;font-weight:bold;text-align:center;">Username Available</span>';	
	//echo $id;
	//echo mysqli_error($conn2);
	}
}
else 
{
	
}



?>