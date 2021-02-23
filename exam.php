
<?php
	if(isset($_POST['studentsearch']))
	{
		if(empty($_POST['sid']))
		{
			echo "Please Enter Student Id.";
		}
		else
		{
			$sid=$_POST['sid'];
			$query=mysqli_query($conn,"SELECT *FROM class WHERE S_ID='$sid'");
			$result=mysqli_num_rows($query);
			if($result===1)
			{
				$row=mysqli_fetch_array($query,MYSQLI_BOTH);
 ?>
				<form action="" method="POST">
				<table>
				<tr>
				<td >
					Name 
				</td>
				<td colspan="3">
					<input type="text"style="width:100%;" name="sname" placeholder="Enter Your Name" value="<?php echo $row['S_NAME'] ?>" required disabled />
				</td>
				</tr>
				<tr>
				<td>
					Roll No.
				</td>
				<td>
					<input type="text" name="rollno" placeholder="Enter Your Roll No." value="<?php echo $row['ROLL'] ?>"  disabled/>
				</td>
				<td>
					Class
				</td>
				<td>
				<select name="class" disabled="disabled">
					<option><?php echo $row['CLASS']?></option>
				</select>
				</td>
				</tr>
				<tr>
				<td>
				Select Month
				</td>
				<td>
				<select name="month" required="required" >
				<option value="">Select Month</option>
	<option value="January">January</option><option value="February">February</option>
	<option value="March">March</option><option value="April">April</option>
	<option value="May">May</option><option value="June">June</option>
	<option value="July">July</option><option value="August">August</option>
	<option value="September">September</option><option value="October">October</option>
	<option value="November">November</option><option value="December">December</option>
				</select>
				</td>
				<td>
				Select Year
				</td>
				<td>
				<select name="year" required="required">
					<option value="">Select Year</option>
					<option value="2015">2015</option>
					<option value="2016">2016</option>
					<option value="2017">2017</option>
					<option value="2018">2018</option>
				</select>
				</td>
				</tr>
				<tr>
				<td >
					Enter Tuation Fees
				</td>
				<td>
					<input type="text" name="tutfee" placeholder="Enter Tuation Amount" required="required"/>
				</td>
				<td>
					Enter Transportation Fees
				</td>
				<td>
					<input type="text" name="transfee" placeholder="Enter Transpotation Amount" required="required"/>
				</td>
				</tr>
				<tr>
				<td>
					Enter Other Activities Charge
				</td>
				<td colspan="3">
				<input type="text" style="width:100%;"  name="othercharge" placeholder="Enter Other activities Amount" required="required"/>
					<center>
					<span align="center" style="font-size:15px;color:blue;margin:auto;padding:5px;">(If not applicable then fill '0')</span>
					</center>
				</td>
				<tr>
				<td colspan="4"style="text-align:center;">
				<input type="submit" name="submit" value="Generate Bill"/>
				<input type="reset" name ="cancel" value="Cancel"/>
				</td>
				
				</table>
				<input type="hidden" name="sid1" value="<?php echo $sid;?>"/>
				</form>
	</center>
 <?php	
			}
			else
				echo "Student Not Found. Please Enter Currect Student Id";
		}
	}