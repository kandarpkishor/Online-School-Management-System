<?php

include "include/header.php";
?>
<?php
	$encdata=$_REQUEST['id'];
	$enc=new Encryption;
	$sid=$enc->safe_b64decode($encdata);
	$insert=mysqli_query($conn,"INSERT INTO archive_student (SELECT * FROM student WHERE S_ID='$sid')") or die (mysqli_error($conn));
	if($insert)
	{		
		$update_student=mysqli_query($conn,"UPDATE student SET STATUS='INACTIVE' WHERE S_ID='$sid'");
		$delete_class=mysqli_query($conn,"UPDATE class SET STATUS='INACTIVE' WHERE S_ID='$sid'");
		//$delete_hostel=mysqli_query($conn,"DELETE FROM hostel WHERE S_ID='$sid'");
		//$delete_transport=mysqli_query($conn,"DELETE FROM transport WHERE S_ID='$sid'");
	}
	else 
	{
		echo 'Failed To Delete Data';
		echo mysqli_error($conn);
	}
?>

<?php

include "include/footer.php";
?>

