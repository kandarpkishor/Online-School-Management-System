
<?php

require ('fpdf/fpdf.php');
$conn=mysqli_connect("localhost","root","");
$db=mysqli_select_db($conn,"school");
	//ob_start();
class PDF extends FPDF
{
// Page header
	function Header()
	{
		// Logo
		$this->Rect(105,5,90,140,'D');
		$this->Rect(5,5,90,140,'D');
		$this->Rect(10,10,80,130,'D');
		$this->Rect(110,10,80,130,'D');
		$this->Image('logo.jpg',11,12,15);
		$this->Image('logo.jpg',111,12,15);
		
		//Line(float x1, float y1, float x2, float y2)
		$this->Line(100, 5, 100, 145);
		// Arial bold 15
		
		// Move to the right
		//$this->Cell(0,0,'',1,1);
		//$this->Cell(0,40,'',1);
		$this->Cell(14);
		// Title
		
		$this->SetFont('Arial','',6);
		$this->Cell(65,4,'Reg. No. : sah/svv/104/2016',0,0,'C');
		$this->Cell(35);
		$this->Cell(65,4,'Reg. No. : sah/svv/104/2016',0,1,'C');
		$this->SetFont('Arial','B',12);
		$this->Cell(14);
		$this->Cell(65,5,'SAHARSA VIKAS VIDYALAYA',0,0,'C');
		$this->Cell(35);
		$this->Cell(65,5,'SAHARSA VIKAS VIDYALAYA',0,1,'C');
		
		
		
		$this->Cell(14);
		$this->SetFont('Arial','',8);
		$this->Cell(66,4,'Bariyahi Bazar, Bangaon By Pass Road',0,0,'C');
		$this->Cell(35);
		$this->Cell(66,4,'Bariyahi Bazar, Bangaon By Pass Road',0,1,'C');
		$this->Cell(14);
		$this->Cell(66,4,'Near Navodaya Vidyalaya, Saharsa - 852212',0,0,'C');
		$this->Cell(35);
		$this->Cell(66,4,'Near Navodaya Vidyalaya, Saharsa - 852212',0,1,'C');
		$this->SetFont('Arial','',5);
		//$this->Cell(14);
		$this->Cell(24,2,'Web : www.svvsaharsa.com',0,0,'');
		$this->Cell(29,2,'E-mail : svvsaharsa@gmail.com',0,0,'');
		$this->Cell(27,2,'Mob : 93046143311, 9470085658',0,0,'R');
		$this->Cell(20);
		$this->Cell(24,2,'Web : www.svvsaharsa.com',0,0,'');
		$this->Cell(29,2,'E-mail : svvsaharsa@gmail.com',0,0,'');
		$this->Cell(27,2,'Mob : 93046143311, 9470085658',0,1,'R');
		//$this->Cell(0,0,'',1);
		//$this->Cell(0,0,'',1);
		// Line break
		$this->Ln(2);
	}

	// Page footer
	/*function Footer()
	{
		// Position at 1.5 cm from bottom
		$this->SetY(-20);
		$this->SetX(20);
		// Arial italic 8
		$this->SetFont('Arial','I',12);
		// Page number
		//$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
			$this->Cell(0,10,'Signature',0,0,'L');
	}*/
	function viewTable($conn)
	{
		//$receipt_id='681008';
		$receipt_id=$_REQUEST['id'];
		
		$select_bill=mysqli_query($conn,"SELECT *FROM payment WHERE RECEIPT_ID='$receipt_id' ");
		$num=mysqli_num_rows($select_bill);
		if($num!==0)
		{
			
			while($row=mysqli_fetch_array($select_bill, MYSQLI_BOTH))
			{
				$name=ucwords(strtolower($row['S_NAME']));
				
				$this->SetFont('Times','',12);
				$this->Cell(80,7,"Bill Month : {$row['MONTH']}/{$row['YEAR']}",1,0,'C');
				$this->Cell(20);
				$this->Cell(80,7,"Bill Month : {$row['MONTH']}/{$row['YEAR']}",1,1,'C');
				
				$this->SetFont('Times','',10);
				
				$this->Cell(19,7,'Receipt No :',0,0,'L');
				$this->Cell(23,7,"{$row['RECEIPT_ID']}",0,0,'L');
				$this->Cell(10,7,'Date :',0,0,'R');
				$this->Cell(28,7,"{$row['DATE']}",0,0,'L');
				$this->Cell(20);
				$this->Cell(19,7,'Receipt No :',0,0,'L');
				$this->Cell(23,7,"{$row['RECEIPT_ID']}",0,0,'L');
				$this->Cell(10,7,'Date :',0,0,'R');
				$this->Cell(28,7,"{$row['DATE']}",0,1,'L');
				
				$this->Cell(15,7,'Bill No :',0,0,'L');
				$this->Cell(30,7,"{$row['BILL_ID']}",0,0,'L');
				$this->Cell(55);
				$this->Cell(15,7,'Bill No :',0,0,'L');
				$this->Cell(30,7,"{$row['BILL_ID']}",0,1,'L');
				$this->Cell(80,0,'',1,1);
				

				$this->Cell(12,7,'Name :',0,0,'L');
				$this->Cell(45,7,"{$name}",0,0,'L');
				$this->Cell(12,7,'Class :',0,0,'L');
				$this->Cell(11,7,"{$row['CLASS']}",0,0,'L');
				$this->Cell(20);
				$this->Cell(12,7,'Name :',0,0,'L');
				$this->Cell(45,7,"{$name}",0,0,'L');
				$this->Cell(12,7,'Class :',0,0,'L');
				$this->Cell(11,7,"{$row['CLASS']}",0,1,'L');
				
				$this->Cell(20,7,'Student Id. :',0,0,'L');
				$this->Cell(30,7,"{$row['S_ID']}",0,0,'L');
				$this->Cell(19,7,'Roll No. :',0,0,'R');
				$this->Cell(11,7,"{$row['ROLL']}",0,0,'L');
				$this->Cell(20);
				$this->Cell(20,7,'Student Id. :',0,0,'L');
				$this->Cell(30,7,"{$row['S_ID']}",0,0,'L');
				$this->Cell(19,7,'Roll No. :',0,0,'R');
				$this->Cell(11,7,"{$row['ROLL']}",0,1,'L');


				/* Current Bill Detail*/
				$this->SetFont('Times','',12);
				$this->Cell(80,7,"Bill Detail",1,0,'C');
				$this->Cell(20);
				$this->Cell(80,7,"Bill Detail",1,1,'C');
				$this->Cell(55,7,"Particular",1,0,'C');
				$this->Cell(25,7,"Amount",1,0,'C');
				$this->Cell(20);
				$this->Cell(55,7,"Particular",1,0,'C');
				$this->Cell(25,7,"Amount",1,1,'C');
				
				$this->SetFont('Times','',10);
				$this->Cell(55,7,"Bill Amount",1,0,'L');
				$this->Cell(25,7,"{$row['TOTAL_AMOUNT']}",1,0,'C');
				$this->Cell(20);
				$this->Cell(55,7,"Bill Amount",1,0,'L');
				$this->Cell(25,7,"{$row['TOTAL_AMOUNT']}",1,1,'C');
				
				$this->Cell(55,7,"Amount Paid",1,0,'L');
				$this->Cell(25,7,"{$row['PAID']}",1,0,'C');
				$this->Cell(20);
				$this->Cell(55,7,"Amount Paid",1,0,'L');
				$this->Cell(25,7,"{$row['PAID']}",1,1,'C');
				
				$this->Cell(55,7,"Dues",1,0,'L');
				$this->Cell(25,7,"{$row['DUES']}",1,0,'C');
				$this->Cell(20);
				$this->Cell(55,7,"Dues",1,0,'L');
				$this->Cell(25,7,"{$row['DUES']}",1,1,'C');
				
				$this->Cell(55,7,"Balance",1,0,'L');
				$this->Cell(25,7,"{$row['BALANCE']}",1,0,'C');
				$this->Cell(20);
				$this->Cell(55,7,"Balance",1,0,'L');
				$this->Cell(25,7,"{$row['BALANCE']}",1,1,'C');
				//$this->Cell(80,19,"Signature",1,1,'C');
				$this->SetY(115);
				$this->SetX(60);
				$this->Cell(0,10,'Signature',0,0,'L');
				$this->SetY(115);
				$this->SetX(160);
				$this->Cell(0,10,'Signature',0,0,'L');
				

				$this->Ln();
			}
		}

				
	}
}
//$pdf = new PDF();
$receipt_id=$_REQUEST['id'];
$pdf = new PDF('L','mm',array(148,200));
$pdf->AddPage();
//$pdf->SetTitle(string title [, boolean isUTF8]);
$pdf->SetTitle("Receipt No. {$receipt_id}");
$pdf->viewTable($conn);
$pdf->output();
/*else
{
	echo $mysqli_error($conn);
	
}
/*$pdf->Output();
					ob_end_flush(); */


?>
 