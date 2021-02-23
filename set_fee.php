<?php

include "include/header.php";
?>
<div class="temp_container">
	<center>
		<div class="search_panel">
		<form action="" method="post">
			<select name="class" >
				<option value="">---Select Class---</option>
				<option value="Nursery">Nursery</option>
				<option value="LKG">LKG</option>
				<option value="UKG">UKG</option>
				<option value="I">One</option>
				<option value="II">Two</option>
				<option value="III">Three</option>
				<option value="IV">Four</option>
				<option value="V">Five</option>
				<option value="VI">Six</option>
				<option value="VII">Seven</option>
				<option value="VIII">Eight</option>
				<option value="IX">Nine</option>
				<option value="X">Ten</option>
			</select>
		<input style=" color:blue; font-size:15px;"type="submit" name="getfee" value="Get Fee Structure"/></br>
		</form>
	</div>
	</center>
	<?php
		if(isset($_POST['getfee']))
		{
			$class=$_POST['class'];
			
			$query=mysqli_query($conn,"SELECT *FROM fee WHERE class='$class' ORDER BY ID DESC");
			$result=mysqli_num_rows($query);
			if($result!==0)
			{	echo '<table class="table" style="width:700px;">';
					echo'<tr><td colspan="5" style="text-align:center;">Class - '.$class.'</td></tr>';
					echo '<th>Sl. No.</th><th>Particular</th><th>Fee</th><th>Update On</th><th>New Fee</th>';
				
				$row=mysqli_fetch_array($query,MYSQLI_BOTH);
					echo '<form action="" method="POST">';
						echo' <tr>';
							echo '<td>1</td>';
							echo '<td>Tuition Fee</td>';
							echo '<td>'.$row['TUT_FEE'].'</td>';
							echo '<td>'.$row['UPDATE_DATE'].'</td>';
							echo '<td><input type="text" name="new_tut" placeholder="New Amount"/></td>';
						echo '</tr>';
						echo' <tr>';
							echo '<td>2</td>';
							echo '<td>Hostel Fee</td>';
							echo '<td>'.$row['HOSTEL_FEE'].'</td>';
							echo '<td>'.$row['UPDATE_DATE'].'</td>';
							echo '<td><input type="text" name="new_host" placeholder="New Amount"/></td>';
						echo '</tr>';
						echo' <tr>';
							echo '<td>3</td>';
							echo '<td>Transport Fee</td>';
							echo '<td>'.$row['TRANS_FEE'].'</td>';
							echo '<td>'.$row['UPDATE_DATE'].'</td>';
							echo '<td><input type="text" name="new_trans" placeholder="New Amount"/></td>';
						echo '</tr>';
							/*echo' <tr>';
							echo '<td>4</td>';
							echo '<td>Development Fee</td>';
							echo '<td>'.$row['DEV_FEE'].'</td>';
							echo '<td>'.$row['UPDATE_DATE'].'</td>';
							echo '<td><input type="text" name="new_dev" placeholder="New Amount"/></td>';
						echo '</tr>';*/
						echo' <tr>';
							echo '<td>4</td>';
							echo '<td>Computer Fee</td>';
							echo '<td>'.$row['COMPUTER_FEE'].'</td>';
							echo '<td>'.$row['UPDATE_DATE'].'</td>';
							echo '<td><input type="text" name="new_copm" placeholder="New Amount"/></td>';
						echo '</tr>';
						/*echo' <tr>';
							echo '<td>5</td>';
							echo '<td>Other Fee</td>';
							echo '<td>'.$row['OTHER'].'</td>';
							echo '<td>'.$row['UPDATE_DATE'].'</td>';
							echo '<td><input type="text" name="new_oth" placeholder="New Amount"/></td>';
						echo '</tr>';*/
						echo' <tr>';
							echo '<td colspan="5" style="text-align:center;">
										<input type="submit" name="update" value="Update"/>
										<input type="reset" name="reset" value="Reset" style="height:30px;width:200px;border-radius:5px;padding:5px;margin-top:20px;"/>
										<input type="hidden" name="class" value="'.$class.'"/>
							</td>';
						echo '</tr>';
						echo '</form>';
					echo ' </table>';
					
					
				}
			
			else
			{
				echo '<table class="table" style="width:550px;">';
					echo'<tr><td colspan="3" style="text-align:center;">Set Fee Structure For Class - '.$class.'</td></tr>';
					echo '<th>Sl. No.</th><th>Particular</th><th>Fee</th>';
					echo '<form action="" method="POST">';
						echo' <tr>';
							echo '<td>1</td>';
							echo '<td>Tuition Fee</td>';
							echo '<td><input type="text" name="new_tut" placeholder="New Amount"/></td>';
						echo '</tr>';
						echo' <tr>';
							echo '<td>2</td>';
							echo '<td>Hostel Fee</td>';
							echo '<td><input type="text" name="new_host" placeholder="New Amount"/></td>';
						echo '</tr>';
						echo' <tr>';
							echo '<td>3</td>';
							echo '<td>Transport Fee</td>';
							echo '<td><input type="text" name="new_trans" placeholder="New Amount"/></td>';
						echo '</tr>';
							/*echo' <tr>';
							echo '<td>4</td>';
							echo '<td>Development Fee</td>';
							echo '<td>'.$row['DEV_FEE'].'</td>';
							echo '<td>'.$row['UPDATE_DATE'].'</td>';
							echo '<td><input type="text" name="new_dev" placeholder="New Amount"/></td>';
						echo '</tr>';*/
						echo' <tr>';
							echo '<td>4</td>';
							echo '<td>Computer Fee</td>';
							echo '<td><input type="text" name="new_copm" placeholder="New Amount"/></td>';
						echo '</tr>';
						/*echo' <tr>';
							echo '<td>5</td>';
							echo '<td>Other Fee</td>';
							echo '<td>'.$row['OTHER'].'</td>';
							echo '<td>'.$row['UPDATE_DATE'].'</td>';
							echo '<td><input type="text" name="new_oth" placeholder="New Amount"/></td>';
						echo '</tr>';*/
						echo' <tr>';
							echo '<td colspan="3" style="text-align:center;">
										<input type="submit" name="update" value="Save Fee Structure" style="height:30px;width:200px;border-radius:5px;padding:5px;margin-top:20px;"/>
										<input type="reset" name="reset" value="Reset" style="height:30px;width:200px;border-radius:5px;padding:5px;margin-top:20px;"/>
										<input type="hidden" name="class" value="'.$class.'"/>
							</td>';
						echo '</tr>';
						echo '</form>';
					echo ' </table>';
			}
			
		}
	
	if(isset($_POST['update']))
					{
						$new_copm=$_POST['new_copm'];
						$new_trans=$_POST['new_trans'];
						$new_host=$_POST['new_host'];
						$new_tut=$_POST['new_tut'];
						$class=$_POST['class'];
						date_default_timezone_set("Asia/Kolkata");
						$date= date("Y-m-d G:i:s");
						$update=mysqli_query($conn, "INSERT INTO fee VALUES(NULL, '$class', '$new_tut', '$new_host', '$new_trans', '$new_copm', '$date')");
						if($update)
						{
							echo '<script type="text/javascript">alert("Fee Structure Save Successfully");</script>';
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