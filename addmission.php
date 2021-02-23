<?php

include "include/header.php";
?>
<script type="text/javascript" src="jquery-3.2.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
	$(".p_state").change(function()
	{
		var get_state=$(".p_state").val();
		var dataString = 'state='+ get_state;
	
		$.ajax
		({
			type: "POST",
			url: "get_city.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$(".p_dist").html(html);
			} 
		});
	});
});
$(document).ready(function()
{	
	$(".c_state").change(function()
	{
		var get_state=$(".c_state").val();
		var dataString = 'state='+ get_state;
	
		$.ajax
		({
			type: "POST",
			url: "get_city.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$(".c_dist").html(html);
			} 
		});
	});
	
});
</script>



	<script>
								function sameAs() {
							  // Get the checkbox
							  var checkBox = document.getElementById("sameas");
							  // Get the output text
							  

							  // If the checkbox is checked, display the output text
							  if (checkBox.checked == true){
								var p_add = document.getElementById("p_add").value;
								var p_dis = document.getElementById("p_dis").value;
								var p_stat = document.getElementById("p_stat").value;
								var p_pin = document.getElementById("p_pin").value;
								var p_mob = document.getElementById("p_mob").value;
								var p_mob2 = document.getElementById("p_mob2").value;
								document.getElementById("c_add").value = p_add;
								document.getElementById("c_add").disabled = true;
								document.getElementById("c_dis").value = p_dis;
								document.getElementById("c_dis").disabled = true;
								document.getElementById("c_stat").value = p_stat;
								document.getElementById("c_stat").disabled = true;
								document.getElementById("c_pin").value = p_pin;
								document.getElementById("c_pin").disabled = true;
								document.getElementById("c_mob").value = p_mob;
								document.getElementById("c_mob").disabled = true;
								document.getElementById("c_mob2").value = p_mob2;
								document.getElementById("c_mob2").disabled = true;
							  
							  
							} else {
								document.getElementById("c_add").value ='';
								document.getElementById("c_add").disabled = false;
								document.getElementById("c_dis").value ='';
								document.getElementById("c_dis").disabled =false;
								document.getElementById("c_stat").value = '';
								document.getElementById("c_stat").disabled = false;
								document.getElementById("c_pin").value = '';
								document.getElementById("c_pin").disabled = false;
								document.getElementById("c_mob").value = '';
								document.getElementById("c_mob").disabled = false;
								document.getElementById("c_mob2").value = '';
								document.getElementById("c_mob2").disabled = false;
							  
							  }
							}
							function openText() {
							  // Get the checkbox
							  var checkBox = document.getElementById("transport");
							  // Get the output text
							  var text_transport = document.getElementById("stopage_id");

							  // If the checkbox is checked, display the output text
							  if (checkBox.checked == true){
								text_transport.style.display = "inline";
								text_transport.setAttribute("required", "required");
							  } else {
								text_transport.style.display = "none";
								
							  }
							}
							function openText2() {
							  // Get the checkbox
							  var textBox = document.getElementById("stopage_id");
							  var stopage_value = document.getElementById("stopage_id").value;
							  // Get the output text
							  var text_stopage = document.getElementById("stopage_other");
							  var text_amount = document.getElementById("stopage_amount");

							  // If the checkbox is checked, display the output text
							  if (stopage_value == "other"){
								text_stopage.style.display = "inline";
								text_stopage.setAttribute("required", "required");
								
								text_amount.style.display = "inline";
								text_amount.setAttribute("required", "required");
							  } else {
								text_stopage.style.display = "none";
								text_amount.style.display = "none";
								
							  }
							}
							
							
			</script>

</head>
	
	<div class="temp_container">
	<div class="form_reg">
	<div Style="width:100%; height:70px; font-size:30px; color:blue;margin:0px; margin-top:0px; //padding:10px;"><hr> Student Admission Form<hr></div>
	<center>
				<form action="" method="POST" enctype="multipart/form-data">
					<table>
						<tr>
							<td colspan="1">Name of the pupil (in block letter) :</td>
							<td colspan="1"><input type="text" name="s_name" id="" class="" placeholder=" Enter Name" tabindex="1" required="required"/></td>
							<td colspan="1" style="//text-align:right;">Addmission Form No. 
								<input type="text" name="form_no" id="" class="" placeholder="Form No." style="width:70px;"/>
							
							</td>
							<td colspan="1">Date: <input type="date" name="doa" style="width:200px;"/></td>
						</tr>
						
						
							<td colspan="1">Date Of Birth  :</td>
							<td colspan="1"><input type="date" name="dob" id="" class="" tabindex="2" required="required"/></td>
							<td colspan="2" rowspan="6" style="text-align:center;">
								<div id="img" style="margin:auto;align:center;height:160px;width:140px;background:white;border:0px solid black;border-radius:5px;box-shadow:0 0 5px 5px grey;">
									<img id="prev" src="image/p.jpg"alt="Upload" width="140" height="160" style="border-radius:5px;" />
								</div><br>
							
								<input type="file" class="formfile" name="img" class="formfile" onchange="document.getElementById('prev').src = window.URL.createObjectURL(this.files[0])">
							</td>
						</tr>
						<tr>	
							<td>Gender</td>
							<td>
								<input type="radio" name="gender" value = "Male" tabindex="3" required="required"> Male  </input>
								<input type="radio" name="gender" value = "Female"  tabindex="3" required="required">Female </input>
							</td>
						</tr>
						<tr>
							<td>Father's Name:</td>
							<td><input type="text" name="f_name" id="" class="" placeholder=" Enter father's Name" tabindex="4" /></td>
						</tr>
						<tr>
							<td>Father's Occupation :</td>
							<td><select name="f_occu" tabindex="5" />
									<option value="">---Select Occupation--- </option>
									<option value="Govt. Job">Govt. Job</option>
									<option value="Pvt. Job">Pvt. Job</option>
									<option value="Business">Business</option>
									<option value="Agriculture">Agriculture</option>
									<option value="Daily Wases Labour">Daily Wases Labour</option>
									<option value="Unemployed">Un-Employed</option>
								</select>
							
							</td>
						</tr>
						<tr>
							<td>Mother's Name:</td>
							<td><input type="text" name="m_name" id="" class="" tabindex="6" placeholder=" Enter mother's Name"/></td>
						</tr>
						<tr>
							<td>Mother's Occupation :</td>
							<td><select name="m_occu" tabindex="7" />
									<option value="">---Select Occupation---</option>
									<option value="House Wife">House wife</option>
									<option value="Govt. Job">Govt. Job</option>
									<option value="Pvt. Job">Pvt. Job</option>
								</select>
							
							</td>
						</tr>
						<tr>
							<th colspan="2" style="text-align:center;">Permanent Address:</th>
							
							<th colspan="2" style="text-align:center;">Corresponding Address:</th>
						</tr>
						<tr>
							<td>Address</td>
							<td><input type="text" name="p_address" id="p_add" class="" tabindex="8" placeholder=" Enter Address"/ required="required"></td>
							<td>Address</td>
							<td><input type="text" name="c_address" id="c_add" class="" placeholder=" Enter Address"/ required="required"></td>
						</tr>
						
						<tr>						
							<td>State</td>
							<td><select name="p_state" class="p_state" id="p_stat" tabindex="9" required="required">
									<option value="">---Select State---</option>
									<?php
									$select_states=mysqli_query($conn,"SELECT STATE FROM states");
									$cont = mysqli_num_rows($select_states);
									if($cont!=0)
									{
										while($row = mysqli_fetch_array($select_states,MYSQLI_BOTH))
										{
										?>
										<option value="<?php echo $row['STATE']?>"><?php echo $row['STATE'] ?></option>
								<?php
										}
									}
									else
									{
										echo mysqli_error($conn);
									}
								
								?>	
							</select>
							
							</td>
							<td>State</td>
							<td><select name="c_state" class="c_state" id="c_stat" required="required">
									<option value="">---Select State---</option>
									<?php
									$select_states=mysqli_query($conn,"SELECT STATE FROM states");
									$cont = mysqli_num_rows($select_states);
									if($cont!=0)
									{
										while($row = mysqli_fetch_array($select_states,MYSQLI_BOTH))
										{
										?>
										<option value="<?php echo $row['STATE']?>"><?php echo $row['STATE'] ?></option>
								<?php
										}
									}
									else
									{
										echo mysqli_error($conn);
									}
								
								?>	
							</select>
							</td>
						</tr>
						<tr>
							<td>District</td>
							<td><select name="p_dist" class="p_dist" tabindex="10" id="p_dis" required="required">
									<option value="">---Select District---</option>
								</select>
							</td>
							<td>District</td>
							<td><select name="c_dist" class="c_dist" id="c_dis" required="required">
									<option value="">---Select District---</option>
								</select>
							</td>
						</tr>
						<tr>						
							<td>PIN</td>
							<td><input type="text" name="p_pin" id="p_pin" class="" tabindex="11" placeholder=" Enter PIN" required="required"/></td>
							</td>
							<td>PIN</td>
							<td><input type="text" name="c_pin" id="c_pin" class="" placeholder=" Enter PIN" required="required"/></td>
						</tr>
						<tr>
							<td>Contact No.:</td>
							<td><input type="text" name="p_tel1" id="p_mob" class="" tabindex="12" placeholder="Contact No." required="required"/></td>
							<td>Contact No.:</td>
							<td><input type="text" name="c_tel1" id="c_mob" class=""  placeholder="Contact No." required="required"/></td>
						</tr>
						<tr>
							<td>Alt. Contact No :</td>
							<td><input type="text" name="p_tel2" id="p_mob2" class="" tabindex="13" placeholder="Alt. Contact No."/></td>
							<td>Alt. Contact No :</td>
							<td><input type="text" name="c_tel2" id="c_mob2" class="" placeholder="Alt. Contact No."/></td>
						</tr>
						<tr>
							<td colspan="2">Corresponding Address same as Permanent Address?&nbsp &nbsp
							<input type="checkBox" name="same" tabindex="14" id="sameas" onclick="sameAs();"></td>
						</tr>
						<tr>
							<td colspan="1">E-mail</td>
							<td colspan="3"><input type="email" class="formtext" name="email" placeholder="abc@example.com" tabindex="15" style="width:750px;"/></td>
						</tr>
						<tr>
							<td colspan="1">Religion:</td>
							<td colspan="1"><select name="religion" tabindex="16" />
									<option value="">---Select Religion---</option>
									<option value="Hinduism">Hinduism</option>
									<option value="Islam">Islam</option>
									<option value="Buddhism">Buddhism</option>
									<option value="Sikhism">Sikhism</option>
									<option value="Jainism">Jainism</option>
									<option value="Christianity">Christianity</option>
								</select>
							<td>Category</td>
							<td><select name="cast" class="" id="" tabindex="17">
									<option value=""> ---Select Category---</option>
									<option value="SC"> SC </option>
									<option value="ST"> ST </option>
									<option value="BC"> BC </option>
									<option value="OBC"> OBC </option>
									<option value="General"> General </option>
									<option value="Other"> Other </option>
								</select>
							</td>
						
						
						
							
						</tr>
						<tr>
							<td>Whether the condidate belong to PH</td>
							<td><input type="radio" name="ph" class="" id="" tabindex="18" value="Yes" required="required">Yes</input>
								<input type="radio" name="ph" class="" id="" tabindex="18" value="No" required="required">No</input>
							</td>
							
						</tr>
						<tr>
							<td colspan="1">Name Of the School last attended:</td>
							<td colspan="1"><input type="text" name="lastschool" id="" tabindex="19" class="" placeholder=" Enter Name"/></td>
							<td colspan="1">Transfer Certificate Number:</td>
							<td colspan="1"><input type="text" name="tc_no" id="" tabindex="19" class="" placeholder=" Enter Number"/></td>
						</tr>
						<tr>
							<td>Class in which the pupil last studied:</td>
							<td>
								<select name="last_class" class="" id="" tabindex="20">
									<option value="">---Select Class---</option>
									<option value="Nursery">Nursery</option>
									<option value="LKG">LKG</option>
									<option value="UKG">UKG</option>
									<option value="I">One</option>
									<option value="II">Two</option>
									<option value="III">Three</option>
									<option value="IV">Fourth</option>
									<option value="V">Fifth</option>
									<option value="VI">Sixth</option>
									<option value="VII">Seventh</option>
									<option value="VIII">Eighth</option>
									<option value="IX">Ninth</option>
									<option value="X">Tenth</option>
								</select>
							</td>
							<td>Class to which promoted:</td>
							<td>
								<select name="pramot_class" class="" id="" tabindex="21" required="required">
									<option value="">---Select Class---</option>
									<option value="Nursery">Nursery</option>
									<option value="LKG">LKG</option>
									<option value="UKG">UKG</option>
									<option value="I">One</option>
									<option value="II">Two</option>
									<option value="III">Three</option>
									<option value="IV">Fourth</option>
									<option value="V">Fifth</option>
									<option value="VI">Sixth</option>
									<option value="VII">Seventh</option>
									<option value="VIII">Eighth</option>
									<option value="IX">Ninth</option>
									<option value="X">Tenth</option>
								</select>
							
							
							</td>
						</tr>
						<tr>
							<td>Class to which admission is sought:</td>
							<td>
								<select name="sought_class" class="" id="" tabindex="22" required="required">
									<option value="">---Select Class---</option>
									<option value="Nursery">Nursery</option>
									<option value="LKG">LKG</option>
									<option value="UKG">UKG</option>
									<option value="I">One</option>
									<option value="II">Two</option>
									<option value="III">Three</option>
									<option value="IV">Fourth</option>
									<option value="V">Fifth</option>
									<option value="VI">Sixth</option>
									<option value="VII">Seventh</option>
									<option value="VIII">Eighth</option>
									<option value="IX">Ninth</option>
									<option value="X">Tenth</option>
								</select>
							
							</td>
							<td>Optional Subject(only for class IX) :</td>
							<td><input type="text" name="optional_sub" id="" class="" tabindex="23" placeholder=" Enter Name"/></td>
						</tr>
						<tr>
							<td>Facility</td>
							<td><input type="radio" name="facility" class="" tabindex="24"  id="school_conv" value="Hostel" onClick="openText();">Hostel</input>
								<input type="radio" name="facility" class="" tabindex="24"  id="transport" value="Transport" onClick="openText();">Transport</input>
								<input type="radio" name="facility" class="" tabindex="24"  id="none" value="None" onClick="openText();">None</input>
							</td>
							<td colspan="2">
								
								<select name="conv_stopage" id="stopage_id" tabindex="25" style="display:none" placeholder="Stoppage optad for " onChange="openText2();">
									<option value="">---Select Stoppage---</option> 
								<?php
									$select_stopage=mysqli_query($conn,"SELECT STOPAGE FROM stopage_conv");
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
								</SELECT>
								
								
								
								
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
								<input type="text" name="stopage_other" tabindex="26" id="stopage_other" style="display:none" placeholder="Enter Nearest Stoppage"/>
							</td>
							<td>
								<input type="text" name="stopage_amount" tabindex="27" id="stopage_amount" style="display:none" placeholder="Enter Amount"/>
							</td>
							<td></td>
						
						</tr>
						<tr>
							<td colspan="4" style="text-align:center;">
								<input type="submit" name="submit" id="submit" tabindex="28" value="Submit"/>
								<input type="reset" name="reset" id="reset" value="Cancle"/>
							</td>
						</tr>
						
		
		
		
		
		
		
		
		
		
		
		
					</table>
				</form>
</center>
	</div>
</div>

<?php

if (isset($_POST['submit']))
{
	if (empty($_POST['s_name']))
		{
			echo "Please fill all Field";
			//header("location:generatebill.php");
		}
	else
	{
		$select_sid=mysqli_query($conn, "SELECT ID FROM student ORDER BY ID DESC ");
		$row_sid=mysqli_num_rows($select_sid);

		if($row_sid!=0)
		{
			$row=mysqli_fetch_array($select_sid,MYSQLI_BOTH);
			$row_id=$row['ID']+1;
			$formatted_value = sprintf("%04d", $row_id);
			$sid='SVV'.date('Y').$formatted_value;
			//echo $sid;
		}
		else
		{
			$formatted_value = sprintf("%04d", 1);
			//echo $row_id;
			$sid='SVV'.date('Y').$formatted_value;
		}

		
		
		
		
		
		
		$name=$_POST['s_name'];
		$form_no=$_POST['form_no'];
		$dob=$_POST['dob'];
		$gender=$_POST['gender'];
		$fname=$_POST['f_name'];
		$f_occu=$_POST['f_occu'];
		$mname=$_POST['m_name'];
		$m_occu=$_POST['m_occu'];
		$p_address=$_POST['p_address'];
		$p_dist=$_POST['p_dist'];
		$p_state=$_POST['p_state'];
		$p_pin=$_POST['p_pin'];
		$p_tel1=$_POST['p_tel1'];
		$p_tel2=$_POST['p_tel2'];
		if(isset($_POST['same']))
		{
			$c_address=$p_address;
			$c_dist=$p_dist;
			$c_state=$p_state;
			$c_pin=$p_pin;
			$c_tel1=$p_tel1;
			$c_tel2=$p_tel2;
		}
		else
		{
			$c_address=$_POST['c_address'];
			$c_dist=$_POST['c_dist'];
			$c_state=$_POST['c_state'];
			$c_pin=$_POST['c_pin'];
			$c_tel1=$_POST['c_tel1'];
			$c_tel2=$_POST['c_tel2'];
		}
		
			
		
		
		
		
		$religion=$_POST['religion'];
		$cast=$_POST['cast'];
		$ph=$_POST['ph'];
		$lastschool=$_POST['lastschool'];
		$tc_no=$_POST['tc_no'];
		$last_class=$_POST['last_class'];
		$pramot_class=$_POST['pramot_class'];
		$sought_class=$_POST['sought_class'];
		$optional_sub=$_POST['optional_sub'];
		
		
				
		$email=$_POST['email'];
		$doa=$_POST['doa'];
		$status="";
		//$sid="SVV". rand_number_generator(10);
		
		
		
		//$sid='SVV1234567890';
		
		
		
		$facility=$_POST['facility'];
		if($facility=='Transport')
		{
			
			$conv_stopage=$_POST['conv_stopage'];
			if($conv_stopage!="other")
			{
				$insert_transport=mysqli_query($conn, "INSERT INTO transport VALUES(NULL,'$sid', '$name', '$fname', '$conv_stopage')");
			}
			else
			{
				$conv_stopage=$_POST['stopage_other'];
				$conv_amount=$_POST['stopage_amount'];
				$date= date("Y-m-d");
				$insert_transport=mysqli_query($conn, "INSERT INTO transport VALUES(NULL,'$sid', '$name', '$fname', '$conv_stopage')");
				$insert_conv_stopage=mysqli_query($conn, "INSERT INTO stopage_conv VALUES(NULL,'$conv_stopage', '$conv_amount', '$date')");
			}
		}
		else if($facility=='Hostel')
		{
			$insert_hostel=mysqli_query($conn, "INSERT INTO transport VALUES(NULL,'$sid', '$name', '$fname')");
		}
		
		
		else
		{
			$conv_stopage='';
		}
		
		
		
		
		$imgData =addslashes(file_get_contents($_FILES['img']['tmp_name']));
		$imageProperties = getimageSize($_FILES['img']['tmp_name']);
		$sql = "INSERT INTO image(ID,S_ID,IMAGE,IMAGE_TYPE) VALUES(NULL,'$sid', '{$imgData}','{$imageProperties['mime']}')";
		$current_id = mysqli_query($conn,$sql);
		
		$insert=mysqli_query($conn,"INSERT INTO student VALUES (NULL,'$sid','$form_no','$name','$fname','$f_occu','$mname','$m_occu','$dob','$gender',
		'$religion','$cast','$ph','$lastschool','$tc_no','$last_class','$pramot_class','$sought_class','$optional_sub','$facility','$conv_stopage',
		'$p_address','$p_dist','$p_state','$p_pin','$p_tel1','$p_tel2','$c_address','$c_dist','$c_state','$c_pin','$c_tel1','$c_tel2','$email','','$doa')") or die (mysqli_error($conn));
		if($insert && $current_id)
		{
			//header("location:href=viestudent.php?id='.$sid.'");
			//mysqli_close($conn);
			
			//$enc= new Encryption;
			//$encdata=$enc->safe_b64encode($sid);
			$query2=mysqli_query($conn,"SELECT *FROM class WHERE CLASS='$pramot_class'");
			$num2=mysqli_num_rows($query2);
			if($num2>=0)
			{
				$roll1=$num2;
				//echo $roll1;
				//echo $roll=$roll1+1;
				$roll=$roll1+1;
				echo '<br>';
			}
			else
			{
				$roll=$roll+1;
				//echo $roll;
				echo '<br>';
			}
			//echo $roll;
				$query2=mysqli_query($conn,"INSERT INTO class VALUES(NULL,'$sid','$name','$pramot_class','$roll','$status')");
				if($query2)
				{
					echo '<script type="text/javascript">alert("Student ID : '.$sid.' Added in class '.$pramot_class.' Successfully");</script>';
					//echo '<meta content="0;add_class.php" http-equiv="refresh" />';
				}
				else
				{
					mysqli_error($conn);
				}
			//echo 'sucess';
			//echo '<script>alert("Student Added Successfully.");</script>';
			
		
		}
		else 
		{
			echo 'Failed To Insert Data';
			echo mysqli_error($conn);
		}
		
	}
	

	
	
	
}
?>

<?php

include "include/footer.php";
?>

