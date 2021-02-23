<?php
include('include/header.php');
//include('include/number_generator.php');

?>
<div class="temp_container">
<div class="search_panel">
	<form action="" method="POST" style="margin:auto;">
	<input type="text" name="studentid" placeholder="Enter Student Id" />
	<input type="submit" name="track" value= "Find Payment Detail" />
	<input type="submit" name = "trackall" value="Find All Result"/>
	</form>
</div>
<?php
	//$studentid = $_POST['studentid'];
	//echo $studentid;
	$class=$_REQUEST['class'];
	$month=$_REQUEST['month'];
	$year=$_REQUEST['year'];
	if(isset($_POST['track']))
	{	
		if (empty($_POST['studentid']))
		{
			echo "Please Enter Student ID";
		}
	
		else
		{
			$studentid = $_POST['studentid'];
			$query1 = mysqli_query($conn,"SELECT *FROM payment WHERE S_ID='$studentid' AND CLASS='$class' AND MONTH= '$month' AND YEAR='$year'");
			$cont = mysqli_num_rows($query1);
			if($cont>=1)
			{
				//$row = mysqli_fetch_array($query1,MYSQLI_BOTH);
				echo '<table style="margin:auto;" class="table">';
				echo '<th>ID</th><th>STUDENT ID</th><th>BILL No</th><th>Receipt No.</th><th>NAME</th><th>ROLL</th><th>CLASS</th><th>MONTH</th><th>YEAR</th><th>AMOUNT</th><th>PAID</th><th>DUES</th><th>BALANCE</th><th>DATE</th><th>ACTION></th>';
				while($row = mysqli_fetch_array($query1,MYSQLI_BOTH))
				{
					echo '<tr><td>'.$row['ID'].'</td><td>'.$row['S_ID'].'</td><td>'.$row['BILL_ID'].'</td>';
					
					$receipt_id=$row['RECEIPT_ID'];
			if($receipt_id=='')
					{
					$receipt_id='Not Paid';
					$date='';
					echo '<td><span class="warning">'.$receipt_id.'</span></td>';
					}
					else
					{
						$receipt_id=$row['RECEIPT_ID'];
						//$date=$row['DATE'];
						echo '<td><span style="color:green;">'.$receipt_id.'</span></td>';
					}
					
					echo '<td>'.ucwords($row['S_NAME']).'</td><td>'.$row['ROLL'].'</td><td>'.$row['CLASS'].
			'</td><td>'.$row['MONTH'].'</td><td>'.$row['YEAR'].'</td><td>'.$row['TOTAL_AMOUNT'].'</td><td>'.$row['PAID'].'</td><td>'.$row['DUES'].'</td><td>'.$row['BALANCE'].'</td><td>'.$row['DATE'].'</td>';
					$receipt_id2=$row['RECEIPT_ID'];
			if($receipt_id2=='')
					{
						echo '<td><a href="receipt.php?id='.$row['RECEIPT_ID'].'" target="_blank"> <input type="button" disabled="disabled" name="prnt" value="Print Receipt"/></a>';
					}
					else
					{
						echo '<td><a href="receipt.php?id='.$row['RECEIPT_ID'].'" target="_blank" > <input type="button" name="prnt" value="Print Receipt"/></a>';
					}
					
					//echo '<td><a href="receipt.php?id='.$row['RECEIPT_ID'].'" target="_blank"> <input type="button" name="prnt" value="Print"/></a>';
					//echo '<a href=bill.php?id='.$row['1'].'> <input type="button" name="edit" value="Edit"/></a></td></tr>';
				}
				echo '</table>';
				//$data=mysqli_fetch_row($query);
				//echo "$data['']";
			}
			else
			{
				echo "Student ID $studentid Not Found";
			}
		}
	}
	
	elseif (isset($_POST['trackall']))
	{
		if(isset($_GET['page']))
				$page=$_GET['page'];
		else
			$page=1;
		$search_from=($page-1)*20;
		$query2 = mysqli_query($conn,"SELECT *FROM payment WHERE CLASS='$class' AND MONTH= '$month' AND YEAR='$year' LIMIT $search_from, 20");
		//$row = mysqli_fetch_array($query1,MYSQLI_BOTH);
		echo '<table style="margin:auto;" class="table">';
		echo '<th>ID</th><th>STUDENT ID</th><th>BILL No</th><th>Receipt No.</th><th>NAME</th><th>ROLL</th><th>CLASS</th><th>MONTH</th><th>YEAR</th><th>AMOUNT</th><th>PAID</th><th>DUES</th><th>BALANCE</th><th>DATE</th><th>ACTION</th>';
		while($row = mysqli_fetch_array($query2,MYSQLI_BOTH))
		{
			
			echo '<tr><td>'.$row['ID'].'</td><td>'.$row['S_ID'].'</td><td>'.$row['BILL_ID'].'</td>';
			
			$receipt_id=$row['RECEIPT_ID'];
			if($receipt_id=='')
					{
					$receipt_id='Not Paid';
					$date='';
					echo '<td><span class="warning">'.$receipt_id.'</span></td>';
					}
					else
					{
						$receipt_id=$row['RECEIPT_ID'];
						//$date=$row['DATE'];
						echo '<td><span style="color:green;">'.$receipt_id.'</span></td>';
					}
			
			echo '<td>'.ucwords($row['S_NAME']).'</td><td>'.$row['ROLL'].'</td><td>'.$row['CLASS'].
			'</td><td>'.$row['MONTH'].'</td><td>'.$row['YEAR'].'</td><td>'.$row['TOTAL_AMOUNT'].'</td><td>'.$row['PAID'].'</td><td>'.$row['DUES'].'</td><td>'.$row['BALANCE'].'</td><td>'.$row['DATE'].'</td>';
			$receipt_id2=$row['RECEIPT_ID'];
			if($receipt_id2=='')
					{
						echo '<td><a href="receipt.php?id='.$row['RECEIPT_ID'].'" target="_blank"> <input type="button" disabled="disabled" name="prnt" value="Print Receipt"/></a>';
					}
					else
					{
						echo '<td><a href="receipt.php?id='.$row['RECEIPT_ID'].'" target="_blank" > <input type="button" name="prnt" value="Print Receipt"/></a>';
					}
			
			//echo '<td><a target="_blank" href="receipt.php?id='.$row['RECEIPT_ID'].'"> <input type="button" name="prnt" value="Print"/></a>';
					//echo '<a href=bill.php?id='.$row['1'].'> <input type="button" name="edit" value="Edit"/></a></td></tr>';
		}
		echo '</table>';
		//echo '<input type ="button" value="Print" onClick="printDiv('tbl')"/>';
		//$data=mysqli_fetch_row($query);
		//echo "$data['']";
			$result = mysqli_query($conn,"SELECT COUNT(ID) AS total FROM payment");
			$row = mysqli_fetch_assoc($result);
			$total_pages = ceil($row["total"] / 20); // calculate total pages with results
			  
			for ($i=1; $i<=$total_pages; $i++) 
			{  // print links for all pages
						echo "<a href='payment.php?page=".$i."'";
						if ($i==$page)  echo " class='curPage'";
						echo ">".$i."</a> "; 
			}; 
	}
	else
	{
		if(isset($_GET['page']))
				$page=$_GET['page'];
		else
			$page=1;
		$search_from=($page-1)*20;
	
		$query2 = mysqli_query($conn,"SELECT *FROM payment WHERE CLASS='$class' AND MONTH= '$month' AND YEAR='$year' LIMIT $search_from, 20");
		//$row = mysqli_fetch_array($query1,MYSQLI_BOTH);
		echo '<table style="margin:auto;" class="table">';
		echo '<th>ID</th><th>STUDENT ID</th><th>BILL No</th><th>Receipt No.</th><th>NAME</th><th>ROLL</th><th>CLASS</th><th>MONTH</th><th>YEAR</th><th>AMOUNT</th><th>PAID</th><th>DUES</th><th>BALANCE</th><th>DATE</th><th>ACTION</th>';
		while($row = mysqli_fetch_array($query2,MYSQLI_BOTH))
		{
			
			
			
			echo '<tr><td>'.$row['ID'].'</td><td>'.$row['S_ID'].'</td><td>'.$row['BILL_ID'].'</td>';
			
			
			
			$receipt_id=$row['RECEIPT_ID'];
			if($receipt_id=='')
					{
					$receipt_id='Not Paid';
					$date='';
					echo '<td><span class="warning">'.$receipt_id.'</span></td>';
					}
					else
					{
						$receipt_id=$row['RECEIPT_ID'];
						//$date=$row['DATE'];
						echo '<td><span style="color:green;">'.$receipt_id.'</span></td>';
					}
			
			
			
			
			
			echo '<td>'.ucwords(strtolower($row['S_NAME'])).'</td><td>'.$row['ROLL'].'</td><td>'.$row['CLASS'].
			'</td><td>'.$row['MONTH'].'</td><td>'.$row['YEAR'].'</td><td>'.$row['TOTAL_AMOUNT'].'</td><td>'.$row['PAID'].'</td><td>'.$row['DUES'].'</td><td>'.$row['BALANCE'].'</td><td>'.$row['DATE'].'</td>';
			$receipt_id2=$row['RECEIPT_ID'];
			if($receipt_id2=='')
					{
						echo '<td><a href="receipt.php?id='.$row['RECEIPT_ID'].'" target="_blank"> <input type="button" disabled="disabled" name="prnt" value="Print Receipt"/></a>';
					}
					else
					{
						echo '<td><a href="receipt.php?id='.$row['RECEIPT_ID'].'" target="_blank" > <input type="button" name="prnt" value="Print Receipt"/></a>';
					}
					//echo '<td><a href="receipt.php?id='.$row['RECEIPT_ID'].'" target="_blank" > <input type="button" name="prnt" value="Print Receipt"/></a>';
					//echo '<a href=bill.php?id='.$row['1'].'> <input type="button" name="edit" value="Edit"/></a></td></tr>';
		}
		echo '</table>';
		//echo '<input type ="button" value="Print" onClick="printDiv('tbl')"/>';
		//$data=mysqli_fetch_row($query);
		//echo "$data['']";
		$result = mysqli_query($conn,"SELECT COUNT(ID) AS total FROM payment");
			$row = mysqli_fetch_assoc($result);
			$total_pages = ceil($row["total"] / 20); // calculate total pages with results
		for ($i=1; $i<=$total_pages; $i++) 
			{  // print links for all pages
						echo "<a href='payment.php?page=".$i."'";
						if ($i==$page)  echo " class='curPage'";
						echo ">".$i."</a> "; 
			}; 
	
	}
	
?>
<?php
include "include/footer.php";
?>