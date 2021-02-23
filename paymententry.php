<?php
include "include/header.php";
?>

<div class="temp_container">
	<div class="search_panel">
	<form action="" method="post">
		<!--<input type="text" name="sid" placeholder="Enter Bill No. or Student Id"/>/-->
		<input list="sid" style="height:30px; width:300px; border:1px solid grey; border-radius:5px;" autocomplete="on" name="sid" placeholder="Enter Bill No. or Student Id"/>
			<datalist id="sid">
				<?php
					$select_sid=mysqli_query($conn, "SELECT S_ID, S_NAME FROM bill WHERE S_ID NOT IN (SELECT S_ID FROM payment) ");
					$num_sid=mysqli_num_rows($select_sid);
					if($num_sid!=0)
					{
						
						while($row_sid=mysqli_fetch_array($select_sid, MYSQLI_BOTH))
						{
						?>	
						<option value="<?php echo $row_sid['S_ID']?>"><?php echo $row_sid['S_NAME']?></option>
						<?php
						}
					}
					?>
				
				
			</datalist>
		<input type="submit" name="studentsearch" value="Find Student"/>
	</form>
	</div>
<?php
	if(isset($_POST['studentsearch']))
	{
		if(empty($_POST['sid']))
		{
			echo'<span class="warning">';
			echo "Please Enter Bill No. or Student Id";
			echo '</span>';
		}
		else
		{
			$sid=$_POST['sid'];
			//$query=mysqli_query($conn,"SELECT *FROM bill WHERE (S_ID='$sid' or BILL_ID='$sid') AND MONTH ='$month'");
			$query=mysqli_query($conn,"SELECT *FROM bill WHERE (S_ID='$sid' OR BILL_ID='$sid')  AND BILL_ID NOT IN (SELECT BILL_ID  FROM payment) ORDER BY ID DESC");
			//$query=mysqli_query($conn,"SELECT *FROM bill WHERE S_ID='$sid' OR BILL_ID='$sid' ORDER BY ID DESC");
			$num=mysqli_num_rows($query);
			if($num>=1)
			{
			$result=mysqli_fetch_array($query,MYSQLI_BOTH)
?>
				<table style="border:2px solid black;border-collapse:collapse;width:60%;padding:5px; margin:auto;">
				<tr>
					<td colspan="3" style="border:1px solid black;">
					<center>
						   
						Bill Month :&nbsp <?php 
						echo $result['MONTH'];
						echo'/';
						echo $result['YEAR'];
						?>
					</center>
					</td>
				</tr>
				<tr style="border:1px solid black;">
					<td>
						Bill No. :&nbsp <?php 
						echo $result['BILL_ID'];	
						?>
					</td>
					<td colspan="2" style="text-align:right;">
						Date :&nbsp <?php 
						echo $result['DATE'];
						?>			
					</td>
				</tr>
				<tr>
					<td colspan="2">
						Name :&nbsp <?php 
						echo $result['S_NAME'];
						?>
					</td>
					<td colspan="">
						ID :&nbsp <?php 
						echo $result['S_ID'];
						?>
					</td>
				</tr>
				<tr>	
					<td colspan="2">
						Roll No. : &nbsp <?php 
						echo $result['ROLL'];	
						?>
					</td>
					<td colspan="">
						Class : &nbsp <?php 
						echo $result['CLASS'];
						?>
					</td>
				</tr>
				<tr style="border:1px solid black;">
					<td colspan="3">
						<center>
						Bill Detail
						</center>
					</td>
				</tr >
				<tr style="border:1px solid black;">
					<th colspan="2">
						<center>Particular</center> 
					</th>
					<th style="border:1px solid black;">
						<center>Amount</center>
					</th>
				</tr>
				<tr>
					<td colspan="2"style="border:1px solid black;">
						1.&nbsp Tuation Fee 
					</td>
					<td style="border:1px solid black;">
					<center>
						<?php 
						echo $result['TUATION_FEE'];
						
						?>
					</center>
					</td>
				</tr>
				<tr>
					<td colspan="2"style="border:1px solid black;">
						2.&nbsp Computer Fee 
					</td>
					<td style="border:1px solid black;">
					<center>
						<?php 
						echo $result['COMPUTER_FEE'];
						
						?>
					</center>
					</td>
				</tr>
				<tr>
					<td colspan="2"style="border:1px solid black;">
						3.&nbsp Exam Fee 
					</td>
					<td style="border:1px solid black;">
					<center>
						<?php 
						echo $result['EXAM_FEE'];
						
						?>
					</center>
					</td>
				</tr>
				<tr>
					<td colspan="2"style="border:1px solid black;">
						4.&nbsp Transport Fee
					</td>
					<td style="border:1px solid black;">
					<center>
						<?php 
						echo $result['TRANSPORT_FEE'];
						
						?>
					</center>
					</td>
				</tr>
				<tr>
					<td colspan="2"style="border:1px solid black;">
						5.&nbsp Hostal Fee
					</td>
					<td style="border:1px solid black;">
					<center>
						<?php 
						echo $result['HOSTAL_FEE'];
						
						?>
					</center>
					</td>
				</tr>
				<tr>
					<td colspan="2"style="border:1px solid black;">
						6.&nbsp <?php 
									if($result['OTHER_REMARK']=='')
									{
										echo 'Other Fee';
									}
									else
									{
									echo ucwords(strtolower($result['OTHER_REMARK'])); 
									}
								?>
					</td>
					<td style="border:1px solid black;">
					<center>
						<?php 
						echo $result['OTHER_FEE'];
						
						?>
					</center>
					</td>
				</tr>
				<tr style="border:2px solid black;">
					<td rowspan="2">
					<center>Total</center>
					</td>
					<td style="border:1px solid black;">
						<center>Current Dues </center>
					</td>
					<td style="border:1px solid black;">
					<center>
						<?php 
						echo $result['TUATION_FEE']+$result['COMPUTER_FEE']+$result['EXAM_FEE']+$result['HOSTAL_FEE']+$result['TRANSPORT_FEE']+$result['OTHER_FEE'];
						?>
					</center>
					</td>
				</tr>
				<tr style="border:2px solid black;">
					<td style="border:1px solid black;">
						<center>Previous Dues </center>
					</td>
					<td style="border:1px solid black;">
					<center>
						<?php 
							echo $result['PREV_DUES'];
						?>
					</center>
					</td>
				</tr>
				<tr style="border:1px solid black;">
					<td style="border:1px solid black;" colspan="2">
						<center>Grand Total</center>
					</td>
					<td style="border:1px solid black;">
					<center>
						<?php 
						echo $result['TUATION_FEE']+$result['COMPUTER_FEE']+$result['EXAM_FEE']+$result['HOSTAL_FEE']+$result['TRANSPORT_FEE']+$result['OTHER_FEE']+$result['PREV_DUES'];
						
						?>
					</center>
					</td>
				</tr>
			</table> <br>
			<?php 
				$total=$result['TUATION_FEE']+$result['COMPUTER_FEE']+$result['EXAM_FEE']+$result['HOSTAL_FEE']+$result['TRANSPORT_FEE']+$result['OTHER_FEE']+$result['PREV_DUES'];
			?>
			<div class="search_panel" style="position:relative; top:-80px;">
			<form action="" method="POST">
			
			<input type="text" name="amount" Placeholder="Enter Amount" autofocus/>
			<input type="hidden" name="billid" value="<?php echo $result['BILL_ID']?>"/>
			<input type="hidden" name="prev_dues" value="<?php echo $total ?>"/>
			<input type="submit" name="make_payment" value="Make Payment"/>

			</form>
			</div>

 <?php
			
		
	}
			else
			{
			$query4=mysqli_query($conn,"SELECT *FROM bill WHERE (S_ID='$sid' or BILL_ID='$sid') ORDER BY ID DESC");
			$result4=mysqli_fetch_array($query4,MYSQLI_BOTH);
			$month=$result4['MONTH'];
			$billid4=$result4['BILL_ID'];
			$query3=mysqli_query($conn,"SELECT *FROM payment WHERE BILL_ID='$billid4'");//(S_ID='$sid' or BILL_ID='$sid') AND MONTH ='$month'
			$num3=mysqli_num_rows($query3);
				if($num3>=1)
				{
					$result3=mysqli_fetch_array($query3,MYSQLI_BOTH);
					echo '<span class="warning">Payment for the Month of  '.$month.' '.$result4['YEAR'].' already paid. Click on Print Receipt Button to print recipt<br>Thank You<br><br></span>';
					echo '<a target="_blank"href="receipt.php?id='.$result3['RECEIPT_ID'].'"><input type= "button" style="width:100px;height:30px;" name="view" value="Print Receipt"/></a>';
					echo mysqli_error($conn);
					
				}
				else
				{
				echo'<span class="warning">';
				echo "Student Not Found. Please Enter Currect Student Id";
				echo '</span>';
				}
			}
			
		}
	}
	
?>

<?php
	if(isset($_POST['make_payment']))
	{
		
		$billid=$_POST['billid'];
		$tot_amount=$_POST['prev_dues'];
		$query=mysqli_query($conn,"SELECT *FROM bill WHERE BILL_ID='$billid'");
		$row1=mysqli_fetch_array($query,MYSQLI_BOTH);
		$sid1=$row1['S_ID'];
		$sname=$row1['S_NAME'];
		$roll=$row1['ROLL'];
		$class=$row1['CLASS'];
		$month=$row1['MONTH'];
		$year=$row1['YEAR'];
		$amount=$_POST['amount'];
		$dues=$tot_amount-$amount;
		$balance=$amount-$tot_amount;
		$receipt_id=rand_number_generator(5);
		date_default_timezone_set("Asia/Kolkata");
		$date= date("Y-m-d G:i:s");
		$query2=mysqli_query($conn,"INSERT INTO payment VALUES(NULL,'$sid1','$billid','$receipt_id','$sname','$roll','$class','$month','$year',$tot_amount,$amount,
		$dues,$balance,'$date')");
		if($query2)
		{
			//echo '<script type="text/javascript">alert("Payment Added Successfully");</script>';
			//echo '<meta content="0;receipt.php?id='.$receipt_id.'" http-equiv="refresh" />';
			echo '<span class="warning">Payment For the Month Of  '.$month.' '.$year.' Paid Successfully. Click on Print Receipt Button to Print Recipt. <br>Thank You.<br><br></span>';
					echo '<a target="_blank"href="receipt.php?id='.$receipt_id.'"><input type= "button" style="width:100px;height:30px;" name="view" value="Print Receipt"/></a>';
					echo mysqli_error($conn);
			
		
		}
		else
		{
			echo mysqli_error($conn);
		echo "problem";
		}
	}
?>
</div>
<?php
include "include/footer.php";


?>