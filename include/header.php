
<?php
include('connection/session.php');
include('include/number_generator.php');
include('connection/connection.php');
require('encode.php');
$enc= new Encryption;
$encdata=$enc->safe_b64encode($login_session );
if(!isset($login_session))
{
    location:index.php;
    exit;
}



?>
<html>
<title>
	ONLINE SCHOOL MANAGEMENT SYSTEM 
</title>
<head>
<link rel="stylesheet" href="css/table.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" href="css/menu.css" type="text/css"/>
<link rel="stylesheet" href="css/form.css" type="text/css"/>
<script src="javascript/printdiv.js" type="text/javascript"></script>
<script src="jquery-3.2.1.min.js"></script> 

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
  $(function(){
		var stickyHeaderTop = $('.menu').offset().top;
 
        $(window).scroll(function(){
                if( $(window).scrollTop() > stickyHeaderTop ) {
                        $('.menu').css({"position":"fixed", "top": "0px","z-index":"1000", "opacity":"0.7"});
                } else {
                        $('.menu').css({position: 'static', top: '0px', "opacity":"1"});
                }
        });
  });
$(document).ready(function()
{
$("#viewtime").click(function()
	{
		$("#addclass").css({"display":"block"});
	});
	
});

	</script>
<script>
   if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>	
	

	<style>
		
		
	
	</style>
</head>
<div class="main">

	<div class="header_cont">
	<div class="header">
		<h1 style="font-size:45px;"> ONLINE SCHOOL MANAGEMENT SYSTEM</h1>
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

	<div class="menu" style="//height:30px; background-color:#00897B;">

		<ul>
			<li>
			<a href="home.php">Home</a>
			</li>
		</ul>
		<ul>
			<li >
			<a href="student-management.php">Student Management</a>
			</li>
		</ul>
		<ul>
			<li><a  href="fee-management.php">Fee Management</a>
			</li>
		</ul>
		
		<ul>
			<li><a href="exam-management.php">Exam Management</a>
			</li>
		</ul>
		
		<ul>
			<li><a href="reports-management.php">Report</a>
			</li>
		</ul>
		<ul> 
		<li><a href="">Print</a>
		</li>
		</ul>
	
	<!--<center>
		<a id="header_strip" class="school_admini" href="student-management.php" title="School Administrative">Student Management</a>
		<a id="header_strip" class="finance" href="fee-management.php" title="Finance Management System">Fee Management</a>
		<a style="width:195px;"id="header_strip"  class="exam-result" href="exam-management.php" title="Exam Scheduling">Exam Management</a>
		<a id="header_strip" class="reports" href="reports-management.php" title="Reports Management System">Reports</a>
	</center>/-->

</div>


