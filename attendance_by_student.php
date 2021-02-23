<?php
	$conn=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($conn,'school');
?>
<html>
<head>
<title>
</title>
<style>
	.inputdiv{
		height:50px;
		width:100%;
		margin-left:100px;
		margin-top:50px;
		
	}
	.container{
		width:1100px;
		height:600px;
		//-webkit-column-count:3;//for chrome, safari,opera
		//-moz-column-count:3;//for mozila firefox
		//column-count:3;
		//column-gap:40px;
		//column-rule:2px solid blue;
		//column-width:200px;
		//column-height:100px;
		margin:auto;
	}
	table,th{
		text-align:center;
		border:2px solid blue;
	}
	tr,td
	{
		border:1px solid green;
		padding:3px;
	}
	select{
		width:200px;
		height:30px;
		border:3px;
		border:1px solid grey;
	}
	input[type=submit], input[type=button]
	{
		width:150px;
		height:30px;
		padding:3px;
	}

</style>
<script src="jquery-3.2.1.min.js"></script> 
<script>
$(document).ready(function()
{
$("input[type=checkbox]").checked(function(){
	$("#msg").text("Present");
		
	});
	
});

</script>
</head>
<body>
<div class="container">
<?php
	$sid=$_REQUEST['sid'];
	$month=$_REQUEST['month'];
	$year=$_REQUEST['year'];
	$query=mysqli_query($conn,"SELECT S_NAME, ROLL ,CLASS, MONTH(TIME) AS m FROM attendance WHERE S_ID='$sid' AND MONTH(TIME)='$month' AND YEAR(TIME)='$year'"); // Display Student Name And Roll No. From Class Table
	$num=mysqli_num_rows($query);
	if($num>0)
	{
		$row=mysqli_fetch_array($query,MYSQLI_BOTH);
		$m=$row['m'];
		$months=date("F", mktime(0, 0, 0, $m, 10));
		$query2=mysqli_query($conn,"SELECT DAY(TIME) AS d FROM attendance WHERE MONTH(TIME)='$month' ORDER BY TIME DESC");
		$row2=mysqli_fetch_array($query2,MYSQLI_BOTH);
		echo '<form action="" method="POST">
		<table>
			<thead>
			<tr><th colspan="35">Attendance Report : '.$months.'&nbsp '.$year.' </th></tr>
			<tr><th colspan="3">Class :&nbsp '.$row['CLASS'].'</th><th colspan="32">Date</th></tr>
			<tr><th>Roll No.</th><th>Student Id</th><th> Name</th>';    //creating Table Head To Last Date;  
				for($i=1;$i<=$row2['d'];$i++)
				{
					echo'<th>'.$i.'</th>';
				}
		//while($row=mysqli_fetch_array($query,MYSQLI_BOTH))
			echo '<tr><td>'.$row['ROLL'].'</td><td>'.$sid.'</td><td>'.$row['S_NAME'].'</td>';
			//$sid=$row['S_ID'];
			for($i=1;$i<=$row2['d'];$i++)
			{
				$query3=mysqli_query($conn,"SELECT ATTENDANCE FROM attendance WHERE DAY(TIME)='$i' AND MONTH(TIME)='$month' AND S_ID='$sid' AND YEAR(TIME)='$year'");
				$row3=mysqli_fetch_array($query3,MYSQLI_BOTH);
				$ke=$row3['ATTENDANCE'];//?'P':'A';
				echo '<td>'.$ke.'</td>';//.$row3['ATTENDANCE'].'</td>';
			}
			echo '</tr>';
		
		echo '<tr><td colspan="35"><input type="button" name="print" value="Print"/></td></tr>';
	}
	else
	{
		echo '<span style="color:white; font-size:150px; //text-align-center;text-shadow:10px 10px 20px grey,0 0 200px blue,0 0 15px darkblue;text-shadow:10px 10px 20px grey;">
			No Record Found</span>';
		echo mysqli_error($conn);
	}

echo'</table></form>';
?>
</div>
</body>
<html>