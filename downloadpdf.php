<?php include("dataconnection.php"); 
session_start();



if(isset($_GET["download"]))
			{
			$cusId = $_GET["id"];
			$orderid = $_GET["orderid"];
			if($result = mysqli_query($connect, "SELECT * FROM order_process WHERE Customer_Id='$cusId' AND Order_Id='$orderid'"))
			{
				$row = mysqli_fetch_assoc($result);
			}
			
			
			}
if (isset($_POST["Back"])) 
{
	?>
	<script>
	location.assign("tablesorder.php");
	</script>	
	<?php
}			
if (isset($_POST["Download"])) 
{
	
	echo"<script>window.location.href='makepdf.php?pdf&id=$cusId&orderid=$orderid';</script>";
}
?>
<!DOCTYPE html>
<html>
<head><title>Download Receipt</title>

<style>
body{background-image:url(css/background.jpg);
background-size:200px,200px;}


@font-face
{font-family:font1;
src:url('Obliq.ttf');
}
			
			
h1{font-family:font1;
	font-size:2em;
	color:#009922;
	letter-spacing:5px;
	text-align:center;}
	
h4{font-size:2em;
	word-spacing:15px;
	background-color:yellowgreen;
	color:white;
	text-shadow:2px 2px 5px #009922;}

p{font-style:italic;}

span.label{color:blue;
			font-weigth:bold;}

#old-price{text-decoration:line-through;
			font-style:normal;}
			
#new-price{color:red;
			font-style:normal;
			text-decoration:underline;}
			
.btn-group .button {
  background-color: #4CAF50; /* Green */
  border: 1px solid green;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  font-size: 16px;
  cursor: pointer;
  width: 150px;
  display: block;
}

.btn-group .button:not(:last-child) {
  border-bottom: none; /* Prevent double borders */
}

.btn-group .button:hover {
  background-color: #3e8e41;
}			
</style>

</head>

<body>
	<form name="download" method="post">
<h1>Thank you for purchasing our products</h1>

<h4>Please the download button to download your receipt</h4>
<p>
	Download Your Receipt Here!
</p>

<div class="btn-group">
  <button class="button" name="Download">Download</button>
  <button class="button" style="margin-left:13%;margin-top:-3%" name="Back">Back menu</button>
</div>
</form>


</body>

</html>

<?php 



?>