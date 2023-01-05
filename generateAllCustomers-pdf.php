<?php
require 'classs.php';
require 'fpdf.php';


class generatePdf extends manangerClass
{
	public function connect(){
	$serverName = "localhost";
	$userName = "root";
	$password = "";
	$dbname = "kwezy";

	$conn = mysqli_connect($serverName,$userName,$password,$dbname);
	 return $conn;
	}
	
public function getCustomersPdf()
{
	$pdf = new FPDF();
	$pdf->addPage();
	$pdf->SetFont('Arial','B',16);

	
//queerring a database to select details
$data = $this->connect()->query("SELECT customer.customerId, customer.customerName, customer.customerPhoneNumber FROM customer");
//accessing time and date
	$date = date("Y-m-d h:i:sa");
	
	$pdf->Cell(100,10,"REPORT ON CUSTOMERS",0,1);
	$pdf->Cell(100,10,"$date",0,1);
	$pdf->Cell(100,10,"",0,1);

$pdf->Cell(40,10,"No",0,0);
	$pdf->Cell(40,10,"Full Name",0,0);
	$pdf->Cell(40,10,"Phone Number",0,1);
	$y = $pdf->GetY();
	$pdf->Line(10,$y,199,$y);
	$pdf->Line(10,10,100,10);
//looping the featched data assign it to an array
while ($rows = mysqli_fetch_array($data)) {
	$pdf->Cell(40,10,$rows['customerId'],0,0);
	$pdf->Cell(40,10,$rows['customerName'],0,0);
	$pdf->Cell(40,10,$rows['customerPhoneNumber'],0,1);
	$y1  = $pdf->GetY();
	$pdf->Line(10,$y1+2,199,$y1+2);
}
$pdf->Output();
}

}

$gpdf = new generatePdf;
$gpdf->getCustomersPdf();

?>
