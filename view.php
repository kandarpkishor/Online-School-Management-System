<?php
include('connection/connection.php');
require('encode.php');
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
	table
	{
		width:70%;
	}
	td, tr
	{
		width:150px;
		padding:3px;
	}
	input[type=button]
	{
		width:100px;
		height:30px;
		//background-color:lightblue;
		background:#0098cb;
		font-size:15px;
		font-weight:bold;
		cursor:pointer;
		padding:7px;
		color:#fff;
		margin:0px;
		margin-top:10px;
		border:0px;
		border-radius:3px;
	}
</style>



</head>

<body>
<?php
	$encdata=$_REQUEST['id'];
	$enc=new Encryption;
	$sid=$enc->safe_b64decode($encdata);
	if (empty($sid))
	{	
		echo '<meta content="0;studententry.php" http-equiv="refresh" />';
	}
	else
	{
		$query1 = mysqli_query($conn,"SELECT *FROM student WHERE S_ID='$sid'");
		$cont = mysqli_num_rows($query1);
		if($cont==1)
		{
			//$row = mysqli_fetch_array($query1,MYSQLI_BOTH);
			while($row = mysqli_fetch_array($query1,MYSQLI_BOTH))
			{
				$sid1=$row['S_ID'];
				$query = mysqli_query($conn,"SELECT *FROM image WHERE S_ID='$sid1'");
				$row1 = mysqli_fetch_array($query,MYSQLI_BOTH);
?>
			<center>
<table style="margin-top:50px; margin-left:0px; border:2px solid red; padding:20px;">
	<tr>
		<td colspan="4" style="text-align:center; border:1px solid red;"><h3 style="text-align:center;">Student Information</h3></td>
	</tr>
	<tr>
		<td><b>Student ID :</b></td>
		<td colspan=""><?php echo '<b>'.$sid.'</b>';?></td>
		<td colspan="2" rowspan="5" style="text-align:center;">
				<div style="float:right; margin-right:130px;height:160px;width:140px;background:white;border:2px solid black;border-radius:10px;">
				<?php
				echo ' <img src="data:image/jpeg;base64,'.base64_encode($row1['IMAGE']).'" height="160px" width="140px" style="border-radius:5px"/>';
				?>
				</div>
		</td>
	</tr>
	<tr>
		<td>Student Name :</td>
		<td><?php echo $row['S_NAME'];?></td>
	</tr>
		<td>Father's Name :</td>
		<td><?php echo $row['F_NAME']; ?> </td>
	</tr>
	<tr>
		<td> Mothers's Name :</td>
		<td><?php echo $row['M_NAME']; ?> </td>
	</tr>
	<tr>
		<td> Date Of Birth : </td>
		<td><?php echo $row['DOB']; ?> </td>
	</tr>
	<tr>
		<td> Gender : </td>
		<td> <?php echo $row['GENDER']; ?> </td>
		<td> Cast Categories : </td>
		<td> <?php echo $row['CAST']; ?> </td>
	</tr>
	<tr>
		<td> Mobile : </td>
		<td> <?php echo $row['P_MOB1']; ?> </td>
		<td> Email :</td>
		<td> <?php echo $row['EMAIL']; ?> </td>
	</tr>
	<tr>
		<td rowspan="2"> Address : </td>
		<td rowspan="2"> <?php echo $row['P_ADDRESS']; ?> </td>
		<td> State : </td>
		<td> <?php echo $row['P_STATE']; ?> </td>
	</tr>
	<tr>
		<td> District : </td>
		<td> <?php echo $row['P_DISTRICT']; ?> </td>
	</tr>
	<tr>
	</tr>
	<tr>
		<td> PIN : </td>
		<td> <?php echo $row['P_PIN']; ?>
		</td>
		<td> Date Of Addmission : </td>
		<td> <?php echo $row['DOA']; ?> </td>
	</tr>
</table>
<br>
<input type="button" Name="print" value="Print" id="print" onClick="window.print()"/>
<a href="studentview.php"><input type="button" Name="cancel" value="Cancel" id="cancel"/></a>
</center>

<?php
						
	}
	echo '</table>';
	//$data=mysqli_fetch_row($query);
	//echo "$data['']";
	}
	else
	{
	echo '<br>';
	echo '<span class="warning">';
	echo 'Student ID '.$sid.' Not Found. Please try again';
	echo '</span>';
	}
}
?>






</body>
</html>