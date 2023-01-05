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
	
public function getAllBusesPdf()
{
	$pdf = new FPDF();
	$pdf->addPage();
	$pdf->SetFont('Arial','B',16);

	
//queerring a database to select details
$data = $this->connect()->query("SELECT bus.busNumberPlate, bus.busCapacity, busroute.busRouteDate, busroute.busRouteTotalTraveller, routes.routeTo, routes.routeFrom,routes.routeCost, routes.routeCost * busroute.busRouteTotalTraveller as TotalAmount
    FROM bus
    INNER JOIN busRoute ON bus.busId=busroute.busRouteId
    INNER JOIN routes ON
    routes.routeId=busRoute.busRouteId
    ORDER BY busroute.busRouteDate");


	//accessing time and date
	$date = date("Y-m-d h:i:sa");

	
	
	$pdf->Cell(100,10,"REPORT ON BUSES",0,1);
	$pdf->Cell(100,10,"$date",0,1);
	$pdf->Cell(100,10,"",0,1);

	$pdf->Cell(18,10,"NoP",0,0);
	$pdf->Cell(15,10,"CTY",0,0);
	$pdf->Cell(55,10,"Date",0,0);
	$pdf->Cell(13,10,"TT",0,0);
	$pdf->Cell(20,10,"To",0,0);
	$pdf->Cell(25,10,"From",0,0);
	$pdf->Cell(20,10,"Cost",0,0);
	$pdf->Cell(20,10,"Total",0,1);
	$y = $pdf->GetY();
	$pdf->Line(10,$y,199,$y);
	$pdf->Line(10,10,100,10);
//looping the featched data assign it to an array
while ($rows = mysqli_fetch_array($data)) {
	$pdf->Cell(18,10,$rows['busNumberPlate'],0,0);
	$pdf->Cell(15,10,$rows['busCapacity'],0,0);
	$pdf->Cell(55,10,$rows['busRouteDate'],0,0);
	$pdf->Cell(13,10,$rows['busRouteTotalTraveller'],0,0);
	$pdf->Cell(20,10,$rows['routeTo'],0,0);
	$pdf->Cell(25,10,$rows['routeFrom'],0,0);
	$pdf->Cell(20,10,$rows['routeCost'],0,0);
	$pdf->Cell(20,10,$rows['TotalAmount'],0,1);
	$y1  = $pdf->GetY();
	$pdf->Line(10,$y1+2,199,$y1+2);
	
}
$pdf->Output();
}

}

$gpdf = new generatePdf;
$gpdf->getAllBusesPdf();

?>
