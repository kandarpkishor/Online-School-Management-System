<?php
include "include/header.php";
?>
<div class="temp_container">

<div class="search_panel">
	<form action="" method="POST" style="margin:auto;margin-bottom:20px;">
	<input type="text" name="studentid" placeholder="Enter Student Id" />
	<input type="submit" name="track" value= "Find Student Detail" />
	<input type="submit" name = "trackall" value="Find All Result"/>
	</form>
</div>
<?php
	//$studentid = $_POST['studentid'];
	//echo $studentid;
	$sl_no=0;
	if(isset($_POST['track']))
	{	
		
		if (empty($_POST['studentid']))
		{
			echo "Please Enter Student ID";
		}
	
		else
		{
			$studentid = $_POST['studentid'];
			$query1 = mysqli_query($conn,"SELECT *FROM student WHERE (S_ID='$studentid' OR S_NAME='$studentid') AND STATUS= 'ACTIVE' ");
			$cont = mysqli_num_rows($query1);
			if($cont>=1)
			{
				//$row = mysqli_fetch_array($query1,MYSQLI_BOTH);
				echo '<div ><table style="margin:auto;border-collapse:collapse;" class="table">';
				echo '<th></th><th>STUDENT ID</th><th>NAME</th><th>FATHER\'S NAME</th><th>MOTHER\'S NAME</th><th>DATE OF BIRTH</th><th>GENDER</th><th>CAST</th><th>MOBILE</th>
		<th>EMAIL</th><th>DATE OF ADDMISSION</th><th colspan="3">ACTION</th>';
		while($row = mysqli_fetch_array($query1,MYSQLI_BOTH))
		{
			$sl_no=$sl_no+1;
			$enc= new Encryption;
			$encdata=$enc->safe_b64encode($row['S_ID']);
			echo '<tr><td>'.$sl_no.'</td><td>'.$row['S_ID'].'</td><td>'.$row['S_NAME'].'</td><td>'.$row['F_NAME'].'</td><td>'.$row['M_NAME'].
			'</td><td>'.$row['DOB'].'</td><td>'.$row['GENDER'].'</td><td>'.$row['CAST'].'</td><td>'.$row['P_MOB1'].'</td><td>'.$row['EMAIL'].
			'</td><td>'.$row['DOA'].'</td>';
			echo '<td><a href="view.php?id='.$encdata.'" target="_blank"> <input type="button" name="prnt" value="Print"/></a>';
			echo '<td><a href="deletestudent.php?id='.$encdata.'"> <input type="button" name="prnt" value="Delete"/></a></td>';
			echo '<td><a href=update_detail.php?id='.$encdata.'> <input type="button" name="edit" value="Edit"/></a></td></tr>';
		}
				echo '</table></div>';
			  
			
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
		$sl_no=($page-1)*20;
		
		
		$query2 = mysqli_query($conn,"SELECT *FROM student WHERE STATUS= 'ACTIVE' LIMIT $search_from, 20");
		//$row = mysqli_fetch_array($query1,MYSQLI_BOTH);
		echo '<table style="margin:auto;" class="table">';
		echo '<th></th><th>STUDENT ID</th><th>NAME</th><th>FATHER\'S NAME</th><th>MOTHER\'S NAME</th><th>DATE OF BIRTH</th><th>GENDER</th><th>CAST</th><th>MOBILE</th>
		<th>EMAIL</th><th>DATE OF ADDMISSION</th><th colspan="3">ACTION</th>';
		while($row = mysqli_fetch_array($query2,MYSQLI_BOTH))
		{
			$sl_no=$sl_no+1;
			$enc= new Encryption;
			$encdata=$enc->safe_b64encode($row['S_ID']);
			echo '<tr><td>'.$sl_no.'</td><td>'.$row['S_ID'].'</td><td>'.$row['S_NAME'].'</td><td>'.$row['F_NAME'].'</td><td>'.$row['M_NAME'].
			'</td><td>'.$row['DOB'].'</td><td>'.$row['GENDER'].'</td><td>'.$row['CAST'].'</td><td>'.$row['P_MOB1'].'</td><td>'.$row['EMAIL'].
			'</td><td>'.$row['DOA'].'</td>';
			echo '<td><a href="view.php?id='.$encdata.'" target="_blank"> <input type="button" name="prnt" value="Print"/></a>';
			echo '<td><a href="deletestudent.php?id='.$encdata.'"> <input type="button" name="prnt" value="Delete"/></a></td>';
			echo '<td><a href=update_detail.php?id='.$encdata.'> <input type="button" name="edit" value="Edit"/></a></td></tr>';
		}
		echo '</table>';
		$result = mysqli_query($conn,"SELECT COUNT(ID) AS total FROM student");
			$tot = mysqli_fetch_assoc($result);
			$total_pages = ceil($tot["total"] / 20); // calculate total pages with results
		for ($i=1; $i<=$total_pages; $i++) 
			{  // print links for all pages
						echo "<a href='studentview.php?page=".$i."'";
						if ($i==$page)  echo " class='curPage'";
						echo ">".$i."</a> "; 
			};
		//echo '<input type ="button" value="Print" onClick="printDiv('tbl')"/>';
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
		$sl_no=($page-1)*20;
	
		$query2 = mysqli_query($conn,"SELECT *FROM student WHERE STATUS= 'ACTIVE' LIMIT $search_from, 20");
		//$row = mysqli_fetch_array($query1,MYSQLI_BOTH);
		echo '<table style="margin:auto;" class="table">';
		echo '<th></th><th>STUDENT ID</th><th>NAME</th><th>FATHER\'S NAME</th><th>MOTHER\'S NAME</th><th>DATE OF BIRTH</th><th>GENDER</th><th>CAST</th><th>MOBILE</th>
		<th>EMAIL</th><th>DATE OF ADDMISSION</th><th colspan="3">ACTION</th>';
		while($row = mysqli_fetch_array($query2,MYSQLI_BOTH))
		{
			$sl_no=$sl_no+1;
			$enc= new Encryption;
			$encdata=$enc->safe_b64encode($row['S_ID']);
			echo '<tr><td>'.$sl_no.'</td><td>'.$row['S_ID'].'</td><td>'.$row['S_NAME'].'</td><td>'.$row['F_NAME'].'</td><td>'.$row['M_NAME'].
			'</td><td>'.$row['DOB'].'</td><td>'.$row['GENDER'].'</td><td>'.$row['CAST'].'</td><td>'.$row['P_MOB1'].'</td><td>'.$row['EMAIL'].
			'</td><td>'.$row['DOA'].'</td>';
			echo '<td><a href="view.php?id='.$encdata.'" target="_blank"> <input type="button" name="prnt" value="Print"/></a>';
			echo '<td><a href="deletestudent.php?id='.$encdata.'"> <input type="button" name="prnt" value="Delete"/></a></td>';
			echo '<td><a href=update_detail.php?id='.$encdata.'> <input type="button" name="edit" value="Edit"/></a></td></tr>';
		}
		echo '</table>';
		$result = mysqli_query($conn,"SELECT COUNT(ID) AS total FROM student");
			$tot = mysqli_fetch_assoc($result);
			$total_pages = ceil($tot["total"] / 20); // calculate total pages with results
		for ($i=1; $i<=$total_pages; $i++) 
			{  // print links for all pages
						echo "<a href='studentview.php?page=".$i."'";
						if ($i==$page)  echo " class='curPage'";
						echo ">".$i."</a> "; 
			};
		//echo '<input type ="button" value="Print" onClick="printDiv('tbl')"/>';
		//$data=mysqli_fetch_row($query);
		//echo "$data['']";
	
	}
	
?>
<?php
include "include/footer.php";
?>