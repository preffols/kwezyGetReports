<?php
//including the connection to database file
require 'config.inc.php';


//cretig a class for a mananger to view reports
class manangerClass extends config
{
	
	//method to get all customers , only basic data
public function getCustomers()
{
	
//queerring a database to select details
$data = $this->connect()->query("SELECT customer.customerId, customer.customerName, customer.customerPhoneNumber FROM customer")->fetchAll();


//looping the featched data assign it to an array
foreach ($data as $row) {
	$dbData[] = $row;
   // echo $row['customerName']."<br />\n";

}

//return the array
return $dbData;
}


//method to get all buses from the databeas
public function getAllBuses(){

	//a quarry to sellect all buses n the database
$data = $this->connect()->query("SELECT bus.busNumberPlate, bus.busCapacity, busroute.busRouteDate, busroute.busRouteTotalTraveller, routes.routeTo, routes.routeFrom,routes.routeCost, routes.routeCost * busroute.busRouteTotalTraveller as TotalAmount
    FROM bus
    INNER JOIN busRoute ON bus.busId=busroute.busRouteId
    INNER JOIN routes ON
    routes.routeId=busRoute.busRouteId
    ORDER BY busroute.busRouteDate")->fetchAll();

// looping the data and assign it to an array
foreach ($data as $row) {
	$dbData[] = $row;
   // echo $row['customerName']."<br />\n";

}

//returning the results in an array form 
return $dbData;
}

//methond to get all customer data 
public function customerData(){

	//a quarry to sellect all buses n the database
$data = $this->connect()->query("SELECT customer.customerName, customer.customerPhoneNumber, transactions.transactionDate, busroute.busRouteDate
        FROM customer
        INNER JOIN transactions ON customer.customerId = transactionId
        INNER JOIN busRoute ON transactions.transactionId = busRoute.busRouteDate
        ORDER BY transactions.transactionDate")->fetchAll();

// looping the data and assign it to an array
foreach ($data as $row) {
	$dbData[] = $row;
   // echo $row['customerName']."<br />\n";

}

//returning the results in an array form 
return $dbData;
}

}





?>