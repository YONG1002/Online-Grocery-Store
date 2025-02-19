<?php include("dataconnection.php"); 
session_start();


if(isset($_GET["pdf"]))
			{
			$cusId = $_GET["id"];
			$orderid = $_GET["orderid"];
			if($result = mysqli_query($connect, "SELECT * FROM order_process WHERE Customer_Id='$cusId' AND Order_Id='$orderid'"))
			{
				$row = mysqli_fetch_assoc($result);
			}
			if($resultship = mysqli_query($connect, "SELECT * FROM shipping WHERE Customer_Id='$cusId' AND Order_Id='$orderid'"))
			{
				$ship = mysqli_fetch_assoc($resultship);
			}
			if($resultpay = mysqli_query($connect, "SELECT * FROM payment WHERE Customer_Id='$cusId' AND Order_Id='$orderid'"))
			{
				$pay = mysqli_fetch_assoc($resultpay);
			}
			if($resultorder = mysqli_query($connect, "SELECT * FROM order_details WHERE Customer_Id='$cusId' AND Order_Id='$orderid'"))
			{
				$order = mysqli_fetch_assoc($resultorder);
			}
			if($resultcus = mysqli_query($connect, "SELECT * FROM customer WHERE Customer_Id='$cusId'"))
			{
				$cus = mysqli_fetch_assoc($resultcus);
			}
			}



?>
<head>
   
	 <link href="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
	
</head>
<body>
                        
<div class="receipt-content">
    <div class="container bootstrap snippets bootdey">
		<div class="row">
			<div class="col-md-12">
				<div class="invoice-wrapper">
					<div class="intro">
					<?php 
					$result = mysqli_query($connect, "SELECT * FROM order_process WHERE Customer_Id='$cusId' AND Order_Id='$orderid'");
					$row = mysqli_fetch_assoc($result);
					$resultship = mysqli_query($connect, "SELECT * FROM shipping WHERE Customer_Id='$cusId' AND Order_Id='$orderid'");
					$ship = mysqli_fetch_assoc($resultship);
					
					$resultorder = mysqli_query($connect, "SELECT * FROM order_details WHERE Customer_Id='$cusId' AND Order_Id='$orderid'");
					$order = mysqli_fetch_assoc($resultorder);
					$resultcus = mysqli_query($connect, "SELECT * FROM customer WHERE Customer_Id='$cusId'");
					$cus = mysqli_fetch_assoc($resultcus);
					$payresult = mysqli_query($connect, "SELECT * FROM payment WHERE Order_Id='$orderid'");
					$payre = mysqli_fetch_assoc($payresult);
					
					?>
					
						Hi <strong><?php echo $payre["cus_name"];?></strong>, 
						<br>
						This is the receipt for a payment of <strong>RM<?php echo $payre["Payment_Amount"];?></strong> (RM) for your works
					</div>

					<div class="payment-info">
						<div class="row">
							<div class="col-sm-6">
								<span>Payment ID.</span>
								<strong><?php echo $payre["Payment_Id"];?></strong>
							</div>
							<div class="col-sm-6 text-right">
								<span>Payment Date</span>
								<strong><?php echo $row["Order_date"];?></strong>
							</div>
						</div>
					</div>

					<div class="payment-details">
						<div class="row">
							<div class="col-sm-6">
								<span>Client</span>
								<strong>
									<?php echo $payre["cus_name"];?>
								</strong>
								<p>
									<?php echo $payre["Address"];?><br>
									<?php echo $cus["Postal_code"];?><br>
									<?php echo $cus["City"];?><br>
									<?php echo $cus["Country"];?> <br>
									<a href="#">
										<?php echo $cus["cust_email"];?>
									</a>
								</p>
							</div>
							<div class="col-sm-6 text-right">
								<span>Payment To</span>
								<strong>
									ONLINE GROCERY STORE
								</strong>
								<p>
									Jalan Ayer Keroh Lama,<br>
									75450 Bukit Beruang, <br>
									Melaka <br>
									Malaysia <br>
									<a href="#">
										mmu@gmail.com
									</a>
								</p>
							</div>
						</div>
					</div>

					<div class="line-items">
						<div class="headers clearfix">
							<div class="row">
								<div class="col-xs-4" >Description</div>
								<div class="col-xs-3">Quantity</div>
								<div class="col-xs-5 text-right">Amount</div>
							</div>
						</div>
						<div class="items">
						<?php 
						$resultorder = mysqli_query($connect, "SELECT * FROM order_details WHERE Customer_Id='$cusId' AND Order_Id='$orderid'");
						
						$countorder = mysqli_num_rows($resultorder);
						while($order = mysqli_fetch_assoc($resultorder))
						{					
												
						?>
							<div class="row item" >
								<div class="col-xs-4 desc">
									<?php echo $order["Name"];?>
								</div>
								<div class="col-xs-3 qty">
									<?php echo $order["Quantity"];?>
								</div>
								<div class="col-xs-5 amount text-right">
									<?php echo $order["Price"];?>
								</div>
							</div>
							
						<?php 
						}
						?>	
						</div>
						<div class="total text-right">
							<p class="extra-notes">
								<strong>Extra Notes</strong>
								Please send all items at the same time to shipping address by next week.
								Thanks a lot.
							</p>
							<div class="field">
								Subtotal <span>RM<?php echo $payre["Subtotal"];?></span>
							</div>
							<div class="field">
								Shipping <span>RM10.00</span>
							</div>
							<div class="field">
								Total Item <span><?php echo $countorder;?></span>
							</div>
							<div class="field grand-total">
								Total <span>RM<?php echo $payre["Payment_Amount"];?></span>
							</div>
						</div>

						
						
					</div><br><br><br>
						<strong>Copyright © 2022 ONLINE GROCERY STORE</strong>
				</div>
					
				<a class="button" href="converttopdf.php?pdf&id=<?php echo $cusId; ?>&orderid=<?php echo $orderid;?>" name="Download">Download</a>
				<a class="button" style="margin-left:40px;" href="order_history.php?history&id=<?php echo $cusId;?>" name="Download">back History</a>
				
			</div>
		</div>
	</div>
</div>                    

<style type="text/css">
.receipt-content .logo a:hover {
  text-decoration: none;
  color: #7793C4; 
}

.receipt-content .invoice-wrapper {
  background: #FFF;
  border: 1px solid #CDD3E2;
  box-shadow: 0px 0px 1px #CCC;
  padding: 40px 40px 60px;
  margin-top: 40px;
  border-radius: 4px; 
}

.receipt-content .invoice-wrapper .payment-details span {
  color: #A9B0BB;
  display: block; 
}
.receipt-content .invoice-wrapper .payment-details a {
  display: inline-block;
  margin-top: 5px; 
}

.receipt-content .invoice-wrapper .line-items .print a {
  display: inline-block;
  border: 1px solid #9CB5D6;
  padding: 13px 13px;
  border-radius: 5px;
  color: #708DC0;
  font-size: 13px;
  -webkit-transition: all 0.2s linear;
  -moz-transition: all 0.2s linear;
  -ms-transition: all 0.2s linear;
  -o-transition: all 0.2s linear;
  transition: all 0.2s linear; 
}

.receipt-content .invoice-wrapper .line-items .print a:hover {
  text-decoration: none;
  border-color: #333;
  color: #333; 
}

.receipt-content {
  background: #ECEEF4; 
}
@media (min-width: 1200px) {
  .receipt-content .container {width: 900px; } 
}

.receipt-content .logo {
  text-align: center;
  margin-top: 50px; 
}

.receipt-content .logo a {
  font-family: Myriad Pro, Lato, Helvetica Neue, Arial;
  font-size: 36px;
  letter-spacing: .1px;
  color: #555;
  font-weight: 300;
  -webkit-transition: all 0.2s linear;
  -moz-transition: all 0.2s linear;
  -ms-transition: all 0.2s linear;
  -o-transition: all 0.2s linear;
  transition: all 0.2s linear; 
}

.receipt-content .invoice-wrapper .intro {
  line-height: 25px;
  color: #444; 
}

.receipt-content .invoice-wrapper .payment-info {
  margin-top: 25px;
  padding-top: 15px; 
}

.receipt-content .invoice-wrapper .payment-info span {
  color: #A9B0BB; 
}

.receipt-content .invoice-wrapper .payment-info strong {
  display: block;
  color: #444;
  margin-top: 3px; 
}

@media (max-width: 767px) {
  .receipt-content .invoice-wrapper .payment-info .text-right {
  text-align: left;
  margin-top: 20px; } 
}
.receipt-content .invoice-wrapper .payment-details {
  border-top: 2px solid #EBECEE;
  margin-top: 30px;
  padding-top: 20px;
  line-height: 22px; 
}


@media (max-width: 767px) {
  .receipt-content .invoice-wrapper .payment-details .text-right {
  text-align: left;
  margin-top: 20px; } 
}
.receipt-content .invoice-wrapper .line-items {
  margin-top: 40px; 
}
.receipt-content .invoice-wrapper .line-items .headers {
  color: #A9B0BB;
  font-size: 13px;
  letter-spacing: .3px;
  border-bottom: 2px solid #EBECEE;
  padding-bottom: 4px; 
}
.receipt-content .invoice-wrapper .line-items .items {
  margin-top: 8px;
  border-bottom: 2px solid #EBECEE;
  padding-bottom: 8px; 
}
.receipt-content .invoice-wrapper .line-items .items .item {
  padding: 10px 0;
  color: #696969;
  font-size: 15px; 
}
@media (max-width: 767px) {
  .receipt-content .invoice-wrapper .line-items .items .item {
  font-size: 13px; } 
}
.receipt-content .invoice-wrapper .line-items .items .item .amount {
  letter-spacing: 0.1px;
  color: #84868A;
  font-size: 16px;
 }
@media (max-width: 767px) {
  .receipt-content .invoice-wrapper .line-items .items .item .amount {
  font-size: 13px; } 
}

.receipt-content .invoice-wrapper .line-items .total {
  margin-top: 30px; 
}

.receipt-content .invoice-wrapper .line-items .total .extra-notes {
  float: left;
  width: 40%;
  text-align: left;
  font-size: 13px;
  color: #7A7A7A;
  line-height: 20px; 
}

@media (max-width: 767px) {
  .receipt-content .invoice-wrapper .line-items .total .extra-notes {
  width: 100%;
  margin-bottom: 30px;
  float: none; } 
}

.receipt-content .invoice-wrapper .line-items .total .extra-notes strong {
  display: block;
  margin-bottom: 5px;
  color: #454545; 
}

.receipt-content .invoice-wrapper .line-items .total .field {
  margin-bottom: 7px;
  font-size: 14px;
  color: #555; 
}

.receipt-content .invoice-wrapper .line-items .total .field.grand-total {
  margin-top: 10px;
  font-size: 16px;
  font-weight: 500; 
}

.receipt-content .invoice-wrapper .line-items .total .field.grand-total span {
  color: #20A720;
  font-size: 16px; 
}

.receipt-content .invoice-wrapper .line-items .total .field span {
  display: inline-block;
  margin-left: 20px;
  min-width: 85px;
  color: #84868A;
  font-size: 15px; 
}

.receipt-content .invoice-wrapper .line-items .print {
  margin-top: 50px;
  text-align: center; 
}



.receipt-content .invoice-wrapper .line-items .print a i {
  margin-right: 3px;
  font-size: 14px; 
}

.receipt-content .footer {
  margin-top: 40px;
  margin-bottom: 110px;
  text-align: center;
  font-size: 12px;
  color: #969CAD; 
}                    
</style>


