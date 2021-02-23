<?php
include('include/header.php');
?>
			




<div class="temp_container">
	<div class="search_panel">
		<form action="" method="post">
			<select name="class" >
				<option value="">---Select Class---</option>
				<option value="Nursery">Nursery</option>
				<option value="LKG">LKG</option>
				<option value="UKG">UKG</option>
				<option value="I">One</option>
				<option value="II">Two</option>
				<option value="III">Three</option>
				<option value="IV">Fourth</option>
				<option value="V">Fifth</option>
				<option value="VI">Sixth</option>
				<option value="VII">Seventh</option>
				<option value="VIII">Eighth</option>
				<option value="IX">Ninth</option>
				<option value="X">Tenth</option>
			</select>
			<select name="month">
				<option value="">---Select Month---</option>
				<option value="April">April</option>
				<option value="May">May</option>
				<option value="June">June</option>
				<option value="July">July</option>
				<option value="August">August</option>
				<option value="September">September</option>
				<option value="October">October</option>
				<option value="November">November</option>
				<option value="December">December</option>
				<option value="January">January</option>
				<option value="February">February</option>
				<option value="March">March</option>
			</select>
			<select name="year">
				<option value="">---Select Year---</option>
				<option value="2018">2018</option>
				<option value="2019">2019</option>
				<option value="2020">2020</option>
				<option value="2020">2021</option>
			</select></br>
			<input style="width:600px; color:blue; font-size:15px;"type="submit" name="generatebill" value="Generate Bill"/></br>
		</form>
	</div>
<?php
include('bilgene.php');
		if(isset($_POST['generatebill']))
		{
			if(empty($_POST['class']) || empty($_POST['month']) || empty($_POST['year']))
			{
			echo "Please Select Class, Month and Year.";
			}
			else
			{
					$class=$_POST['class'];
					$month=$_POST['month'];
					$year=$_POST['year'];
					//echo $class;
					//echo $month;
					//echo $year;
					
					$query=mysqli_query($conn,"SELECT *FROM class WHERE CLASS='$class' AND STATUS='ACTIVE'");
					$result=mysqli_num_rows($query);
					if($result!=0)
					{
						//echo $year;
						echo '<div style="height:250px; width:700px; border:2px solid blue; margin:auto; position:relative; top:20px;background-color:white; z-index:5;">';
						echo '<hr>';
						echo '<span class="warning">Generate Bill For Class '.$class.' For The Month Of '.$month.'/'.$year.'</span>';
						echo '<hr>';
						
						echo '<div style="color:blue; height:10px; font-size:18px; margin:2px; padding:2px; //border:1px solid white;">
								Total number of student in Class '.$class.'  : '.$result.'<br></div>';
						echo '<div style="color:red; height:15px; font-size:20px; margin:5px; padding:5px; //border:1px solid white;">Generate Bill With Exam Fee and Other Fee?</div>';
						echo '<div style=" height:100px:width:200px; color:blue; font-size:20px; padding:5px; margin:5px;">';
						echo '<form action="" method="POST">';
						
						
						echo '<input type="checkbox" name="examfee" value="yes" id="exam_check" onClick="addExamAmount();"> Exam Fee</input>';
						
						
						echo '<input type="text" name="examfee_a" id="text_exam" placeholder="Enter amount" style="height:30px; width:250px; border:1px solid grey; border-radius:5px; margin:10px; padding:5px;display:none;""><br>';
						
						echo '<input type="checkbox" name="othfee" value="yes" id="other_check" onClick="addOtherAmount();"> Other Charge</input>';
						
						echo '<input type="text" style="height:30px; width:250px; border:1px solid grey; border-radius:5px; margin:10px; padding:5px;display:none;" name="otherfee_t" id="text_other_name" placeholder="Enter Particular">';
						
						echo '<input type="text" name="otherfee_a" id="text_other_amount" placeholder="Enter Amount" style="height:30px; width:250px; border:1px solid grey; border-radius:5px; margin:10px; padding:5px;display:none;""><br>';
						
						echo '<input type="hidden" name="result1" value="'.$result.'"/> ';
						echo '<input type="hidden" name="class" value="'.$class.'"/> <br>';
						echo '<input type="hidden" name="month" value="'.$month.'"/> <br>';
						echo '<input type="hidden" name="year" value="'.$year.'"/> <br>';
		?>
						<script>
							function addExamAmount() {
							  // Get the checkbox
							  var checkBox = document.getElementById("exam_check");
							  // Get the output text
							  var text_e = document.getElementById("text_exam");

							  // If the checkbox is checked, display the output text
							  if (checkBox.checked == true){
								text_e.style.display = "inline";
							  } else {
								text_e.style.display = "none";
							  }
							}
						</script>
						<script>
							function addOtherAmount() {
							  // Get the checkbox
							  var checkBox = document.getElementById("other_check");
							  // Get the output text
							  var text_o_name = document.getElementById("text_other_name");
							  var text_o_amount = document.getElementById("text_other_amount");

							  // If the checkbox is checked, display the output text
							  if (checkBox.checked == true){
								text_o_name.style.display = "inline";
								text_o_amount.style.display = "inline";
							  } else {
								text_o_name.style.display = "none";
								text_o_amount.style.display = "none";
							  }
							}
						</script>
						
			<?php			
						
						echo '<input type="submit" style="position:relative; top:-80px;" name="genratebill_norma" value="Generate Bill"/>';
						echo '</form>';
						echo '</div>';
						echo '</div>';
					}
					else
					{
						echo '<div style="height:100px; width:600px; border:2px solid blue; margin:auto; position:relative; top:20px;background-color:lightgreen;z-index:5;">';
						echo '<div style="color:red; height:15px; font-size:20px; margin:3px; padding:5px; //border:1px solid white;">
								No Any Student Added in Class '.$class.'.<br> Please Add Student In Class And Generate Bill Again.<br> Thanx</div>';
								echo '</div>';
					}
			}
		}
	if(isset($_POST['genratebill_norma']))
	{
		$exam_amount=0;
		$other_amount=0;
		$othfeename="";
		if(isset($_POST['examfee']) && isset($_POST['othfee']))
		{
			$examfee=$_POST['examfee'];
			$exam_amount=$_POST['examfee_a'];
			$othfeename=$_POST['otherfee_t'];
			$other_amount=$_POST['otherfee_a'];
			$othfee=$_POST['othfee'];
		}
		else 
		{
			if(isset($_POST['othfee']))
			{
			$othfeename=$_POST['otherfee_t'];
			$other_amount=$_POST['otherfee_a'];
			$othfee=$_POST['othfee'];
			}
			else if(isset($_POST['examfee']))
			{
				$examfee=$_POST['examfee'];
				$exam_amount=$_POST['examfee_a'];
			}
			else
			{
			$examfee='no';
			$exam_amount=0;;
			$othfeename='';
			$other_amount=0;;
			$othfee='no';
			}
		}
		
		$class=$_POST['class'];
		$month=$_POST['month'];
		$year=$_POST['year'];
		$total_h=0;
		$total_t=0;
		$total_n=0;
		
	$query1=mysqli_query($conn, "SELECT *FROM class WHERE CLASS='$class' AND STATUS='ACTIVE'");
		$result1=mysqli_num_rows($query1);
		if($result1!==0)
		{
			while($row1=mysqli_fetch_array($query1, MYSQLI_BOTH))
			{
				/*echo $examfee.'<br>';
				echo $exam_amount.'<br>';
				echo $othfeename.'<br>';
				echo $other_amount.'<br>';
				echo $othfee.'<br>';
				echo $class.'<br>';
				echo $month.'<br>';
				echo $year.'<br>';*/
				$sid=$row1['S_ID'];
				$query2=mysqli_query($conn, "SELECT *FROM hostel WHERE S_ID='$sid' ");
				$result2=mysqli_num_rows($query2);
				if($result2!==0)
				{
					while($row2=mysqli_fetch_array($query2, MYSQLI_BOTH))
					{
						$query_fee= mysqli_query($conn, "SELECT *FROM fee WHERE CLASS='$class' AND STATUS='ACTIVE' ORDER BY ID DESC");
						$num_fee=mysqli_num_rows($query_fee);
						if($num_fee!=0)
						{
							$row_fee=mysqli_fetch_array($query_fee, MYSQLI_BOTH);
							$hostal=$row_fee['HOSTEL_FEE'];
						}
						$sid_h=$row2['S_ID'];
						$transport=0;
						$total_h=$total_h+1;
						generatebill($sid_h, $month, $year, $class, $transport, $hostal, $other_amount, $othfeename, $exam_amount);
						
						
					}
				
				
				}
				else
				{
				
					$query3=mysqli_query($conn, "SELECT *FROM transport WHERE S_ID='$sid' ");
					$result3=mysqli_num_rows($query3);
					if($result3!==0)
					{
						while($row3=mysqli_fetch_array($query3, MYSQLI_BOTH))
						{
							$stopage=$row3['STOPAGE'];
							$query_fee= mysqli_query($conn, "SELECT *FROM stopage_conv WHERE STOPAGE='$stopage' ORDER BY ID DESC");
							$num_fee=mysqli_num_rows($query_fee);
							if($num_fee!=0)
							{
								$row_fee=mysqli_fetch_array($query_fee, MYSQLI_BOTH);
								$transport=$row_fee['FARE'];
							}
							$sid_t=$row3['S_ID'];
							$hostal=0;
							generatebill($sid_t, $month, $year, $class, $transport, $hostal, $other_amount, $othfeename, $exam_amount);
							$total_t=$total_t+1;
							
						}
					}
					else
					{
						$sid_n=$row1['S_ID'];
						$hostal=0;
						$transport=0;
					generatebill($sid_n, $month, $year, $class, $transport, $hostal, $other_amount, $othfeename, $exam_amount);
					$total_n=$total_n+1;
					//generatebill($sid, $month, $year);
					}
				}	
			}
		}
		else
		{
				
		}
		
		echo '<div style="width:500px; height:200px; margin:auto; background:white; padding:10px; border:2px solid lightgrey;">';
			echo '<span class="warning">Bill Generated For For Class '.$class.'. </span><br><hr><b>Details</b></span><br><hr>';
			echo 'Total Bill Generate With Hostel Charge :- '.$total_h;
			echo '<br>Total Bill Generate With Transport Charge :- '.$total_t;
			echo '<br>Total Bill Generate Without Transport And Hostel Charge :- '.$total_n.'</br>';
			echo '<hr>';
			echo '<hr>';
			echo '<a href="bill_by_class.php?class='.$class.'&month='.$month.'&year='.$year.'" target="_blank">';
				echo '<input type= "button" style="width:200px;height:30px; margin:20px;" name="view" value="Print Bill"/></a>';
			echo'</div>';
	
	
	
	
	
		// href="bill_by_class.php?class='.$class.'month='.$month.'year='.$year.'
	
	}
				
	
?>
	
	
</div>

<?php
include "include/footer.php";
?>