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
	position:relative;
	top:50px;
	display:block;
	margin:auto;
}
.profpic{
	height:30px;
	width:100%;
	display:none;
}
.profdiv:hover>.profpic
{
	display:block;
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
			<div style="width:75px; height:75px; border:2px solid white; border-radius:75px; margin:auto;opacity:1;box-shadow:0 0 5px 5px grey;">
			 <!--<img src="image/profile.jpg" alt="Profile.jpg" style="width:75px; height:75px;border-radius:75px;">/-->
			 <?php
			 if(empty($login_user_image))
			 {
				 echo '<img src="image/p.jpg" height="75px" width="75px" style="border-radius:75px"/>
			 </img>';
			 }
			 else
			 {
			  echo '<img src="data:image/jpeg;base64,'.base64_encode($login_user_image).'" height="75px" width="75px" style="border-radius:75px"/>
			 </img>';
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
	<div class="profdiv">
	<?php
		$encdata=$_REQUEST['user'];
		$enc=new Encryption;
		$username=$enc->safe_b64decode($encdata);
		if(empty($username)||$username!==$login_session)
		{
			//header("location:profile.php");
			
		}
		else
		{	
		if(count($_FILES) > 0) 
		{
			if(is_uploaded_file($_FILES['img']['tmp_name'])) 
			{
				//$sid=$_REQUEST['id'];
				$imgData =addslashes(file_get_contents($_FILES['img']['tmp_name']));
				$imageProperties = getimageSize($_FILES['img']['tmp_name']);
				$connect = mysqli_connect("localhost","root","") or die("could not connect to the local host");
				mysqli_select_db($connect,"registration") or die ("database not found");
				$sql = "INSERT INTO user_image(ID, USERNAME, IMAGE_TYPE,IMAGE) VALUES(NULL,'$username','{$imageProperties['mime']}', '{$imgData}')";
				$current_id = mysqli_query($connect,$sql);
				echo mysqli_error($connect);
				if(isset($current_id)) 
				{		
					$result = mysqli_query($connect,"SELECT *FROM user_image WHERE USERNAME='$username' ORDER BY ID DESC" )or die("<b>Error:</b> Problem on Image SELECTION <br/>" . mysqli_error($connect));
					$row = mysqli_num_rows($result);
					if($row>=1)
					{
						$row1 = mysqlI_fetch_array($result,MYSQLI_BOTH);
						echo ' <img src="data:image/jpeg;base64,'.base64_encode($row1['IMAGE']).'" height="160px" width="140px" />';
					}
					else
					{
						echo 'not available';
						echo  mysqli_error($connect);
					}
				echo '<meta type="profile_pic.php" content="refress">';
				echo '<script type="text/javascript">alert("Picture Uploaded Successfully");</script>';
				//echo '<meta content="0;profile_pic.php?username='.$username.'" http-equiv="refresh" />';
				echo '<meta content="0;profile.php" http-equiv="refresh" />';
				}
			}
		}
	}
	?>
	</div>
	<div style="width:500px;height:50px; border:0px solid white;margin:auto; position:relative;top:70px;"><form action= "" method = "post" enctype="multipart/form-data">
		<input type="file" name="img" style=""/>
		<input type="submit" name="upload" onClick="upload()"value="Upload" style="width:100px;height:30px;padding:2px;"/>
	</form>
	</div>
	

</div>

</div>
<div class="bot">
		<h3 style="padding:0px;margin:10px;">Copyright &copy KK Jha</h3>
	</div>
</div>

</body>
</html>