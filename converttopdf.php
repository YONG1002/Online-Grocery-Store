<?php 
include("dataconnection.php"); 
session_start();
if(isset($_GET["pdf"]))
			{
		    $pcode = 

			$cusId = $_GET["id"];
			$orderid =$_GET["orderid"];
			}
			
			
			


// Include autoloader 
require_once 'dompdf/autoload.inc.php'; 
 
// Reference the Dompdf namespace 
use Dompdf\Dompdf; 
 
// Instantiate and use the dompdf class 
$dompdf = new Dompdf();

// Load content from html file 
$html = file_get_contents("http://localhost/fyp/user/makepdf.php?pdf&id=$cusId&orderid=$orderid"); 
$dompdf->loadHtml($html); 
 
// (Optional) Setup the paper size and orientation 
$dompdf->setPaper('A3', 'vertical'); 
 
// Render the HTML as PDF 
$dompdf->render(); 
 
// Output the generated PDF (1 = download and 0 = preview) 
$dompdf->stream("receipt", array("Attachment" => 0));
