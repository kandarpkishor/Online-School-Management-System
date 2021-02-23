<?php
$conn=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($conn,'school');
if($_POST['state'])
{
	$id=$_POST['state'];
	//$id='bihar';
		$query =mysqli_query($conn,"SELECT *FROM cities WHERE CITY_STATE='$id'");
		$num=mysqli_num_rows($query);
		if($num!=0)
		{
			?><option selected="selected">Select District :</option><?php
			while($row=mysqli_fetch_array($query,MYSQLI_BOTH))
			{
				?>
				<option value="<?php echo $row['CITY_NAME']; ?>"><?php echo $row['CITY_NAME']; ?></option>
				<?php
			}
		}
		else
		{
			?><option selected="selected">No Record Found</option><?php
		}
}
?>