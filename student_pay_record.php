<?php

include("include/header.php");
?>
<div class="temp_container">
	<div class="search_panel">
	<center>
		<form action="" method="post">
  <input type="text" name="sid" placeholder="Enter Student Id"/>
  <input type="submit" name="viewpay" value="View Payment"/>
</form>
	</center>
	</div>
	<?php
	if(isset($_POST['viewpay']))
	{
		if(empty($_POST['sid']))
		{
			echo "Please Enter Student Id.";
		}
		else
		{
			$studentid = $_POST['sid'];
			$query1 = mysqli_query($conn,"SELECT *FROM payment WHERE S_ID='$studentid'");
			$cont = mysqli_num_rows($query1);
			if($cont>=1)
			{
				$row1=mysqli_fetch_array($query1, MYSQLI_BOTH);
				echo '<table style="margin:auto; border:2px solid blue; width:700px;">';
				echo '<tr><td>Name</td><td>'.ucwords(strtolower($row1['S_NAME'])).'</td><td>ID</td><td>'.$studentid.'</td></tr>';
				echo '<tr><td>Class </td><td>'.$row1['CLASS'].'</td><td>Roll No. </td><td>'.$row1['ROLL'].'</td></tr>';
				
				
				echo'</table>';
				//$row = mysqli_fetch_array($query1,MYSQLI_BOTH);
				echo '<table style="margin:auto; border:2px solid blue;width:700px;">';
				echo '<tr><td colspan="8" style="text-align:center; border:2px solid blue; background:lightgreen;"><b>Year&nbsp '.$row1['YEAR'].'</b></td></tr>';
				echo '<th style="margin:5px; border:1px solid purple;padding:5px;">MONTH</th><th style="margin:5px; border:1px solid purple;padding:5px;">BILL No</th><th style="margin:5px; border:1px solid purple;padding:5px;">RECEIPT No.</th><th style="margin:5px; border:1px solid purple;padding:5px;">AMOUNT</th><th style="margin:5px; border:1px solid purple;padding:5px;">PAID</th><th style="margin:5px; border:1px solid purple;padding:5px;">DUES</th><th style="margin:5px; border:1px solid purple;padding:5px;">BALANCE</th><th style="margin:5px; border:1px solid purple;padding:5px;">DATE</th>';
				while($row = mysqli_fetch_array($query1,MYSQLI_BOTH))
				{
					echo '<tr style="margin:5px; border:1px solid purple;">
					<td style="margin:5px; border:1px solid purple;padding:5px;">'.$row['MONTH'].'</td>
					<td style="margin:5px; border:1px solid purple;padding:5px;"><a href="bill.php?id='.$row['BILL_ID'].'" target="_blank">'.$row['BILL_ID'].'</a></td>
					<td style="margin:5px; border:1px solid purple;padding:5px;"><a href="receipt.php?id='.$row['RECEIPT_ID'].'" target="_blank">'.$row['RECEIPT_ID'].'</a></td>
					<td style="margin:5px; border:1px solid purple;padding:5px;">'.$row['TOTAL_AMOUNT'].'</td>
					<td style="margin:5px; border:1px solid purple;padding:5px;">'.$row['PAID'].'</td>
					<td style="margin:5px; border:1px solid purple;padding:5px;">'.$row['DUES'].'</td>
					<td style="margin:5px; border:1px solid purple;padding:5px;">'.$row['BALANCE'].'</td>
					<td style="margin:5px; border:1px solid purple;padding:5px;">'.$row['DATE'].'</td></tr>';
					
				}
				echo '</table>';
				//$data=mysqli_fetch_row($query);
				//echo "$data['']";
			}
			else
			{
				echo "Student ID $studentid Not Found. Please Enter Currect Student Id";
			
			}
		}
	}
	
?>
</div>
<?php

include "include/footer.php";
?>