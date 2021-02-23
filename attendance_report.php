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
		border-collapse:collapse
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
	$("#class").change(function(){
		var id=$("#class").val();
			var dataString = 'id='+ id;
		
			$.ajax
			({
				type: "POST",
				url: "get_year.php",
				data: dataString,
				cache: false,
				success: function(html)
				{
					$("#year").html(html);
				} 
			});
		});
	$("#year").change(function(){
		var id=$("#year").val();
		var dataString = 'id='+ id;
		$.ajax
		({
			type: "POST",
			url: "get_month.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#month").html(html);
			} 
		});
	});	
});
</script>
</head>
<body>
<div class="container">
<div class="inputdiv">
<form action="" method="POST" >
		<select name="class" tabindex="1" id="class">
			<option value="all">Select Class</option>
			<option value="First">First</option>
			<option value="Second">Second</option>
			<option value="Thrird">Thrird</option>
			<option value="Fourth">Fourth</option>
			<option value="Fifth">Fifth</option>
			<option value="Sixth">Sixth</option>
			<option value="Seventh">Seventh</option>
			<option value="Eighth">Eighth</option>
		</select>
		<select name="year" tabindex="2" id="year">
				<option selected="selected">--Select Year--</option>
		</select>
		<select name="month" tabindex="3" id="month">
			<option selected="selected">--Select Month--</option>
			
		</select>
	<input type="submit" name="findclasswise" value="Find Result"/>
	</form>
</div>
<?php
if (isset($_POST['findclasswise']))
{
	$class=$_POST['class'];
	$month=$_POST['month'];
	$nummonth=date('m', strtotime($month));       //Convert Month String To Value
	$year=date('Y');
	$query=mysqli_query($conn,"SELECT S_ID, S_NAME, ROLL FROM class WHERE CLASS='$class'");      // Display Student Name And Roll No. From Class Table
	
	$num=mysqli_num_rows($query);
	if($num>0)
	{
		$query2=mysqli_query($conn,"SELECT DAY(TIME) AS d FROM attendance WHERE MONTH(TIME)='$nummonth' ORDER BY TIME DESC");
		$row2=mysqli_fetch_array($query2,MYSQLI_BOTH);
		echo '<form action="" method="POST">
		<table>
			<thead>
			<tr><th colspan="35">Attendance Report : '.$month.'&nbsp '.$year.' </th></tr>
			<tr><th colspan="3">Class :&nbsp'.$class.' </th><th colspan="32">Date</th></tr>
			<tr><th>Roll No.</th><th>Student Id</th><th> Name</th>';    //creating Table Head To Last Date;  
				for($i=1;$i<=$row2['d'];$i++)
				{
					echo'<th>'.$i.'</th>';
				}
				echo '<th>Total Present </th></tr>';
		while($row=mysqli_fetch_array($query,MYSQLI_BOTH))
		{	
			echo '<tr><td>'.$row['ROLL'].'</td><td>'.$row['S_ID'].'</td><td>'.$row['S_NAME'].'</td>';
			$sid=$row['S_ID'];
			for($i=1;$i<=$row2['d'];$i++)
			{
				$query3=mysqli_query($conn,"SELECT  ATTENDANCE FROM attendance WHERE DAY(TIME)='$i' AND MONTH(TIME)='$nummonth' AND S_ID='$sid'");
				$row3=mysqli_fetch_array($query3,MYSQLI_BOTH); 
				$ke=$row3['ATTENDANCE'];//?'P':'A';
				echo '<td style="width:25px;" id="pres">'.$ke.'</td>';//.$row3['ATTENDANCE'].'</td>';, COUNT(ATTENDANCE) AS totdaypresent
			}
			$query4=mysqli_query($conn,"SELECT COUNT(ATTENDANCE) AS tot FROM attendance WHERE MONTH(TIME)='$nummonth' AND S_ID='$sid' AND ATTENDANCE='P'");
				$row4=mysqli_fetch_array($query4,MYSQLI_BOTH);
			echo '<td>'.$row4['tot'].'</td></tr>';
			
		}
		echo '<tr>
					<td colspan="3"> Total student present in a day : </td>';
		for($i=1;$i<=$row2['d'];$i++)
			{
				$query5=mysqli_query($conn,"SELECT COUNT(ATTENDANCE) AS t FROM attendance WHERE DAY(TIME)='$i' AND MONTH(TIME)='$nummonth' AND CLASS='$class' AND ATTENDANCE='P'");//$query4=mysqli_query($conn,"SELECT COUNT(ATTENDANCE) AS t FROM attendance WHERE DAY(TIME)='$i' AND MONTH(TIME)='$nummonth' AND S_ID='$sid'");
				$row5=mysqli_fetch_array($query5,MYSQLI_BOTH);
				$ke=$row3['ATTENDANCE']?'P':'A';
				echo '<td>'.$row5['t'].'</td>';//.$row3['ATTENDANCE'].'</td>';, COUNT(ATTENDANCE) AS totdaypresent
			}
			echo '</tr>';
		echo '<tr><td colspan="35"><input type="button" name="print" value="Print"/></td></tr>';
	}
	else
	{
		echo mysqli_error($conn);
	}

echo'</table></form>';
}
?>
</div>
</body>
<html>


<?php
/*SELECT [EmpCode], [ProjectName],[1] , [2],[3],[4],[5]
FROM 
(SELECT Day([AttendanceDate]) as d1, [EmpCode],[ProjectName],[AttendanceDate] , [Status]
FROM [tebs].[dbo].[View_Attendance]) p
PIVOT(
MAX([Status])
FOR d1 IN (  [1] , [2],[3],[4],[5]) ) AS pvt
ORDER BY 
pvt.[EmpCode],  pvt.[ProjectName];*/
?>