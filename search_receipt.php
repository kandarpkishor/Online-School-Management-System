<?php
include "include/header.php";
?>
<div class="temp_container">
<div class="search_panel">
		<form action="" method="post">
			<select name="class" style="width:120px;">
				<option value="">Select Class</option>
				<option value="Nursery">Nursery</option>
				<option value="LKG">LKG</option>
				<option value="UKG">UKG</option>
				<option value="I">One</option>
				<option value="II">Two</option>
				<option value="III">Three</option>
				<option value="IV">Four</option>
				<option value="V">Fifth</option>
				<option value="VI">Sixth</option>
				<option value="VII">Seventh</option>
				<option value="VIII">Eight</option>
				<option value="IX">Ninth</option>
				<option value="X">Tenth</option>
			</select>
			<select name="month" style="width:120px;">
				<option value="">Select Month</option>
				<option value="April">April</option>
				<option value="May">May</option>
				<option value="Jun">Jun</option>
				<option value="July">July</option>
				<option value="August">August</option>
				<option value="September">September</option>
				<option value="October">October</option>
				<option value="November">November/option>
				<option value="December">December</option>
				<option value="January">January</option>
				<option value="February">February</option>
				<option value="March">March</option>
			</select>
			<select name="year" style="width:120px;">
				<option value="">Select Year</option>
				<option value="2018">2018</option>
				<option value="2019">2019</option>
				<option value="2020">2020</option>
			</select>
			<input style="width:120px; color:blue; font-size:15px;"type="submit" name="findbill" value="Find Receipt"/></br>
		</form>
	</div>
<?php
	//$studentid = $_POST['studentid'];
	//echo $studentid;
	if(isset($_POST['findbill']))
	{	
		if (empty($_POST['class']) || empty($_POST['month']) || empty($_POST['year']))
		{
			echo '<script type="text/javascript">alert("Please Select Class, Month and Year");</script>';
		}
	
		else
		{
			$class = $_POST['class'];
			$month = $_POST['month'];
			$year = $_POST['year'];
			$query1 = mysqli_query($conn,"SELECT *FROM payment WHERE (CLASS='$class' AND MONTH= '$month' AND YEAR = '$year') AND RECEIPT_ID !='' ");
			$cont = mysqli_num_rows($query1);
			if($cont>=1)
			{
				//$row = mysqli_fetch_array($query1,MYSQLI_BOTH);
				$sl_no=0;
				echo '<table class="table" style="width:1000px;">';
		echo '<tr><th>ID</th><th>RECEIPT NO.</th><th>NAME</th><th>CLASS</th><th>ROLL</th><th>MONTH</th><th>YEAR</th><th>BILL AMOUNT</th><th>AMOUNT PAID</th><th>DUES</th><th>BALANCE</th><th>RECEIPT DATE</th><th>ACTION</th></tr>';
				while($row = mysqli_fetch_array($query1,MYSQLI_BOTH))
				{
					$sl_no=$sl_no+1;
			//$bill_amount=$row['TUATION_FEE']+$row['COMPUTER_FEE']+$row['EXAM_FEE']+$row['HOSTAL_FEE']+$row['TRANSPORT_FEE']+$row['OTHER_FEE'];
			echo '<tr><td>'.$sl_no.'</td><td>'.$row['RECEIPT_ID'].'</td><td>'.ucwords(strtolower($row['S_NAME'])).'</td><td>'.$row['CLASS'].'</td><td>'.$row['ROLL'].'</td><td>'.$row['MONTH'].
			'</td><td>'.$row['YEAR'].'</td><td>'.$row['TOTAL_AMOUNT'].'</td><td>'.$row['PAID'].'</td><td>'.$row['DUES'].'</td><td>'.$row['BALANCE'].'</td><td>'.$row['DATE'].'</td>';
			echo '<td><a target="_blank" href="receipt.php?id='.$row['RECEIPT_ID'].'"> <input type="button" name="prnt" value="Print"/></a></td></tr>';
				}
				echo '</table>';
				//$data=mysqli_fetch_row($query);
				//echo "$data['']";
			}
			else
			{
				echo '<span class="warning">Bill Receipt not found for Class '.$class.' For the Month of '.$month.'/'.$year.'</span>';
			}
		}
	}
	else
	{	
			if(isset($_GET['page']))
				$page=$_GET['page'];
		else
			$page=1;
		$search_from=($page-1)*20;
		$query2 = mysqli_query($conn,"SELECT *FROM payment WHERE RECEIPT_ID !='' LIMIT $search_from, 20");
		//$row = mysqli_fetch_array($query1,MYSQLI_BOTH);
		$sl_no=0;
		echo '<table class="table" style="width:1000px;">';
		echo '<tr><th>ID</th><th>RECEIPT NO.</th><th>NAME</th><th>CLASS</th><th>ROLL</th><th>MONTH</th><th>YEAR</th><th>BILL AMOUNT</th><th>AMOUNT PAID</th><th>DUES</th><th>BALANCE</th><th>RECEIPT DATE</th><th>ACTION</th></tr>';
		while($row = mysqli_fetch_array($query2,MYSQLI_BOTH))
		{
			$sl_no=$sl_no+1;
			//$bill_amount=$row['TUATION_FEE']+$row['COMPUTER_FEE']+$row['EXAM_FEE']+$row['HOSTAL_FEE']+$row['TRANSPORT_FEE']+$row['OTHER_FEE'];
			echo '<tr><td>'.$sl_no.'</td><td>'.$row['RECEIPT_ID'].'</td><td>'.ucwords(strtolower($row['S_NAME'])).'</td><td>'.$row['CLASS'].'</td><td>'.$row['ROLL'].'</td><td>'.$row['MONTH'].
			'</td><td>'.$row['YEAR'].'</td><td>'.$row['TOTAL_AMOUNT'].'</td><td>'.$row['PAID'].'</td><td>'.$row['DUES'].'</td><td>'.$row['BALANCE'].'</td><td>'.$row['DATE'].'</td>';
			echo '<td><a target="_blank" href="receipt.php?id='.$row['RECEIPT_ID'].'"> <input type="button" name="prnt" value="Print"/></a></td></tr>';
		}
		echo '</table>';
		
			$sql = "SELECT COUNT(ID) AS total FROM bill";
			$result = mysqli_query($conn,"SELECT COUNT(ID) AS total FROM payment");
			$row = mysqli_fetch_assoc($result);
			$total_pages = ceil($row["total"] / 20); // calculate total pages with results
			  
			for ($i=1; $i<=$total_pages; $i++) 
			{  // print links for all pages
						echo "<a href='search-bill.php?page=".$i."'";
						if ($i==$page)  echo " class='curPage'";
						echo ">".$i."</a> "; 
			}; 
		
		
		//echo '<input type ="button" value="Print" onClick='.tbl.'/>';
		//$data=mysqli_fetch_row($query);
		//echo "$data['']";
	
	}
?>
	
</div>

<div class="bot">
		<h3 style="padding:0px;margin:10px;">Copyright &copy KK Jha</h3>
	</div>
	</div>

</body>
</html>