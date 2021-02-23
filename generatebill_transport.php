<?php
include('include/header.php');
?>
<div class="temp_container">
	<div class="search_panel">
		<form action="" method="post">
			<select name="class" >
				<option value="">---Select Class---</option>
				<option value="">Nursery</option>
				<option value="">LKG</option>
				<option value="">UKG</option>
				<option value="First">One</option>
				<option>Two</option>
				<option>Three</option>
				<option>Four</option>
				<option>Five</option>
				<option>Six</option>
				<option>Seven</option>
				<option>Eight</option>
			</select>
			<select name="month">
				<option value="">---Select Month---</option>
				<option value="April">April</option>
				<option value="May">May</option>
				<option value="Jun">Jun</option>
			</select>
			<select name="year">
				<option value="">---Select Year---</option>
				<option value="2018">2018</option>
			</select></br>
			<input style="width:600px; color:blue; font-size:15px;"type="submit" name="generatebill" value="Generate Normal Bill"/></br>
			<input style="width:600px; color:black; font-size:15px;"type="submit" name="generatebill_h" value="Generate Bill with Hostal Charge"/></br>
			<input style="width:600px; color:red; font-size:15px;"type="submit" name="generatebill_t" value="Generate Bill with Transport Charge"/>
		</form>
	</div>
	<?php
		if(isset($_POST['generatebill']))
		{
			$class=$_POST['class'];
			$month=$_POST['month'];
			$year=$_POST['year'];
			//echo $class;
			//echo $month;
			//echo $year;
			
			$query=mysqli_query($conn,"SELECT *FROM class WHERE CLASS='$class' AND S_ID NOT IN (SELECT S_ID FROM transport) AND S_ID NOT IN (SELECT S_ID FROM hostel)");
			$result=mysqli_num_rows($query);
			
			//echo $year;
			echo '<div style="height:250px; width:800px; border:2px solid blue; margin:auto; position:relative; top:120px;background-color:lightgreen;z-index:5;">';
			echo $class;
			echo $month;
			echo $year;
			echo '<div style="color:red; height:15px; font-size:20px; margin:3px; padding:5px; border:1px solid white;">
					Total number of student without Hostel and Transportation facelity : '.$result.'<br></div>';
			echo '<div style="color:red; height:15px; font-size:20px; margin:10px; padding:5px; border:1px solid white;">Generate Bill With Exam Fee and Other Fee?</div>';
			echo '<div style=" height:100px:width:200px; color:blue; font-size:20px; padding:5px; margin:5px;">';
			echo '<form action="" method="POST">';
			echo '<input type="checkbox" name="examfee" value="yes"> Exam Fee</input><br>';
			echo '<input type="checkbox" name="othfee" value="yes"> Other Charge</input><br>';
			echo '<input type="hidden" name="result1" value="'.$result.'"/> ';
			echo '<input type="hidden" name="class" value="'.$class.'"/> <br>';
			
			echo '<input type="submit" name="genratebill_norma" value="Generate Bill"/>';
			echo '</form>';
			echo '</div>';
			echo '</div>';
		}
			if(isset($_POST['genratebill_norma']))
			{
				$examfee=$_POST['examfee'];
				$othfee=$_POST['othfee'];
				$result1=$_POST['result1'];
				$class=$_POST['class'];
				//echo $examfee;
				//echo $othfee;
				//echo '<script type="text/javascript">alert("Total'.$result1.' Bill Successfully Generated  ");</script>';
				if($examfee=="yes")
				{
					$query2=mysqli_query($conn,"SELECT *FROM fee WHERE CLASS='$class'");
					$result2=mysqli_num_rows($query2);
					if($result2===1)
					{
					$row2=mysqli_fetch_array($query2,MYSQLI_BOTH);
					echo $row2['TUT_FEE'];
					echo $row2['EXAM_FEE'];
					echo $row2['TRANS_FEE'];
					echo $row2['HOSTEL_FEE'];
					echo $row2['COMPUTER_FEE'];
					echo $row2['OTHER'];
					}
					else
					{
						echo mysqli_error($conn);
					}
				}
				else
				{
					echo 'Not Selected';
				}
				
			}
			
			
			
			
			
			
			
			
			
			/*$query=mysqli_query($conn,"SELECT *FROM class WHERE CLASS='$class' AND S_ID IN (SELECT S_ID FROM transport)");
			$result=mysqli_num_rows($query);
			echo '<div style="height:200px; width:800px; border:2px solid blue; margin:auto">';
			echo '<div style="color:red; height:15px; font-size:20px; margin:3px; padding:5px; border:1px solid white;">
					Total number of student with Transportation facelity : '.$result.'<br></div>';
			echo '<div style="color:red; height:15px; font-size:20px; margin:10px; padding:5px; border:1px solid white;">Generate Bill With Exam Fee and Other Fee?</div>';
			echo '<div style=" height:100px:width:200px; color:blue; font-size:20px; padding:5px; margin:5px;">';
			echo '<input type="checkbox" name="examfee" value="yes"> Exam Fee</input><br>';
			echo '<input type="checkbox" name="othfee" value="yes"> Other Charge</input><br>';
			echo '<input type="submit" name="genratebii_norma" value="Generate Bill"/>';
			echo '</div>';
			echo '</div>';
			
			$query=mysqli_query($conn,"SELECT *FROM class WHERE CLASS='$class' AND S_ID IN (SELECT S_ID FROM hostel)");
			$result=mysqli_num_rows($query);
			echo '<div style="height:200px; width:800px; border:2px solid blue; margin:auto">';
			echo '<div style="color:red; height:15px; font-size:20px; margin:3px; padding:5px; border:1px solid white;">
					Total number of student with Hostel facelity : '.$result.'<br></div>';
			echo '<div style="color:red; height:15px; font-size:20px; margin:10px; padding:5px; border:1px solid white;">Generate Bill With Exam Fee and Other Fee?</div>';
			echo '<div style=" height:100px:width:200px; color:blue; font-size:20px; padding:5px; margin:5px;">';
			echo '<input type="checkbox" name="examfee" value="yes"> Exam Fee</input><br>';
			echo '<input type="checkbox" name="othfee" value="yes"> Other Charge</input><br>';
			echo '<input type="submit" name="genratebii_norma" value="Generate Bill"/>';
			echo '</div>';
			echo '</div>';
		*/
	
	?>
	
	
</div>

<?php
include "include/footer.php";
?>