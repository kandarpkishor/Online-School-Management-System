<?php

include "include/header.php";
?>
<div class="temp_container">
	<center>
		<div class="search_panel">
		<form action="" method="post">
			<select name="stopage" >
				<option value="">---Select Stoppage---</option>
				<?php
					$select_stopage=mysqli_query($conn,"SELECT *FROM stopage_conv");
									$cont = mysqli_num_rows($select_stopage);
									if($cont!=0)
									{
										while($row = mysqli_fetch_array($select_stopage,MYSQLI_BOTH))
										{
										?>
										<option value="<?php echo $row['STOPAGE']?>"><?php echo $row['STOPAGE'] ?></option>
								<?php
										}
									?>
										<option value="other">Other</option>
									<?php
									}
									else
									{
										echo mysqli_error($conn);
									}
				?>
				
			</select>
		<input style=" color:blue; font-size:15px;"type="submit" name="getfee" value="Get Fee Structure"/></br>
		<input style=" color:blue; margin-top:5px; font-size:15px; width:400px;"type="submit" name="newstopage" value="Add New Stoppage"/></br>
		</form>
	</div>
	</center>
	<?php
		if(isset($_POST['newstopage']))
		{
			echo '<table class="table" style="width:550px;">';
					echo '<th>Sl. No.</th><th>Stoppage</th><th>Fare</th>';
					echo '<form action="" method="POST">';
						echo' <tr>';
							echo '<td>1</td>';
							echo '<td><input type="text" name="new_stopage" placeholder="Enter Stoppage"/></td>';
							echo '<td><input type="text" name="new_amount" placeholder="Enter Amount"/></td>';
						echo '</tr>';
						echo' <tr>';
							echo '<td colspan="3" style="text-align:center;">
										<input type="submit" name="submit" value="Save Fee Structure" style="height:30px;width:200px;border-radius:5px;padding:5px;margin-top:20px;"/>
										<input type="reset" name="reset" value="Reset" style="height:30px;width:200px;border-radius:5px;padding:5px;margin-top:20px;"/>
							</td>';
						echo '</tr>';
						echo '</form>';
					echo ' </table>';
					
		}
					
					
			if(isset($_POST['submit']))
			{
				$conv_stopage=$_POST['new_stopage'];
				//echo $conv_stopage;
				$conv_amount=$_POST['new_amount'];
				//echo $conv_amount;
				$date= date("Y-m-d");
				$insert_conv_stopage=mysqli_query($conn, "INSERT INTO stopage_conv VALUES(NULL,'$conv_stopage', '$conv_amount', '$date')");
				if($insert_conv_stopage)
				{
					echo '<script type="text/javascript">alert("Data Save Successfully");</script>';
				}
				else
				{
					echo mysqli_error($conn);
				}
			}
	?>
	
	<?php
		if(isset($_POST['getfee']))
		{
			$stopage=$_POST['stopage'];
			
			$query=mysqli_query($conn,"SELECT *FROM stopage_conv WHERE STOPAGE='$stopage' ORDER BY ID DESC");
			$result=mysqli_num_rows($query);
			if($result!==0)
			{	echo '<table class="table" style="width:700px;">';
					echo'<tr><td colspan="5" style="text-align:center;">Fare Details</td></tr>';
					echo '<th>Sl. No.</th><th>Stoppage</th><th>Fare</th><th> Update On</th><th>New Fee</th>';
				
				$row=mysqli_fetch_array($query,MYSQLI_BOTH);
					echo '<form action="" method="POST">';
						echo' <tr>';
							echo '<td>1</td>';
							echo '<td>'.$row['STOPAGE'].'</td>';
							echo '<td>'.$row['FARE'].'</td>';
							echo '<td>'.$row['UPDATE_DATE'].'</td>';
							echo '<td><input type="text" name="new_fare" placeholder="New Amount"/></td>';
						echo '</tr>';
					
						echo' <tr>';
							echo '<td colspan="5" style="text-align:center;">
										<input type="submit" name="update" value="Update"/>
										<input type="reset" name="reset" value="Reset" style="height:30px;width:200px;border-radius:5px;padding:5px;margin-top:20px;"/>
										<input type="hidden" name="stopage" value="'.$stopage.'"/>
							</td>';
						echo '</tr>';
						echo '</form>';
					echo ' </table>';
					
					
				}
			
			else
			{
				echo '<table class="table" style="width:550px;">';
					echo'<tr><td colspan="3" style="text-align:center;">Set Fare For Stoppage - '.$stopage.'</td></tr>';
					echo '<th>Sl. No.</th><th>Stoppage</th><th>Fare</th>';
					echo '<form action="" method="POST">';
						echo' <tr>';
							echo '<td>1</td>';
							echo '<td>'.$Stoppage.'</td>';
							echo '<td><input type="text" name="new_fare" placeholder="New Amount"/></td>';
						echo '</tr>';
						echo' <tr>';
							echo '<td colspan="3" style="text-align:center;">
										<input type="submit" name="update" value="Save Fee Structure" style="height:30px;width:200px;border-radius:5px;padding:5px;margin-top:20px;"/>
										<input type="reset" name="reset" value="Reset" style="height:30px;width:200px;border-radius:5px;padding:5px;margin-top:20px;"/>
										<input type="hidden" name="stopage" value="'.$stopage.'"/>
							</td>';
						echo '</tr>';
						echo '</form>';
					echo ' </table>';
			}
			
		}
	
	if(isset($_POST['update']))
					{
						$new_fare=$_POST['new_fare'];
						$stopage=$_POST['stopage'];
						date_default_timezone_set("Asia/Kolkata");
						$date= date("Y-m-d G:i:s");
						$update=mysqli_query($conn, "INSERT INTO stopage_conv VALUES(NULL, '$stopage', '$new_fare')");
						if($update)
						{
							echo '<script type="text/javascript">alert("Fare Updated Successfully");</script>';
						}
						else
						{
							echo mysqli_error($conn);
						}
					}
	
	
	?>
	
</div>
<?php

include "include/footer.php";
?>