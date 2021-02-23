<?php
$conn=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($conn,'school');
if($_POST['state'])
{
	$id=$_POST['state'];
	//$id='bihar';
		$query =mysqli_query($conn,"SELECT *FROM pincode WHERE PINCODE='$id'");
		$num=mysqli_num_rows($query);
		if($num!=0)
		{
			while($row=mysqli_fetch_array($query,MYSQLI_BOTH))
			{
				?>
				<option value="<?php echo $row['STATE_NAME']; ?>"><?php echo $row['STATE_NAME']; ?></option>
				<?php
			}
		}
		else
		{
			?><option selected="selected">No Record Found</option><?php
		}
}
?>