<?php
include('include/header.php');
?>
<div class="temp_container">
<?php
include "include/left.php";
?>
	<center>
	<div style="text-align:center; width:60%;height:440px;border:0px solid red;z-index:1;margin-left:35px;margin-top:50px; padding:auto;opacity:1;float:left;">
		<a id="school_administrative" class="admission" href="addmission.php" title="School Administrative">Admission</a>
		<a id="school_administrative" class="student-detail" href="studentview.php" title="Student Details Management System">View Student Details</a>
		<a id="school_administrative" class="student_roll" href="add_class.php" title="Student Class Allocation System">Student Class Allocation</a>
		<a id="school_administrative" class="student_roll" href="class_register.php" title="Class Register">Class Register</a>
		<a id="school_administrative" class="id-card" href="viewreg.php" title="ID Card Generation">Search Students</a>
	</div>
	</center>
<?php
include "include/right.php";
?>
</div>
<?php

include "include/footer.php";
?>