<?php
include('include/header.php');
?>
<div class="temp_container">
	<div class="search_panel">
		<form action="" method="POST">
			<select name="stdid" class="input">
				<?php
					$sql=mysqli_query($conn,"SELECT S_ID FROM student WHERE S_ID NOT IN (SELECT S_ID FROM class)");
					$num=mysqli_num_rows($sql);
					if($num==0)
					{
						echo '<option value="">';
						echo "There are no any student left in record.";
						echo '</option>';
					}
					else
					{
						while($result1=mysqli_fetch_array($sql,MYSQLI_BOTH))
						{
							echo '<option value="'.$result1['S_ID'].'">';
							echo $result1['S_ID'];
							echo '</option>';
						}
					}
				?>
		</select>
		
		<input type ="submit" name ="getdetail" value="Get Detail" class="input" />
	</form>
	</div>
<?php
	if(isset($_POST['getdetail']))
	{
		if(empty($_POST['stdid']))
		{	
			echo '<span class="warning">';
			echo "There are no any student left in record.";
			echo '</span>';
		}
		else
		{
		$sid=$_POST['stdid'];
		$query=mysqli_query($conn,"SELECT *FROM student WHERE S_ID='$sid'");
		$row=mysqli_fetch_array($query,MYSQLI_BOTH);
			
	
?>
	
		<center>
		<form action="" method="POST">
		<table style="margin-top:50px;">
	
			<tr>
				<td>
					Student Name
				</td>
				<td>
					<input type="text" name="sname" placeholder="Student Name" value="<?php echo $row['S_NAME']; ?>"   disabled="disabled" />
				</td>
				<td>
					Father's Name : 
				</td>
				<td>
					
						<?php echo '<input type="text" name="fname" disabled="disabled" value="'.$row['F_NAME'].'"/>'; ?>
				</td>
			</tr>
			<tr>
				<td>
					Date Of Birth :
				</td>
				<td>
					<input type="date" name="dob" placeholder="Date Of Birth" value="<?php echo $row['DOB'];?>" disabled="disabled"/>
				</td>
				<td>
					Gender :
				</td>
				<td>
					<select name="gender" disabled="disabled">
						<option><?php echo $row['GENDER'];?> </option>
					</select>
				</td>
			</tr>
			<tr>
				
				<td>
					Cast :
				</td>
				<td>
					<select name="cast" disabled="disabled">
						<option><?php echo $row['CAST'];?> </option>
					</select>
				</td>
				<td>
					Mobile :
				</td>
				<td>
					<input type="text" maxlength="10" name="mob" placeholder="Mobile No." value="<?php echo $row['P_MOB1'];?>" disabled="disabled"/>
				</td>
			</tr>
			<tr>
				<td>
					Email :
				</td>
				<td colspan="3">
					<input type="email" name="email" style="width:100%; " placeholder="abc@example.com" value="<?php echo $row['EMAIL'];?>" disabled="disabled"/>
				</td>
			</tr>
			
			<tr>
				<td>
					Select Class :
				</td>
				<td colspan="3">
					<select name="class" placeholder="Select Class" required style="width:100%; text-align:center;">
						<option value="">---Select Class---</option>
						<option value="Nursery">Nursery</option>
						<option value="LKG">LKG</option>
						<option value="UKG">UKG</option>
						<option value="I">One</option>
						<option value="II">Two</option>
						<option value="III">Three</option>
						<option value="IV">Four</option>
						<option value="V">Five</option>
						<option value="VI">Six</option>
						<option value="VII">Seven</option>
						<option value="VIII">Eight</option>
					</select>
				</td>
			</tr>
			<tr>
				<td></td>
				<td colspan="3" style="text-align:center;">
					<input type="submit" name="submit" value="Submit"/>&nbsp&nbsp
					<input type="reset" name ="cancel" value="Cancel"/>
				</td>
			</tr>
			<tr>
				<td colspan="4">
				<input type="hidden" name="sid1" value="<?php echo $sid ?>"/>
				</td>
			</tr>
		
		</table>
		</form>
		</center>

<?php
		}

	}
elseif(isset($_POST['submit']))
	{
		$sid1=$_POST['sid1'];
		$query1=mysqli_query($conn,"SELECT *FROM student WHERE S_ID='$sid1'");
		$row1=mysqli_fetch_array($query1,MYSQLI_BOTH);
		$sname1=$row1['S_NAME'];
		$class=$_POST['class'];
		//$roll=$_POST['roll'];
		$status="Active";
		$roll=0;
		$query2=mysqli_query($conn,"SELECT *FROM class WHERE CLASS='$class'");
		$num2=mysqli_num_rows($query2);
		if($num2>=0)
		{
			$roll1=$num2;
			//echo $roll1;
			//echo $roll=$roll1+1;
			$roll=$roll1+1;
			echo '<br>';
		}
		else
		{
			$roll=$roll+1;
			//echo $roll;
			echo '<br>';
		}
		//echo $roll;
		
		if($class=="")
		{
			echo "Please Select Class.";
		}
		else
		{
		$query2=mysqli_query($conn,"INSERT INTO class VALUES(NULL,'$sid1','$sname1','$class','$roll','$status')");
		if($query2)
		{
			echo '<script type="text/javascript">alert("Student ID : '.$sid1.' Added Successfully");</script>';
			echo '<meta content="0;add_class.php" http-equiv="refresh" />';
		}
		else{
			mysqli_error($conn);
		}
		}
		
	}

?>
</div>
<?php
include "include/footer.php";
?>