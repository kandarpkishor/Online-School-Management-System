	
<?php
function generatebill($sid, $mnth, $yr, $cls, $trans, $host, $otherfee, $othname, $examfee)
{
	$conn=mysqli_connect('localhost', 'root', '');
	$db=mysqli_select_db($conn,"school");
	
	$class=$cls;
	$query_fee= mysqli_query($conn, "SELECT *FROM fee WHERE CLASS='$class' ORDER BY ID DESC");
	$num_fee=mysqli_num_rows($query_fee);
	if($num_fee!=0)
	{
		$row_fee=mysqli_fetch_array($query_fee, MYSQLI_BOTH);
		$tutfee=$row_fee['TUT_FEE'];
		$comp_fee=$row_fee['COMPUTER_FEE'];
	}
		$sid1=$sid;
		$month=$mnth;
		$year=$yr;
		$trans_fee=$trans;
		$hostal_fee=$host;
		$other_fee=$otherfee;
		$other_name=$othname;
		$exam_fee=$examfee;
		
		$billid=rand_number_generator(6);
		$query1=mysqli_query($conn,"SELECT *FROM class WHERE S_ID='$sid1'");
		$row1=mysqli_fetch_array($query1,MYSQLI_BOTH);
		$sname=$row1['S_NAME'];
		$roll=$row1['ROLL'];
		$class=$row1['CLASS'];
		date_default_timezone_set("Asia/Kolkata");
		$date= date("Y-m-d G:i:s");
		$dues=0;
		$query5=mysqli_query($conn,"SELECT BILL_ID FROM bill WHERE S_ID='$sid1' AND MONTH='$month' AND YEAR='$year'");
		$num5=mysqli_num_rows($query5);
		if($num5!=0)
		{
			$result5=mysqli_fetch_array($query5,MYSQLI_BOTH);
			echo '<div style="width:500px; height:200px; margin:auto; background:white; padding:10px; border:2px solid lightgrey;">';
			echo '<span class="warning">Bill Already Generated For Student Id '.$sid1.'. </span><br><hr><b>Details</b></span><br><hr>';
			echo 'Name : '.$sname;
			echo '<br>Bill Month : '.$month.'  <br>Bill Year : '.$year;
			echo '<br>Bill No. : <a href=bill.php?id='.$result5['BILL_ID'].'>'.$result5['BILL_ID'].'</a>.<hr>'; 
			echo '<hr>';
			echo'</div>';
		}
		else
		{
			$query4=mysqli_query($conn,"SELECT *FROM bill WHERE S_ID='$sid1' AND BILL_ID NOT IN (SELECT BILL_ID  FROM payment)");
			$num4=mysqli_num_rows($query4);
			if($num4!=0)
			{
				while($result4=mysqli_fetch_array($query4,MYSQLI_BOTH))
				{
					$dues=$dues+$result4['TUATION_FEE']+$result4['COMPUTER_FEE']+$result4['EXAM_FEE']+$result4['TRANSPORT_FEE']+$result4['HOSTAL_FEE']+$result4['OTHER_FEE']+$result4['PREV_DUES'];
					
					$sid2=$result4['S_ID']; $billid2=$result4['BILL_ID']; $sname2=$result4['S_NAME'];
					$roll2=$result4['ROLL']; $class2=$result4['CLASS']; $month2=$result4['MONTH']; $year2=$result4['YEAR'];
					
					$total2=$result4['TUATION_FEE']+$result4['TRANSPORT_FEE']+$result4['COMPUTER_FEE']+$result4['EXAM_FEE']+$result4['OTHER_FEE']+$result4['PREV_DUES'];
					//echo $total2;
					$a=0;
					$b=$a-$total2;
					$query6=mysqli_query($conn,"INSERT INTO payment VALUES(NULL,'$sid2','$billid2','','$sname2','$roll2','$class2',
					'$month2','$year2',$total2,0,$total2,$b,'1111-11-11')");
					/*if($query6)
					{
						echo 'ok';
					}
					else
					{
						echo mysqli_error($conn);
						echo 'prob';
					}*/
				}
					//echo " else if<br>";
					//echo $dues;
			}
			else
			{
				$query7=mysqli_query($conn,"SELECT DUES FROM payment WHERE S_ID='$sid1' ORDER BY ID DESC");
				$result7=mysqli_fetch_array($query7, MYSQLI_BOTH);
				$dues=$dues+$result7['DUES'];
				//echo "second else<br>";
				//echo $dues;
			}
			//echo "<br>After if<br>";
			$query3=mysqli_query($conn,"INSERT INTO bill VALUES(NULL,'$sid1','$billid','$sname','$roll','$class','$month','$year','$tutfee','$comp_fee','$exam_fee','0','$trans_fee','$hostal_fee','$other_fee','$other_name',$dues,'$date')");
			if($query3)
			{
				//echo '<script type="text/javascript">alert("Student ID : '.$sid1.' Added Successfully");</script>';
				//echo '<meta content="0;bill.php?id='.$billid.'" http-equiv="refresh" />';
			}
			else
			
				echo mysqli_error($conn);	
		}
}
?>