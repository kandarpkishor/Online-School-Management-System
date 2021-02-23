<?php
include "include/header.php"
?>
<div class="temp_container" style="overflow:scroll;"id="tbl">
	<div class="search_panel"">
	<center>
	<form action="" method="POST" style="margin:20px;">
	<input type="text" name="studentid" placeholder="Enter Student Id or Name" />
	<input type="submit" name="track" value= "Find Student Detail" />
	<!--<input type="submit" name = "trackall" value="Find All Result" />/-->
	


</form>
	</center>
	</div>
<?php
	if(isset($_POST['track']))
	{	
		if (empty($_POST['studentid']))
		{	
			echo '<br>';
			echo '<span class="warning">';
			echo 'Please Enter Student ID or Name';
			echo '</span>';
		}
	
		else
		{
			$sid = $_POST['studentid'];
			
			
			$query1 = mysqli_query($conn,"SELECT *FROM student WHERE (S_ID='$sid' OR S_NAME='$sid') AND STATUS='ACTIVE' ");
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
	<form action="viestudent.php" method="POST">
	<tr>
		<td>
			<b>Student ID :</b>
		</td>
		<td colspan="3">
			<?php
				echo '<b>';
				echo $sid;
				echo '</b>';
			?>
		</td>
		</tr>
		<tr>
			<td>
				Student Name :
			</td>
			<td>
				<?php
					echo $row['S_NAME'];
				
				?>
			</td>
			<td colspan="2" rowspan="3" style="text-align:center;">
				<div style="float:right; margin-right:130px;height:170px;width:150px;background:white;border:2px solid black;border-radius:10px;">
				<?php
				echo ' <img src="data:image/jpeg;base64,'.base64_encode($row1['IMAGE']).'" height="170px" width="150px" style="border-radius:5px"/>';
				?>
				</div>
			</td>
		</tr>
		
			<td>
				Enter Father's Name :
			</td>
			<td>
				<?php
					echo $row['F_NAME'];
				
				?>
			</td>
		</tr>
		<tr>
			<td>
				Enter Mothers's Name :
			</td>
			<td>
				<?php
					echo $row['M_NAME'];
				
				?>
			</td>
			
		</tr>
		<tr>
			<td>
				Date Of Birth :
			</td>
			<td>
				<?php
					echo $row['DOB'];
				?>
			</td>
		</tr>
		<tr>
			
			
			<td>
				Gender :
			</td>
			<td>
				<?php
					echo $row['GENDER'];
				
				?>
			</td>
			<td>
				Cast Categories :
			</td>
			<td>
				<?php
					echo $row['CAST'];
				?>
			</td>
		</tr>
		<tr>
			<td>
				Mobile :
			</td>
			<td>
				<?php
					echo $row['P_MOB1'];
				?>
			</td>
			<td>
				Email :
			</td>
			<td>
				<?php
					echo $row['EMAIL'];
				?>
			</td>
		</tr>
		<tr>
			<td rowspan="2">
				Address :
			</td>
			<td rowspan="2">
				<?php
					echo $row['P_ADDRESS'];
				?>
			</td>
			<td>
				State :
			</td>
			<td>
				<?php
					echo $row['P_STATE'];
				?>
			</td>
		</tr>
		<tr>
			<td>
				District :
			</td>
			
			<td>
				<?php
					echo $row['P_DISTRICT'];
				?>
			</td>
		</tr>
		<tr>
		</tr>
		<tr>
			<td>
				PIN :
			</td>
			<td>
				<?php
					echo $row['P_PIN'];
				?>
			</td>
			<td>
				Date Of Addmission :
			</td>
			<td>
				<?php
					echo $row['DOA'];
				?>
			</td>
		</tr>
		<!--<tr>
			<td colspan="4" style="text-align:center;">
				<input type="submit" name="submit" value="Submit"/>&nbsp&nbsp
				<input type="reset" name ="cancel" value="Cancel"/>
			</td>
		</tr>/-->
	</table>
<br>
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
	echo 'Student ID or Name'.$sid.' Not Found. Please try again';
	echo '</span>';
	}
}
}		
elseif(isset($_POST['trackall']))
	{	
	$sid = $_POST['studentid'];
	$query1 = mysqli_query($conn,"SELECT *FROM student WHERE STATUS='ACTIVE'");
	while($row = mysqli_fetch_array($query1,MYSQLI_BOTH))
	{
		$sid2=$row['S_ID'];
		$query = mysqli_query($conn,"SELECT *FROM image WHERE S_ID='$sid2' ");
		while($row1 = mysqli_fetch_array($query,MYSQLI_BOTH))
		{
?>
	<center>
	<table style="margin-top:50px; margin-left:0px; border:2px solid red; padding:20px;">
	<tr>
	<td>
		<b>Student ID :</b>
	</td>
	<td colspan="3">
	<?php
		echo '<b>';
		echo $row['S_ID'];;
		echo '</b>';
	?>
		</td>
		</tr>
		<tr>
			<td>
				Student Name :
			</td>
			<td>
				<?php
				echo $row['S_NAME'];
						
				?>
			</td>
				<td colspan="2" rowspan="3" style="text-align:center;">
				<div style="float:right; margin-right:130px;height:170px;width:150px;background:white;border:2px solid black;border-radius:10px;">
				<?php
					echo ' <img src="data:image/jpeg;base64,'.base64_encode($row1['IMAGE']).'" height="170px" width="150px" style="border-radius:5px"/>';
				?>
				</div>
			</td>
		</tr>
	
			<td>
				Enter Father's Name :
			</td>
			<td>
				<?php
					echo $row['F_NAME'];
						
				?>
			</td>
		</tr>
		<tr>
			<td>
				Enter Mothers's Name :
			</td>
			<td>
				<?php
					echo $row['M_NAME'];
						
				?>
			</td>
					
		</tr>
		<tr>
			<td>
				Date Of Birth :
			</td>
			<td>
				<?php
					echo $row['DOB'];
				?>
			</td>
		</tr>
		<tr>		
			<td>
				Gender :
			</td>
			<td>
				<?php
					echo $row['SEX'];	
				?>
			</td>
			<td>
				Cast Categories :
			</td>
			<td>
				<?php
					echo $row['CAST'];
				?>
			</td>
		</tr>
		<tr>
			<td>
				Mobile :
			</td>
			<td>
				<?php
					echo $row['MOBILE'];
				?>
			</td>
			<td>
				Email :
			</td>
			<td>
				<?php
					echo $row['EMAIL'];
				?>
			</td>
		</tr>
		<tr>
			<td rowspan="2">
				Address :
			</td>
			<td rowspan="2">
				<?php
					echo $row['ADDRESS'];
				?>
			</td>
			<td>
				State :
			</td>
			<td>
				<?php
					echo $row['STATE'];
				?>
			</td>
		</tr>
		<tr>
			<td>
				District :
			</td>
			<td>
				<?php
					echo $row['DISTRICT'];
				?>
			</td>
		</tr>
		<tr>
			<td>
				PIN :
			</td>
			<td>
				<?php
					echo $row['PIN'];
				?>
			</td>
			<td>
				Date Of Addmission :
			</td>
			<td>
				<?php
					echo $row['ADMISSION_DATE'];
				?>
			</td>
		</tr>
	<!--<tr>
		<td colspan="4" style="text-align:center;">
			<input type="submit" name="submit" value="Submit"/>&nbsp&nbsp
			<input type="reset" name ="cancel" value="Cancel"/>
		</td>
	</tr>/-->
		</table>
	<br>
	</center>	
<?php
		
	}
	}
}
?>
</div>
<div style="width:100%;">
		<center>
		<input type ="button" value="Print" onClick="printDiv('tbl')"/>
		<a href="studententry.php"><input type ="button" value="Cancel"/></a>
		</center>
</div>
<?php
include "include/footer.php";
?>