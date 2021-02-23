<?php
include "include/header.php";
?>
<div class="temp_container">
	<div style="width:17%;height:100%;border:0px double red; box-shadow:0 10px 10px grey;float:left;background:lightcyan;">
	
	</div>
	
	<div style="text-align:center; width:800px;height:440px;border:0px solid red;z-index:1;margin-left:35px;margin-top:50px; padding:auto;opacity:1;float:left;">
	<center>
		<a id="school" class="reports" href="attendance_report.php" title="Reports Management System">Monthly Reports </a>
		<a id="school" class="reports" href="sumrised_attendance_report.php" title="Reports Management System">Annual Reports </a>
	</center>
	</div>
	
	<div style="width:17%;height:100%;border:0px double red;box-shadow:-0px 10px 10px grey;float:right;background:lightcyan;">
		<marquee behavior="scroll" scrollamount="2" onmouseover="<script>this.setAttribute('scrollamount', 0, 0);</script>" 
		onMouseOut="this.setAttribute('scrollamount', 2, 0);"direction="up" style="width:90%; height:40%; border:0px solid black; margin-top:50px; 
		//margin:auto;background:white;border-radius:10px;//text-align:center;">
		<span class="warning"><center>Student Panding To add in Class:</center></span>
		<br>
		<?php
			$query=mysqli_query($conn,"SELECT S_NAME FROM student WHERE S_ID NOT IN (SELECT S_ID FROM class)");
			//$num=mysqli_num_rows($query);
			$i=1;
			while($result=mysqli_fetch_array($query))
			{
				echo $i++;
				echo '.&nbsp';
				echo $result['S_NAME'];
				echo '<br>';
			}
		?>
		</marquee>
		<marquee behavior="scroll" scrollamount="2" onMouseOver="this.setAttribute('scrollamount', 0, 0);" onMouseOut="this.setAttribute('scrollamount', 2, 0);"
		direction="up" style="width:90%; height:40%; border:0px solid black; margin-top:50px; //margin:auto;background:white;border-radius:10px;//text-align:center;">
		<span class="warning"><center>Student Panding For Payment :</center></span>
		<br>
		<?php
			$query=mysqli_query($conn,"SELECT *FROM bill WHERE BILL_ID NOT IN (SELECT BILL_ID FROM payment)");
			$num=mysqli_num_rows($query);
			$totalamount=0;
			$i=1;
			while($result=mysqli_fetch_array($query))
			{	
				
				$totalamount=$result['TUATION_FEE']+$result['TRANSPORT_FEE']+$result['OTHER_FEE']+$result['PREV_DUES'];
				echo $i++;
				echo '.&nbsp';
				echo $result['S_NAME'];
				echo '&nbsp&nbsp <span class="warning"> Amount = ';
				echo $totalamount;
				echo '</span>';
				echo '<br>';
			}
			echo mysqli_error($conn);
		?>
		</marquee>
	</div>

</div>
<?php
include "include/footer.php";
?>