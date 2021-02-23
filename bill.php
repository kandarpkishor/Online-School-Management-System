
<?php
$conn=mysqli_connect("localhost","root","");
$db=mysqli_select_db($conn,"school");
$bill_id=$_REQUEST['id'];
$select_bill=mysqli_query($conn, "SELECT *FROM bill WHERE BILL_ID='$bill_id' ORDER BY ID DESC");
$num=mysqli_num_rows($select_bill);
if($num>=1)
{
	$row=mysqli_fetch_array($select_bill, MYSQLI_BOTH);
	$name=ucwords(strtolower($row['S_NAME']));
	$sid=$row['S_ID'];
	$class=ucwords(strtolower($row['CLASS']));
	$roll=ucwords(strtolower($row['ROLL']));
	$month=ucwords(strtolower($row['MONTH']));
	$year=ucwords(strtolower($row['YEAR']));
	
	$bill_no=$row['BILL_ID'];
	$date=$row['DATE'];
	$tution_fee=$row['TUATION_FEE'];
	$comp_fee=$row['COMPUTER_FEE'];
	$exam_fee=$row['EXAM_FEE'];
	$transport_fee=$row['TRANSPORT_FEE'];
	$hostal_fee=$row['HOSTAL_FEE'];
	$other_fee=$row['OTHER_FEE'];
	$current=$row['TUATION_FEE']+$row['COMPUTER_FEE']+$row['EXAM_FEE']+$row['TRANSPORT_FEE']+$row['HOSTAL_FEE']+$row['OTHER_FEE'];
	$dues=$row['PREV_DUES'];
	$total=$row['PREV_DUES']+$row['TUATION_FEE']+$row['COMPUTER_FEE']+$row['EXAM_FEE']+$row['TRANSPORT_FEE']+$row['HOSTAL_FEE']+$row['OTHER_FEE'];
	$other_name=ucwords(strtolower($row['OTHER_REMARK']));
}
else
{
	echo $mysqli_error($conn);
	
}
	$query2 = mysqli_query($conn,"SELECT *FROM payment WHERE S_ID='$sid' AND PAID!=0 ORDER BY ID DESC");
	$num=mysqli_num_rows($query2);
	if($num>=1)
	{
		$result2=mysqli_fetch_array($query2, MYSQLI_BOTH);	
		$prev_bill_no=$result2['BILL_ID'];
		$prev_month=$result2['MONTH'];
		$prev_year=$result2['YEAR'];
		$prev_amount=$result2['TOTAL_AMOUNT'];
		$prev_paid=$result2['PAID'];
		$prev_dues=$result2['DUES'];
		$prev_date=$result2['DATE'];
	}
	else
	{
		$prev_bill_no='NA';
		$prev_month='NA';
		$prev_year='NA';
		$prev_amount=0;
		$prev_paid=0;
		$prev_dues=0;
		$prev_date='NA';
	}




?>
   <?php
require ('fpdf/fpdf.php');
	//ob_start();
class PDF extends FPDF
{
// Page header
	function Header()
	{
		// Logo
		$this->Rect(5,5,90,140,'D');
		$this->Rect(10,10,80,130,'D');
		$this->Image('logo.jpg',11,12,15);
		// Arial bold 15
		
		// Move to the right
		//$this->Cell(0,0,'',1,1);
		//$this->Cell(0,40,'',1);
		$this->Cell(14);
		// Title
		
		$this->SetFont('Arial','',6);
		$this->Cell(65,4,'Reg. No. : sah/svv/104/2016',0,1,'C');
		$this->SetFont('Arial','B',12);
		$this->Cell(14);
		$this->Cell(65,5,'SAHARSA VIKAS VIDYALAYA',0,1,'C');
		
		
		
		$this->Cell(14);
		$this->SetFont('Arial','',8);
		$this->Cell(66,4,'Bariyahi Bazar, Bangaon By Pass Road',0,1,'C');
		$this->Cell(14);
		$this->Cell(66,4,'Near Navodaya Vidyalaya, Saharsa - 852212',0,1,'C');
		$this->SetFont('Arial','',5);
		//$this->Cell(14);
		$this->Cell(24,2,'Web : www.svvsaharsa.com',0,0,'');
		$this->Cell(29,2,'E-mail : svvsaharsa@gmail.com',0,0,'');
		$this->Cell(27,2,'Mob : 93046143311, 9470085658',0,1,'R');
		//$this->Cell(0,0,'',1);
		//$this->Cell(0,0,'',1);
		// Line break
		$this->Ln(2);
	}

	// Page footer
	function Footer()
	{
		// Position at 1.5 cm from bottom
		$this->SetY(-15);
		// Arial italic 8
		$this->SetFont('Arial','I',6);
		// Page number
		$this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
	}
}

// Instanciation of inherited class
$pdf = new PDF();
//SetMargins(float left, float top [, float right])
//$pdf = new PDF('P','mm',array(100,150));
//$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',8);
$pdf->Cell(80,6,"Bill Month : {$month}/{$year}",1,1,'C');
$pdf->Cell(12,5,'Bill No :',0,0,'L');
$pdf->Cell(30,5,"{$bill_no}",0,0,'L');
$pdf->Cell(10,5,'Date :',0,0,'R');
$pdf->Cell(28,5,"{$date}",0,1,'L');

$pdf->Cell(12,4,'Name :',0,0,'L');
$pdf->Cell(30,4,"{$name}",0,0,'L');
$pdf->Cell(15,4,'Student Id. :',0,0,'R');
$pdf->Cell(23,4,"{$sid}",0,1,'L');
$pdf->Cell(12,4,'Class :',0,0,'L');
$pdf->Cell(12,4,"{$class}",0,'L');
$pdf->Cell(30,4,'Roll No. :',0,0,'R');
$pdf->Cell(26,4,"{$roll}",0,1,'L');

/*previous bill detail*/
$pdf->SetFont('Times','B',8);
$pdf->Cell(80,6,"Previous Bill Payment Detail",1,1,'C');
$pdf->SetFont('Times','',7);
$pdf->Cell(7,5,'',0,0,'');
$pdf->Cell(9,5,'Bill No',1,0,'C');
$pdf->Cell(9,5,'Month',1,0,'C');
$pdf->Cell(9,5,'Year',1,0,'C');
$pdf->Cell(9,5,'Amount',1,0,'C');
$pdf->Cell(9,5,'Paid',1,0,'C');
$pdf->Cell(9,5,'Dues',1,0,'C');
$pdf->Cell(13,5,'Date',1,0,'C');
$pdf->Cell(6,5,'',0,1,'');
$pdf->Cell(7,5,'',0,0,'');
$pdf->Cell(9,5,"{$prev_bill_no}",1,0,'C');
$pdf->Cell(9,5,"{$prev_month}",1,0,'C');
$pdf->Cell(9,5,"{$prev_year}",1,0,'C');
$pdf->Cell(9,5,"{$prev_amount}",1,0,'C');
$pdf->Cell(9,5,"{$prev_paid}",1,0,'C');
$pdf->Cell(9,5,"{$prev_dues}",1,0,'C');
$pdf->Cell(13,5,"{$prev_date}",1,0,'C');
$pdf->Cell(6,5,'',0,1,'');

/* Current Bill Detail*/
$pdf->SetFont('Times','B',8);
$pdf->Cell(80,5,"Current Bill Detail",1,1,'C');
$pdf->Cell(55,5,"Particular",1,0,'C');
$pdf->Cell(25,5,"Amount",1,1,'C');
$pdf->SetFont('Times','',8);
$pdf->Cell(55,5,"1. Tution Fee",1,0,'L');
$pdf->Cell(25,5,"{$tution_fee}",1,1,'C');
$pdf->Cell(55,5,"2. Computer Fee",1,0,'L');
$pdf->Cell(25,5,"{$comp_fee}",1,1,'C');
$pdf->Cell(55,5,"3. Exam Fee",1,0,'L');
$pdf->Cell(25,5,"{$exam_fee}",1,1,'C');
$pdf->Cell(55,5,"4. Hostal Fee",1,0,'L');
$pdf->Cell(25,5,"{$hostal_fee}",1,1,'C');
$pdf->Cell(55,5,"5. Transport Fee",1,0,'L');
$pdf->Cell(25,5,"{$transport_fee}",1,1,'C');
$pdf->Cell(55,5,"6. {$other_name}",1,0,'L');
$pdf->Cell(25,5,"{$other_fee}",1,1,'C');


/*total bill amount*/
$pdf->SetFont('Times','B',8);
$pdf->Cell(25,10,"Total",1,0,'C');
$pdf->Cell(30,5,"Current Dues",1,0,'C');
$pdf->Cell(25,5,"{$current}",1,1,'C');
$pdf->Cell(25);
$pdf->Cell(30,5,"Previous Dues",1,0,'C');
$pdf->Cell(25,5,"{$dues}",1,1,'C');
$pdf->Cell(55,5,"Grand Total",1,0,'C');
$pdf->Cell(25,5,"{$total}",1,1,'C');

$pdf->Output();
    //ob_end_flush(); 
?>