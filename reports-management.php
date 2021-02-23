<?php

include "include/header.php";
?>
<div class="temp_container">
	<?php
include "include/left.php";
?>
	<center>
	<div style="text-align:center; width:60%;height:440px;border:0px solid red;z-index:1;margin-left:35px;margin-top:50px; padding:auto;opacity:1;float:left;">
		<a id="school_administrative" class="notice" href="payment_report.php" title="Generate Student Bill Classwise">Payment Report</a>
		<a id="school_administrative" class="notice" href="dues.php" title="Generate Student Bill Classwise">Monthly Attendance Report</a>
		<a id="school_administrative" class="notice" href="search-bill.php" title="Generate Student Bill Classwise">Monthly Expanse Report</a>
		<a id="school_administrative" class="notice" href="search_receipt.php" title="Generate Student Bill Classwise">Monthly Salary Report </a>
	</div>
	</center>
<?php

include "include/right.php";
?>

</div>
<?php

include "include/footer.php";
?>