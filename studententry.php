<?php
include('connection/session.php');
include('connection/connection.php');
include('include/number_generator.php');
require('encode.php');
if(!isset($login_session))
{
    location:index.php;
    exit;
}
?>
<html>
<title>
	Online School Management Software 
</title>
<head>
	 <meta name="viewport" content="width=device-width, initial-scale=0.5">
	<link rel="stylesheet" href="css/menu.css" type="text/css"/>
	<link rel="stylesheet" href="css/style.css" type="text/css"/>
	<link rel="stylesheet" href="css/form.css" type="text/css"/>
	<script src="jquery-3.2.1.min.js"></script> 
	<style>
	</style>
	<script>
function openNav() {
    $("#showleftmenu").css({"width":"15%","z-index":"10000","opacity":"1","float":"left" });
	$("table").css({"width":"70%","margin":"auto","margin-top":"60px","Padding":"10px", "transition": "0.5s" });
}

function closeNav() {
    $("#showleftmenu").css({"width":"0"})
	$("table").css({"width":"70%", "margin":"auto","margin-top":"60px","transition": "0.5s"});
}
</script>
	<script>
	$(function(){
        // Check the initial Poistion of the Sticky Header
        var stickyHeaderTop = $('.menu').offset().top;
 
        $(window).scroll(function(){
                if( $(window).scrollTop() > stickyHeaderTop ) {
                        $('.menu').css({"position":"fixed", "top": "0px","z-index":"1000", "opacity":"0.7"});
                } else {
                        $('.menu').css({position: 'static', top: '0px', "opacity":"1"});
                }
        });
  });
	
	
	</script>

</head>

<body>
<div class="main">

	<div class="header_cont">
	<div class="header">
		<h1> ONLINE SCHOOL MANAGEMENT SYSTEM</h1>
	</div>
	<div class="profile">
		<div style="width:100%; height:100%;">
			<div style="width:75px; height:75px; border:2px solid white; border-radius:75px; margin:auto;opacity:1;">
			 <!--<img src="image/profile.jpg" alt="Profile.jpg" style="width:75px; height:75px;border-radius:75px;">/-->
			 <?php
			  echo '<img src="data:image/jpeg;base64,'.base64_encode($login_user_image).'" height="75px" width="75px" style="border-radius:75px"/>
			 </img>';
			 ?>
			</div>
			<a href="profile.php"><?php echo $login_user_name ?></a> <br>
			<a href="connection/logout.php">Logout</a>
		</div>
	</div>
</div>

	<div class="menu">

		<ul>
			<li>
			<a href="home.php">Home</a>
			</li>
		</ul>
		<ul>
			<li >
			<a style="background-color: lightgreen;color:red;" href="">Student Management</a>
			<ul>
				<li><a href ="studententry.php" style="background:lightgreen;color:red;">Add Student</a></li>
				<li><a href="studentview.php">View Student</a></li>
				<li><a href="viewreg.php">Student Registration Card</a></li>
				<li><a href="students.php">Student Contact Detail</a></li>
			</ul>
			</li>
		</ul>
		<ul>
			<li><a href="">Class Management</a>
			<ul>
			<li><a href ="add_class.php">Add Student in Class</a></li>
			<li><a href="viewstudent.php">View Class Register</a></li>
			<li><a href="viewreg.php">Student Id Card</a></li>
			</ul>
			</li>
		</ul>
		<ul>
			<li><a href="">Fee Management</a>
			<ul>
			<li><a href="generatebill.php">Generate Student Bill</a></li>
			<li><a href="#">Take Payment</a></li>
			<li><a href="#">Generate Fee Receipt</a></li>
			<li><a href="#">View All Payment</a></li>
			<li><a href="#">View Dues</a></li>
			<li><a href="#">Print Bill</a></li>
			</ul>
			</li>
		</ul>
		
		<ul>
			<li><a href="">Feculty</a>
			<ul>
			<li><a href="#">Add Feculty</a></li>
			<li><a href="#">View Faculty</a></li>
			<li><a href="#">Generate Sallery Slip</a></li>
			<li><a href="#">View Payment</a></li>
			</ul>
			</li>
		</ul>
		
		<ul>
			<li><a href="">Report</a>
			<ul>
			<li><a href="#">Admission</a></li>
			<li><a href="#">Payment</a></li>
			<li><a href="#">Student Dues</a></li>
			<li><a href="#">Sallery</a></li>
			<li><a href="#">sallery Dues</a></li>
			</ul>
			</li>
		</ul>
		<ul> 
		<li><a href="">Print</a>
			<ul>
			<li><a href="bill.php">Student Fee Detail</a></li>
			<li><a href="#">Sallery Slip</a></li>
			<li><a href="#">Marksheet</a></li>
			<li><a href="#">Student Detail</a></li>
			<li><a href="#">Student Identity Card</a></li>
			</ul>
		</li>
		</ul>
	


</div>





<!--<div class="left">
		<div Style="float:left; height:40px; width:100%;background:grey;color:white; margin:0px; padding:0px; font-style:italic;opacity:0.8;">
		<h1 style="padding:0px;margin:0px;font-style:normal;">&#9776;&vellip;</h1>
		</div>

</div>/-->
<div class="temp_container">
	<!--<div id="open" Style="float:left; height:40px; width:5%;background:grey;color:white; margin:0px; padding:0px;text-align:left;">
		<h1   style="padding:0px;margin:0px;text-align:left;"><a style="color:white;text-decoration: none;"  href="javascript:void(0)" onclick="openNav()">&#9776;&vellip;</a>
	</div>
	<div Style="float:left; height:40px; width:95%;background:grey;color:white; margin:0px; padding:0px;text-align:center;">
		<h1 style="padding:0px;margin:0px;text-align:center;">Student Detail</h1>
	</div>
	<div id="showleftmenu" class="sidenav" style="border:1px solid lightcyan;">
	  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
				<a href ="studententry.php" style="background:lightgreen;color:red;">Add Student</a>
				<a href="studentview.php">View Student</a>
				<a href="viewreg.php">Student Registration Card</a>
				<a href="students.php">Student Contact Detail</a>
	</div>/-->
	<div style="text-align:center; background:green; width:80%;height:70%;//border:2px solid red;z-index:1;margin:auto;margin-top:50px; 
	//padding:auto;opacity:1;border-radius:10px; box-shadow:0 0 10px 10px grey;">
<center>
<span style="color:white; font-size:25px;position:relative;top:20px;"><hr>
Student Registration Form  <hr></span>
<form action="" method="POST" enctype="multipart/form-data" class="formdata">
	<table class="form" style="margin-top:0px; position:relative;top:10px;">
	<tr>
		<td>
			Enter Student Name
		</td>
		
		<td>
			<input type="text" class="formtext" name="sname" placeholder="Student Name" required="required"/>
		</td>
		<td colspan="2" rowspan="4" style="text-align:center;">
			<div id="img" style="margin:auto;align:center;height:160px;width:140px;background:white;border:0px solid black;border-radius:5px;box-shadow:0 0 5px 5px grey;">
				<img id="prev" src="image/p.jpg"alt="Upload" width="140" height="160" style="border-radius:5px;" />
		</div><br>
		
		<input type="file" class="formfile" name="img" class="formfile" onchange="document.getElementById('prev').src = window.URL.createObjectURL(this.files[0])" required="required">
		</td>
	</tr>
		<td>
			Enter Father's Name 
		</td>
		<td>
			<input type="text" class="formtext" name="fname" placeholder="Enter Father's Name" required="required"/>
		</td>
	</tr>
	<tr>
		<td>
			Enter Mothers's Name
		</td>
		<td>
			<input type="text"  class="formtext" name="mname" placeholder="Enter Mother's Name" required="required"/>
		</td>
		
	</tr>
	<tr>
		<td>
			Date Of Birth
		</td>
		<td>
			<input type="date" class="formtext" name="dob" placeholder="Date Of Birth" required="required"/>
		</td>
	</tr>
	<tr>
		<td>
			Gender
		</td>
		<td>
			<input type="radio" name="gender" value = "Male" required="required"> Male  </input>
			<input type="radio" name="gender" value = "Female" required="required">Female </input>
		</td>
		<td>
			Cast Categories
		</td>
		<td>
			<select name="cast" class="formselect" required="required">
				<option value="">Select Cast</option>
				<option value="General">General</option>
				<option value="SC">SC</option>
				<option value="ST">ST</option>
				<option value="OBC">OBC</option>
				<option value="BC">BC</option>
				<option value="BC-I">BC-I</option>
				<option value="BC-II">BC-II</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>
			Mobile 
		</td>
		<td>
			<input type="text" class="formtext" maxlength="10" name="mob" placeholder="Mobile No." required="required"/>
		</td>
		<td>
			Email
		</td>
		<td>
			<input type="email" class="formtext" name="email" placeholder="abc@example.com" required="required"/>
		</td>
	</tr>
	<tr>
		<td rowspan="2">
			Address
		</td>
		<td rowspan="2">
			<textarea name="addr" placeholder="Enter Address"style="width:250px;height:100px;">
			</textarea>
		</td>
		<td>
			Select State
		</td>
		<td>
			<select name="state" class="formselect" required="required">
				<option value="">Select State</option>
				<option value="Bihar">Bihar</option>
				<option value="Jharkhand">Jharkhand</option>
				<option value="Uttarpradesh">Uttarpradesh</option>
				<option value="Maharastra">Maharastra</option>
				<option value="Paschim Bangal">Paschim Bangal</option>
				<option value="Chattishgarh">Chattishgarh</option>
				<option value="Madhyapradesh">Madhyapradesh</option>
				<option value="Punjab">Punjab</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>
			Select District
		</td>
		
		<td>
			<select name="dist" class="formselect" required="required">
				<option value="">Select District</option>
				<option value="Saharsa">Saharsa</option>
				<option value="Supaul">Supaul</option>
				<option value="Madhepura">Madhepura</option>
				<option value="Purnea">Purnea</option>
				<option value="Katihar">Katihar</option>
				<option value="Kisangang">Kisangang</option>
				<option value="Arariya">Arariya</option>
				<option value="Darbhanga">Darbhanga</option>
				<option value="Samastipur">Samastipur</option>
				<option value="Muzaffarpur">Muzaffarpur</option>
				<option value="Sitamadhi">Sitamadhi</option>
				<option value="Patna">Patna</option>
			</select>
		</td>
	</tr>
	<tr>
	</tr>
	<tr>
		<td>
			PIN
		</td>
		<td>
			<input type="text" class="formtext" name="pin" maxlength="6" required="required"/>
		</td>
		<td>
			Date Of Addmission 
		</td>
		<td>
			<input type="date" class="formtext" name="doa" placeholder="Choose Date" required="required"/>
		</td>
	</tr>
	<tr>
		<td colspan="4" style="text-align:center;">
			<input type="submit" class="formsubmit" name="submit" value="Submit"/>&nbsp&nbsp
			<input type="reset" class="formsubmit" name ="cancel" value="Cancel"/>
		</td>
	</tr>
	</table>
</form>
<hr>


</center>
</div>
<?php
if (isset($_POST['submit']))
{
	if (empty($_POST['sname']))
		{
			echo "Please fill all Field";
			//header("location:generatebill.php");
		}
	else
	{
		$name=$_POST['sname'];
		$fname=$_POST['fname'];
		$mname=$_POST['mname'];
		$dob=$_POST['dob'];
		$gender=$_POST['gender'];
		$cast=$_POST['cast'];
		$mob=$_POST['mob'];
		$email=$_POST['email'];
		$addr=$_POST['addr'];
		$state=$_POST['state'];
		$dist=$_POST['dist'];
		$pin=$_POST['pin'];
		$doa=$_POST['doa'];
		$status="";
		$sid="SVV". rand_number_generator(10);
		
		
		$imgData =addslashes(file_get_contents($_FILES['img']['tmp_name']));
		$imageProperties = getimageSize($_FILES['img']['tmp_name']);
		$sql = "INSERT INTO image(ID,S_ID,IMAGE,IMAGE_TYPE) VALUES(NULL,'$sid', '{$imgData}','{$imageProperties['mime']}')";
		$current_id = mysqli_query($conn,$sql);		
		
		$insert=mysqli_query($conn,"INSERT INTO student VALUES (NULL,'$sid','$name','$fname','$mname','$dob','$gender','$cast','$mob','$email','$doa','$addr','$dist','$state','$pin')") or die (mysqli_error($conn));
		if($insert && $current_id)
		{
			//header("location:href=viestudent.php?id='.$sid.'");
			//mysqli_close($conn);
			
			$enc= new Encryption;
			$encdata=$enc->safe_b64encode($sid);
			echo '<meta content="0;view.php?id='.$encdata.'" http-equiv="refresh" />';
		
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
	//echo $err;
?>


<!-- image upload code /-->

	
	
</div>
<div class="bot">
	<h3 style="padding:0px;margin:10px; text-align:center;">Copyright &copy KK Jha</h3>
</div>
</div>
</body>
</html>