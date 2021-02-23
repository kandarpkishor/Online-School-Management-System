<?php
include('include/header.php');
?>
<div class="temp_container">

<?php
	$class=$_REQUEST['class'];
	$query_class=mysqli_query($conn, "SELECT *FROM class WHERE CLASS='$class' AND STATUS='ACTIVE'");
	date_default_timezone_set("Asia/Kolkata");
	$date= date("Y-m-d G:i:s");
	$cont = mysqli_num_rows($query_class);
	if($cont>=1)
	{
		
		//$row = mysqli_fetch_array($query1,MYSQLI_BOTH);
		echo '<div style="height:40px; width:200px; padding:10px; margin:auto; margin-top:20px;margin-bottom:20px; background:green; color:white;">
			Class Register : '.$class.'<br>Date : '.$date.'
		
		</div>';
		echo '<table class="table" style="width:800px;">';
		echo '<form action="" method="POST">';
		echo '<th>ROLL NO</th><th>STUDENT ID</th><th>NAME</th><th>MARK ATTENDANCE</th>';
		$sid = array();
		$s_roll = array();
		$s_name = array();
		while($row = mysqli_fetch_array($query_class,MYSQLI_BOTH))
		{
			
			$sid[]=$row['S_ID'];
			$s_roll[] = $row['ROLL'];
			$s_name[] = $row['S_NAME'];
			//$sl_no=$sl_no+1;
			echo '<tr><td style="text-align:center;">'.$row['ROLL'].'</td><td>'.$row['S_ID'].'</td><td>'.ucwords(strtolower($row['S_NAME'])).'</td>';
			echo '<td><input type="checkbox" value="'.$row['S_ID'].'" name="atten[]" />Present
			&nbsp<input type="checkbox" value="'.$row['S_ID'].'" name="leave[]" id="leave_check" onClick="addLeaveRemark();"/>On Leave 
			&nbsp<input type="text" name="remark[]"  placeholder="Leave Remark" id="text_remark"  /></td></tr>';
		}
		echo '<tr><td colspan="4" style="text-align:center;"><input type="submit" name="save_attendance" value="Save Attendance" style="margin-bottom:10px;"/></td></tr>';
		echo '</form>';
			echo '</table>';
	}
	else
	{
		echo '<span class="warning" style="margintop:30px;">';
		echo "No student in class $class please add student in class.";
		echo '</span>';
	}
if(isset($_POST['save_attendance']))
{
	$leav[]='';
	$tot_leav=0;
	$attendance[]='';
	$leav_remark[]='';
	$rem[]='';
	if(isset($_POST['leave']))
	{
		$leav=$_POST['leave'];
		$tot_leav=count($leav);
		$leav_remark=$_POST['remark'];
	}
	if(isset($_POST['atten']))
	{
		$attendance=$_POST['atten'];
	}
	if(isset($_POST['leave']))
	{
		$leav_remark=$_POST['remark'];
	}
	$tot_sid=count($sid);
	$tot_present=count($attendance);
	
	$tot_aubsant=$tot_sid-($tot_present+$tot_leav);
	$aubsant=array_diff($sid,$leav,$attendance);
	//print_r($aubsant);
	$comp=array_diff($leav,$attendance);
	$comp2=array_diff($attendance,$leav);
	if(empty($comp)|| empty($comp2))
	{
		echo '<script>alert("Please Tik eighter Present or Leave")</script>';
	}
	else
	{
		//print_r(array_filter($leav_remark, function($value) { return $value !== ''; }));
		$arr_remark=(array_filter($leav_remark, function($value) { return $value !== ''; }));
		foreach($arr_remark as $arr)
		{
			$rem[]=$arr;
		}
	for($i=0;$i<$tot_present;$i++)
		{

			$sid_present=$attendance[$i];
			$select_present=mysqli_query($conn,"SELECT *FROM class WHERE S_ID='$sid_present'");
			$num_present=mysqli_num_rows($select_present);
			if($num_present!=0)
			{
				$row_present=mysqli_fetch_array($select_present,MYSQLI_BOTH);
				$sid_p=$row_present['S_ID'];
				$sname_p=$row_present['S_NAME'];
				$class_p=$row_present['CLASS'];
				$roll_p=$row_present['ROLL'];
				$insert_present=mysqli_query($conn,"INSERT INTO attendance VALUES(NULL,'$sid_p','$sname_p','$class_p','$roll_p','P','Present','$date')");
			}
		}
		for($j=0;$j<$tot_leav;$j++)
		{
			$sid_leav=$leav[$j];
			$select_leav=mysqli_query($conn,"SELECT *FROM class WHERE S_ID='$sid_leav'");
			$num_leav=mysqli_num_rows($select_leav);
			if($num_leav!=0)
			{
				$row_leav=mysqli_fetch_array($select_leav,MYSQLI_BOTH);
				$sid_p=$row_leav['S_ID'];
				$sname_p=$row_leav['S_NAME'];
				$class_p=$row_leav['CLASS'];
				$roll_p=$row_leav['ROLL'];
				$remark_l=$leav_remark[$j];
				$insert_leav=mysqli_query($conn,"INSERT INTO attendance VALUES(NULL,'$sid_p','$sname_p','$class_p','$roll_p','L','$rem[$j]','$date')");
			}
		}
		

		foreach($aubsant as $sid_aubsant)
		{
			$select_aubsant=mysqli_query($conn,"SELECT *FROM class WHERE S_ID='$sid_aubsant'");
			$num_aubsant=mysqli_num_rows($select_aubsant);
			if($num_aubsant!=0)
			{
				$row_aubsant=mysqli_fetch_array($select_aubsant,MYSQLI_BOTH);
				$sid_a=$row_aubsant['S_ID'];
				$sname_a=$row_aubsant['S_NAME'];
				$class_a=$row_aubsant['CLASS'];
				$roll_a=$row_aubsant['ROLL'];
				$insert_aubsant=mysqli_query($conn,"INSERT INTO attendance VALUES(NULL,'$sid_a','$sname_a','$class_a','$roll_a','A','Aubsant','$date')");
			}
		}
		echo '<script>alert("Attendance saved successfully")</script>';
	}
}
?>
</div>
<?php

include "include/footer.php";
?>