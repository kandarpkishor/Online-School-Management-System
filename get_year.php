<?php
$conn=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($conn,'school');
if($_POST['id'])
{
	$id=$_POST['id'];
		$query =mysqli_query($conn,"SELECT DISTINCT YEAR(TIME) AS y FROM ATTENDANCE WHERE class='$id'");
		$num=mysqli_num_rows($query);
		if($num!=0)
		{
			?><option selected="selected">Select Year :</option><?php
			while($row=mysqli_fetch_array($query,MYSQLI_BOTH))
			{
				?>
				<option value="<?php echo $row['y']; ?>"><?php echo $row['y']; ?></option>
				<?php
			}
		}
		else
		{
			?><option selected="selected">No Record Found</option><?php
		}
}
?>