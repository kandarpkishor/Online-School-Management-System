<?php

include "include/header.php";
?>
<div class="temp_container">
	<?php
include "include/left.php";
?>
	<center>
	<div style="text-align:center; width:60%;height:440px;border:0px solid red;z-index:1;margin-left:35px;margin-top:50px; padding:auto;opacity:1;float:left;">
		<a id="school_administrative" class="notice" href="generatebill.php" title="Generate Student Bill Classwise">Generate Bill</a>
		<a id="school_administrative" class="student_fee" href="paymententry.php" title="Payment Entry">Payment Entry</a>
		<a id="school_administrative" class="payroll" href="payment.php" title="View All Payment">View Payment</a>
		<a id="school_administrative" class="Student_Search" href="student_pay_record.php" title="View All Bill Payment By Student">Search Student Payment Record</a>
		<a id="school_administrative" class="notice" href="dues.php" title="Generate Student Bill Classwise">View Dues/ Balance</a>
		<a id="school_administrative" class="notice" href="search-bill.php" title="Generate Student Bill Classwise">Print Bill</a>
		<a id="school_administrative" class="notice" href="search_receipt.php" title="Generate Student Bill Classwise">Print Bill Receipt</a>
		<a id="school_administrative" class="notice" href="setting.php" title="Generate Student Bill Classwise">Setting</a>
	</div>
	</center>
<?php

include "include/right.php";
?>

</div>
<?php

include "include/footer.php";
?>