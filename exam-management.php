<?php

include "include/header.php";
?>
<div class="temp_container">
	<?php
include "include/left.php";
?>
<div style="text-align:center; width:60%;height:440px;border:0px solid red;z-index:1;margin-left:35px;margin-top:50px; padding:auto;opacity:1;float:left;">
<div class="search_panel">
<?php
//date_default_timezone_set("Asia/Kolkata");
		$date= date("Y-m-d");
echo $date;


	$select_sid=mysqli_query($conn, "SELECT ID FROM student ORDER BY ID DESC ");
		$row_sid=mysqli_num_rows($select_sid);

		if($row_sid!=0)
		{
			$row=mysqli_fetch_array($select_sid,MYSQLI_BOTH);
			$row_id=$row['ID']+1;
			echo '<br>';
			$formatted_value = sprintf("%04d", $row_id);
			echo '<br>';
			//echo $row_id;
			$sid='SVV'.date('Y').$formatted_value;
			//echo $sid;
		}
		else
		{
			$formatted_value = sprintf("%04d", 1);
			//echo $row_id;
			$sid='SVV'.date('Y').$formatted_value;
		}


?>


	<center>
	
		<form action="" method="POST">
			<select>
				<option value="">--Choose Exam--</option>
				<option value="MT-I">Monthly Test - I</option>
				<option value="MT-II">Monthly Test - II</option>
				<option value="SA-I">SA - I</option>
				<option value="MT-III">Monthly Test - III</option>
				<option value="MT-IV">Monthly Test - IV</option>
				<option value="SA-II">SA - II</option>
			</select>
			<input type="submit" name="open_exam" value="Open" class="" id=""/>
			<input type="button" name="new_exam" value="Add New Exam" class="" id=""/>
		</form>
	</center>
	
</div>
</div>	
<?php

include "include/right.php";
?>

</div>
<?php

include "include/footer.php";
?>