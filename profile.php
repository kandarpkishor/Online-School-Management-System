<?php
include('connection/session.php');
include('connection/connection.php');
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
	<script src="jquery-3.2.1.min.js"></script> 
	<style>
	</style>
	<script>
function openNav() {
    $("#showleftmenu").css({"width":"15%","z-index":"10000","opacity":"1","float":"left" });
}

function closeNav() {
    document.getElementById("showleftmenu").style.width = "0";
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
<style>
.profdiv
{
	width:140px;
	height:160px;
	border:2px solid black;
	background:white;
	display:block;
}
.profpic
{
	display:none;
	position:relative;
	top:-50%;
	z-index:5;
	padding-top:15px;
	padding-right:3px;
	padding-left:3px;
	margin:auto;
	//margin-left:15px;
	height:40px;
	width:110px;
	//background-color:white;
}
.profpic a
{
	text-decoration:none;
	color:black;
	font-weight:bold;
	//font-size:100%;
}
.profpic a:hover
{
	text-decoration:underline;
	color:red;
	font-weight:bold;
}
.profdiv:hover>.profpic
{
	display:block;
	//opacity:0.6;
	transparent:transparent;
}

</style>
</head>

<body>
<div class="main">

<div class="header_cont">
	<div class="header">
		<h1> ONLINE SCHOOL MANAGEMENT SYSTEM</h1>
	</div>
	<div class="profile">
		<div style="width:100%; height:100%;">
			<div style="width:75px; height:75px; border:2px solid white; border-radius:75px; margin:auto;opacity:1;box-shadow:0 0 10px 10px lightgrey;">
			 <!--<img src="image/profile.jpg" alt="Profile.jpg" style="width:75px; height:75px;border-radius:75px;">/-->
			 <?php
			 if(empty($login_user_image))
				  {
					$enc= new Encryption;
					$encdata=$enc->safe_b64encode($login_session );
				  echo '<div class="profdiv" style="height:75px;width:75px;border-radius:75px;">
				  <img src="image/p.jpg" height="75px" width="75px" style="border-radius:75px"/></img>
				  <span class="profpic"><a href="profile_pic.php?user='.$login_session.'">
				  <img src="image/edit.png" alt="edit" style="position:relative;top:-25px;left:-20px;"/></span>
				  </div>';
				  }
				  else
				  {
					$enc= new Encryption;
					$encdata=$enc->safe_b64encode($login_session );
					echo '<div class="profdiv" style="height:75px;width:75px;border-radius:75px;">
					<img src="data:image/jpeg;base64,'.base64_encode($login_user_image).'" height="75px" width="75px" style="border-radius:75px"/></img>
					<span class="profpic">
					<a href="profile_pic.php?user='.$encdata.'"><img src="image/edit.png" alt="edit" style="position:relative;top:-25px;left:-20px;"/></a></span></div>';
				 } 
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
			<a background-color: lightgreen;color:red; href="home.php">Home</a>
			</li>
		</ul>
		<ul>
			<li>
			<a href="">Student Management</a>
			<ul>
				<li><a href ="studententry.php">Add Student</a></li>
				<li><a href="viewstudent.php">View Student</a></li>
				<li><a href="viewreg.php">Student Registration Card</a></li>
				<li><a href="students.php">Student Contact Detail</a></li>
			</ul>
			</li>
		</ul>
		<ul>
			<li><a href="">Class Management</a>
			<ul>
			<li><a href ="add_class.php">Add Student in Class</a></li>
			<li><a href="studentview.php">View Class Register</a></li>
			<li><a href="viewreg.php">Student Id Card</a></li>
			</ul>
			</li>
		</ul>
		<ul>
			<li><a href="">Fee Management</a>
			<ul>
			<li><a href="generatebill.php">Generate Student Bill</a></li>
			<li><a href="paymententry.php">Take Payment</a></li>
			<li><a href="">Generate Fee Receipt</a></li>
			<li><a href="payment.php">View All Payment</a></li>
			<li><a href="dues.php">View Dues</a></li>
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
		<h1 style="padding:0px;margin:0px;text-align:center;">Dash Board</h1>
	</div>
	<div id="showleftmenu" class="sidenav" style="border:1px solid lightcyan;">
	  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
	  <a href="#">About</a>
	  <a href="#">Services</a>
	  <a href="#">Clients</a>
	  <a href="#">Contact</a>
	</div>  
	<div style="width:17%;height:100%;border:2px double red;float:left;background:cyan;">
		kk jha
	</div>/-->
	<center>
	<div style="text-align:center; background:green; width:800px;height:350px;//border:2px solid red;z-index:1;margin:auto;margin-top:50px; 
	//padding:auto;opacity:1;border-radius:10px; box-shadow:0 0 10px 10px grey;">
	<?php
		$query=mysqli_query($conn2,"SELECT *FROM user_data WHERE USERNAME='$login_session'");
		$result=mysqli_fetch_array($query,MYSQLI_BOTH);
	?>
		<div style="color:white;padding:5px;width:90%;height:80%;border:2px solid red;margin:auto; position:relative;top:25px;">
		Pesonal Detail<hr><br>
			<table style="width:100%;color:white;">
				<tr><td>Name : </td><td><?php echo $result['NAME'];?></td>
				<td rowspan="6">
				
				
				  <?php
				  if(empty($login_user_image))
				  {
				  echo '<div class="profdiv">
				  <img src="image/p.jpg" class="defimg" height="160px" width="140px"></img>
				  <span class="profpic"><a href="profile_pic.php?user='.$encdata.'">
				  Upload Picture</span>
				  </div>';
				  }
				  else
				  {
					  echo '<div class="profdiv">
					 <img src="data:image/jpeg;base64,'.base64_encode($login_user_image).'" height="160px" width="140px" style="border-radius:0px"/></img>
					 <span class="profpic">
					<a href="profile_pic.php?user='.$encdata.'">Change Picture</a></span>';
				 } 
			 ?>
				
				</td></tr>
				<tr><td>Father Name : </td><td><?php echo $result['FNAME'];?></td></tr>
				<tr><td>Date Of Birth : </td><td><?php echo $result['DOB'];?></td></tr>
				<tr><td>Gender : </td><td><?php echo $result['GENDER'];?></td></tr>
				<tr><td>Mobile No. : </td><td><?php echo $result['MOBILE'];?></td></tr>
				<tr><td>E-mail : </td><td><?php echo $result['EMAIL'];?></td></tr>
			</table>
			<hr>
		</div>
	<?php
		echo mysqli_error($conn2);
	?>		
	</div>
	</center>
	<!--<div style="width:17%;height:100%;border:2px double red;float:right;background:cyan;">
		<marquee onmouseover="stop" direction="up" style="width:90%; height:40%; border:0px solid black; margin-top:50px; //margin:auto;background:white;border-radius:10px;text-align:center;">
		<span class="warning">Student Panding To add in Class:</span>
		<br>
		<?php
			$query=mysqli_query($conn,"SELECT S_NAME FROM student WHERE S_ID NOT IN (SELECT S_ID FROM class)");
			//$num=mysqli_num_rows($query);
			$i=0;
			while($result=mysqli_fetch_array($query))
			{
				echo $i+1;
				echo '.&nbsp';
				echo $result['S_NAME'];
				echo '<br>';
			}
		?>
		</marquee>
		<marquee behavior="scroll" scrollamount="2" onMouseOver="this.setAttribute('scrollamount', 0, 0);" onMouseOut="this.setAttribute('scrollamount', 2, 0);" direction="up" style="width:90%; height:40%; border:0px solid black; margin-top:50px; //margin:auto;background:white;border-radius:10px;text-align:center;">
		<span class="warning">Student Panding For Payment :</span>
		<br>
		<?php
			$query=mysqli_query($conn,"SELECT *FROM bill WHERE BILL_ID NOT IN (SELECT BILL_ID FROM payment)");
			$num=mysqli_num_rows($query);
			$totalamount=0;
			$i=1;
			while($result=mysqli_fetch_array($query))
			{	
				
				$totalamount=$result['TUATION_FEE']+$result['TRANSPORT_FEE']+$result['OTHER_FEE']+$result['PREV_DUES'];
				echo $i++;
				echo '.&nbsp';
				echo $result['S_NAME'];
				echo '&nbsp&nbsp <span class="warning"> Amount = ';
				echo $totalamount;
				echo '</span>';
				echo '<br>';
			}
			echo mysqli_error($conn);
		?>
		</marquee>
	</div>/-->

</div>


<div class="bot">
		<h3 style="padding:0px;margin:10px;">Copyright &copy KK Jha</h3>
	</div>
</div>

</body>
</html>