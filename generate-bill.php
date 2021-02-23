<?php

include "include/header.php";
?>
<div class="temp_container">
	<?php
include "include/left.php";
?>
	<center>
	<div style="text-align:center; width:800px;height:440px;border:0px solid red;z-index:1;margin-left:35px;margin-top:50px; padding:auto;opacity:1;float:left;">
		<a id="school_administrative" class="notice" href="generatebill_normal.php" title="Generate Student Bill Classwise">Generate Normal Bill</a>
		<a id="school_administrative" class="student_fee" href="generatebill_hostel.php" title="Payment Entry">Generate Bill with hostel Facility</a>
		<a id="school_administrative" class="payroll" href="generatebill_transport.php" title="View All Payment">Generate Bill With Transport Facility</a>
		<a id="school_administrative" class="Student_Search" href="view_generated_bill.php" title="View All Bill Payment By Student">View Generated Bill</a>
	</div>
	</center>
	
<?php

include "include/right.php";
?>

</div>
<?php

include "include/footer.php";
?>