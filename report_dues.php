<?php

	include('include/header.php');			  

?>

<div class="temp_container">

	<div class="search_panel">
	<form action="" method="POST" style="margin:20px;">
	<input type="text" name="billid" placeholder="Enter Bill No. or Student ID or Name"/>
	<input type="submit" name="track" value= "Find"/>
	<input type="submit" name="trackall" value= "Find All"/>
</form>
	</div>
<?php
	//$studentid = $_POST['studentid'];
	//echo $studentid;
	$month=$_REQUEST['month'];
	$year=$_REQUEST['year'];
	$sl_no=0;
	if(isset($_POST['track']))
	{	
		if (empty($_POST['billid']))
		{
			echo '<span class="warning">';
			echo "Please Enter Student ID or Bill No. or Name";
			echo '</span>';
		}
	
		else
		{
			$billid = $_POST['billid'];
			$query1 = mysqli_query($conn,"SELECT *FROM payment WHERE (BILL_ID='$billid' OR S_ID='$billid' OR S_NAME='$billid') AND MONTH='$month' AND YEAR='$year' AND DUES>00");
			$cont = mysqli_num_rows($query1);
			if($cont>=1)
			{
				
				//$row = mysqli_fetch_array($query1,MYSQLI_BOTH);
				echo '<table class="table">';
				echo '<th>ID</th><th>STUDENT ID</th><th>BILL NO</th><th>RECEIPT NO</th><th>NAME</th><th>CLASS</th><th>ROLL NO</th><th>MONTH</th><th>YEAR</th><th>BILL AMOUNT</th><th>PAID</th><th>DUES</th><th>PAYMENT DATE </th><th>ACTION</th>';
				while($row = mysqli_fetch_array($query1,MYSQLI_BOTH))
				{
					$sl_no=$sl_no+1;
					$receipt_id=$row['RECEIPT_ID'];
					$date=$row['DATE'];
					echo '<tr><td>'.$sl_no.'</td><td>'.$row['S_ID'].'</td><td>'.$row['BILL_ID'].'</td>';
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
					
					echo '<td>'.ucwords(strtolower($row['S_NAME'])).'</td><td>'.$row['CLASS'].
				'</td><td>'.$row['ROLL'].'</td><td>'.$row['MONTH'].'</td><td>'.$row['YEAR'].'</td><td>'.$row['TOTAL_AMOUNT'].'</td><td>'.$row['PAID'].'</td><td>'.$row['DUES'].'</td><td>'.$date.'</td>';
				echo '<td><a target="_blank" href=bill.php?id='.$row['BILL_ID'].'> <input type="button" name="prnt" value="Print"/></a>';
				}
				echo '</table>';
				//$data=mysqli_fetch_row($query);
				//echo "$data['']";
			}
			else
			{
				echo '<span class="warning">';
				echo "$billid Not Found. Please Try Again.";
				echo '</span>';
			}
		}
	}
	
	
	elseif(isset($_POST['trackall']))
	{	
			if(isset($_GET['page']))
				$page=$_GET['page'];
		else
			$page=1;
		$search_from=($page-1)*20;
		$query2 = mysqli_query($conn,"SELECT *FROM class LIMIT $search_from, 20");
		//$row = mysqli_fetch_array($query1,MYSQLI_BOTH);
		echo '<table class="table" style="//width:1000px;">';
		echo '<th>ID</th><th>STUDENT ID</th><th>BILL NO</th><th>RECEIPT NO</th><th>NAME</th><th>CLASS</th><th>ROLL NO</th><th>MONTH</th><th>YEAR</th><th>BILL AMOUNT</th><th>PAID</th><th>DUES</th><th>PAYMENT DATE </th><th>ACTION</th>';
		while($row1 = mysqli_fetch_array($query2,MYSQLI_BOTH))
		{
			$sid=$row1['S_ID'];
			$query3 = mysqli_query($conn,"SELECT *FROM payment WHERE S_ID='$sid' AND MONTH='$month' AND YEAR='$year' AND DUES>0 ORDER BY ID DESC LIMIT $search_from, 20");
			$num=mysqli_num_rows($query3);
			if($num!=0)
			{	$sl_no=$sl_no+1;
				$row = mysqli_fetch_array($query3,MYSQLI_BOTH);
				$receipt_id=$row['RECEIPT_ID'];
				$date=$row['DATE'];
				
				echo '<tr><td>'.$sl_no.'</td><td>'.$row['S_ID'].'</td><td>'.$row['BILL_ID'].'</td>';
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
				
				echo '<td>'.ucwords(strtolower($row['S_NAME'])).'</td><td>'.$row['CLASS'].
				'</td><td>'.$row['ROLL'].'</td><td>'.$row['MONTH'].'</td><td>'.$row['YEAR'].'</td><td>'.$row['TOTAL_AMOUNT'].'</td><td>'.$row['PAID'].'</td><td>'.$row['DUES'].'</td><td>'.$date.'</td>';
				echo '<td><a target="_blank" href=bill.php?id='.$row['BILL_ID'].'> <input type="button" name="prnt" value="Print"/></a>';
				//echo '<a href=bill.php?id='.$row['1'].'> <input type="button" name="edit" value="Edit"/></a></td></tr>';
			}
			else
			{
				echo mysqli_error($conn);
			}
		}
		echo '</table>';
		
			$result = mysqli_query($conn,"SELECT COUNT(ID) AS total FROM payment");
			$row = mysqli_fetch_assoc($result);
			$total_pages = ceil($row["total"] / 20); // calculate total pages with results
			  
			for ($i=1; $i<=$total_pages; $i++) 
			{  // print links for all pages
						echo "<a href='dues.php?page=".$i."'";
						if ($i==$page)  echo " class='curPage'";
						echo ">".$i."</a> "; 
			}; 
		
		
		//echo '<input type ="button" value="Print" onClick='.tbl.'/>';
		//$data=mysqli_fetch_row($query);
		//echo "$data['']";
	
	}
	
	else
	{	
			if(isset($_GET['page']))
				$page=$_GET['page'];
		else
			$page=1;
		$search_from=($page-1)*20;
		$sl_no=0;
		$query2 = mysqli_query($conn,"SELECT *FROM class LIMIT $search_from, 20");
		//$row = mysqli_fetch_array($query1,MYSQLI_BOTH);
		echo '<table class="table" style="//width:1000px;">';
		echo '<th>ID</th><th>STUDENT ID</th><th>BILL NO</th><th>RECEIPT NO</th><th>NAME</th><th>CLASS</th><th>ROLL NO</th><th>MONTH</th><th>YEAR</th><th>BILL AMOUNT</th><th>PAID</th><th>DUES</th><th>PAYMENT DATE </th><th>ACTION</th>';
		while($row1 = mysqli_fetch_array($query2,MYSQLI_BOTH))
		{
			$sid=$row1['S_ID'];
			$query3 = mysqli_query($conn,"SELECT *FROM payment WHERE S_ID='$sid' AND MONTH='$month' AND YEAR='$year' AND DUES>0 ORDER BY ID DESC LIMIT $search_from, 20");
			$num=mysqli_num_rows($query3);
			if($num!=0)
			{	$sl_no=$sl_no+1;
				$row = mysqli_fetch_array($query3,MYSQLI_BOTH);
				$receipt_id=$row['RECEIPT_ID'];
				$date=$row['DATE'];

				echo '<tr><td>'.$sl_no.'</td><td>'.$row['S_ID'].'</td><td>'.$row['BILL_ID'].'</td>';
				
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
				
				echo '<td>'.ucwords(strtolower($row['S_NAME'])).'</td><td>'.$row['CLASS'].
				'</td><td>'.$row['ROLL'].'</td><td>'.$row['MONTH'].'</td><td>'.$row['YEAR'].'</td><td>'.$row['TOTAL_AMOUNT'].'</td><td>'.$row['PAID'].'</td><td>'.$row['DUES'].'</td><td>'.$date.'</td>';
				echo '<td><a target="_blank" href=bill.php?id='.$row['BILL_ID'].'> <input type="button" name="prnt" value="Print"/></a>';
				//echo '<a href=bill.php?id='.$row['1'].'> <input type="button" name="edit" value="Edit"/></a></td></tr>';
			}
			else
			{
				echo mysqli_error($conn);
			}
		}
		echo '</table>';
		
			$result = mysqli_query($conn,"SELECT COUNT(ID) AS total FROM payment");
			$row = mysqli_fetch_assoc($result);
			$total_pages = ceil($row["total"] / 20); // calculate total pages with results
			  
			for ($i=1; $i<=$total_pages; $i++) 
			{  // print links for all pages
						echo "<a href='dues.php?page=".$i."'";
						if ($i==$page)  echo " class='curPage'";
						echo ">".$i."</a> "; 
			}; 
		
		
		//echo '<input type ="button" value="Print" onClick='.tbl.'/>';
		//$data=mysqli_fetch_row($query);
		//echo "$data['']";
	
	}
?>
	
