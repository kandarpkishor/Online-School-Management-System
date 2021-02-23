<?php

include "include/header.php";
?>
<div class="temp_container">
	<?php
include "include/left.php";
?>
	<center>
	<div style="text-align:center; width:60%;height:440px;border:0px solid red;z-index:1;margin-left:35px;margin-top:50px; padding:auto;opacity:1;float:left;">
		<a id="school" class="school_admini" href="student-management.php" title="School Administrative">Student Management</a>
		<a id="school" class="finance" href="fee-management.php" title="Finance Management System">Fee Management</a>
		<a id="school_acade" class="exam-result" href="exam-management.php" title="Exam Scheduling">Exam Management</a>
		<a id="school" class="reports" href="reports-management.php" title="Reports Management System">Reports</a>
		
	</div>
	</center>

<?php

include "include/right.php";
?>
</div>
<?php

include "include/footer.php";
?>