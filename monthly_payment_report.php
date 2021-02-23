<?php

	include('include/header.php');			  

?>

<div class="temp_container">

	<div class="search_panel">
	</div>
<?php
	//$studentid = $_POST['studentid'];
	//echo $studentid;
	$sl_no=0;
	
			//$class = $_POST['class'];
			$month = $_REQUEST['month'];
			$year = $_REQUEST['year'];
			//$year=date('Y');
			//$query1 = mysqli_query($conn,"SELECT MONTH, YEAR, SUM(PAID) 'TOTAL_PAID', SUM(DUES) 'TOTAL_DUES', SUM(TOTAL_AMOUNT) TOTAL_BILL_AMOUNT FROM payment WHERE MONTH='$month' GROUP BY CLASS");
			$query1 = mysqli_query($conn,"SELECT CLASS, SUM(PAID) 'TOTAL_PAID', SUM(DUES) 'TOTAL_DUES', SUM(TOTAL_AMOUNT) TOTAL_BILL_AMOUNT FROM payment WHERE MONTH='$month' AND YEAR='$year' GROUP BY CLASS");
			$cont = mysqli_num_rows($query1);
			if($cont>=1)
			{
				$total_amount=0;
				$total_paid_amount=0;
				$total_dues_amount=0;
				$total_student=0;
				$total_student_dues=0;
				$total_student_nodues=0;
				//$row = mysqli_fetch_array($query1,MYSQLI_BOTH);
				echo '<table class="table">';
				echo '<th>ID</th><th>CLASS</th><th>No. Of Student </br> Who Paid</th><th>No. Of Student </br> Who Has No Dues</th><th>No. Of Student </br>Who Has Dues </th><th>Total Bill Amount</th><th>Paid Amount</th><th>Dues Amount</th>';
				while($row = mysqli_fetch_array($query1,MYSQLI_BOTH))
				{
					
					$total_amount=$total_amount+$row['TOTAL_BILL_AMOUNT'];
					$total_paid_amount=$total_paid_amount+$row['TOTAL_PAID'];
					$total_dues_amount=$total_dues_amount+$row['TOTAL_DUES'];
					
					
					
					
					
					$class=$row['CLASS'];
					$query2 = mysqli_query($conn,"SELECT COUNT(S_ID) 'TOTAL_STUDENT_P' FROM payment WHERE CLASS= '$class' AND MONTH='$month' AND YEAR='$year' AND PAID !=0");
					$query3 = mysqli_query($conn,"SELECT COUNT(S_ID) 'TOTAL_STUDENT_D' FROM payment WHERE CLASS= '$class' AND MONTH='$month' AND YEAR='$year' AND DUES>0");
					$query4 = mysqli_query($conn,"SELECT COUNT(S_ID) 'TOTAL_STUDENT_ND' FROM payment WHERE CLASS= '$class' AND MONTH='$month' AND YEAR='$year' AND DUES<=0");
					$row2= mysqli_fetch_array($query2,MYSQLI_BOTH);
					$row3= mysqli_fetch_array($query3,MYSQLI_BOTH);
					$row4= mysqli_fetch_array($query4,MYSQLI_BOTH);
					$sl_no=$sl_no+1;
					//$receipt_id=$row['RECEIPT_ID'];
					//$date=$row['DATE'];
					
					$total_student=$total_student+$row2['TOTAL_STUDENT_P'];
					$total_student_dues=$total_student_dues+$row3['TOTAL_STUDENT_D'];
					$total_student_nodues=$total_student_nodues+$row4['TOTAL_STUDENT_ND'];
					
					
					
					echo '<tr><td>'.$sl_no.'</td><td><a href="class_payment_report.php?class='.$row['CLASS'].'&month='.$month.'&year='.$year.'">'.$row['CLASS'].'</a></td>';
					if($row2['TOTAL_STUDENT_P']!=0)
					{
					echo '<td><a href="#">'.$row2['TOTAL_STUDENT_P'].'</a></td>';
					}
					else
					{
						echo '<td>'.$row2['TOTAL_STUDENT_P'].'</td>';
					}
					
					if($row4['TOTAL_STUDENT_ND']!=0)
					{
					echo '<td><a href="class_nodues.php?class='.$row['CLASS'].'&month='.$month.'&year='.$year.'">'.$row4['TOTAL_STUDENT_ND'].'</a></td>';
					}
					else
					{
						echo '<td>'.$row4['TOTAL_STUDENT_ND'].'</td>';
					}
					
					
					if($row3['TOTAL_STUDENT_D']!=0)
					{
					echo '<td><a href="report_dues.php?class='.$row['CLASS'].'&month='.$month.'&year='.$year.'">'.$row3['TOTAL_STUDENT_D'].'</a></td>';
					}
					else
					{
						echo '<td>'.$row3['TOTAL_STUDENT_D'].'</td>';
					}
					echo '<td>'.$row['TOTAL_BILL_AMOUNT'].'</td>
					<td>'.$row['TOTAL_PAID'].'</td>
					
					<td>'.$row['TOTAL_DUES'].'</td>';
					
				}
				echo '<tr><td></td><td>Total</td><td>'.$total_student.'</td><td>'.$total_student_nodues.'</td><td>'.$total_student_dues.'</td><td>'.$total_amount.'</td><td>'.$total_paid_amount.'</td><td>'.$total_dues_amount.'</td>';
				echo '</table>';
				//$data=mysqli_fetch_row($query);
				//echo "$data['']";
			}
			else
			{
				echo '<span class="warning">';
				echo "Not Found. Please Try Again.";
				echo '</span>';
			}
	?>
	