<!DOCTYPE html>
<html lang="en">
<title>W3.CSS Template</title>


<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="w3-theme-black.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="../../cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif;}
.w3-sidebar {
  z-index: 3;
  width: 250px;
  top: 43px;
  bottom: 0;
  height: inherit;
}
</style>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-theme w3-top w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-right w3-hide-large w3-hover-white w3-large w3-theme-l1" href="javascript:void(0)" onclick="w3_open()"><i class="fa fa-bars"></i></a>
    <a href="#" class="w3-bar-item w3-button w3-theme-l1">Logo</a>
    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Manager pannel</a>
  
    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Profiles</a>
   
  </div>
</div>

<!-- Sidebar -->
<nav class="w3-sidebar w3-bar-block w3-collapse w3-large w3-theme-l5 w3-animate-left" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-right w3-xlarge w3-padding-large w3-hover-black w3-hide-large" title="Close Menu">
    <i class="fa fa-remove"></i>
  </a>
  <h4 class="w3-bar-item"><b>Menu</b></h4>
  <a class="w3-bar-item w3-button w3-hover-black" href="AllBuses.php">All Buses</a>
  <a class="w3-bar-item w3-button w3-hover-black" href="AllCustomers.php">All Customers</a>
  <a class="w3-bar-item w3-button w3-hover-black" href="#">Detailed on Customers</a>
  <a class="w3-bar-item w3-button w3-hover-black" href="#">Routes</a>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- Main content: shift it to the right by 250 pixels when the sidebar is visible -->
<div class="w3-main" style="margin-left:250px">

  <div class="w3-row w3-padding-64">
    <div class="w3-twothird w3-container">
      <h1 class="w3-text-teal">Welocome to kwezy</h1>
      <p> 
<?php
require 'classs.php';



$mananger1 = new  manangerClass();

$arryNo = $mananger1->getAllBuses();

?>
  
<table cellpadding="15" cellspacing="10" align="center" border="2">


<h1 align="center">Report On Buses</h1>
  <tr>
    <th>No plate</th>
    <th>Bus Capacity</th>
    <th>Bus Route date</th>
    <th>Total travellers</th>
    <th>From</th>
    <th>To</th>
    <th>cost/h</th>
    <th>Total Amount</th>
  </tr>
<?php for($value=0; $value<count($arryNo); $value++){
  
  echo "<tr>";
    for($i=0; $i<=7; $i++){
      echo "<tr>";

      echo "<td>". $arryNo[$value][$i]."</td>";
      echo "</tr";
    }
    echo "</tr";
  
}


?>


  
</tr>

</table>
<h3 align="center"><button><a href="generateAllBuses-pdf.php">download pdf</a></button></h3>

    </div>
    
  </div>






  <footer id="myFooter">
    <div class="w3-container w3-theme-l2 w3-padding-32">
      <h4>Kwezy Buses</h4>
    </div>

    <div class="w3-container w3-theme-l1">
      <p>Powered by <a href="default.html" target="_blank">Group 2</a></p>
    </div>
  </footer>

<!-- END MAIN -->
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>

</body>

<!-- Mirrored from www.w3schools.com/w3css/tryw3css_templates_webpage.htm by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 17:03:55 GMT -->
</html>