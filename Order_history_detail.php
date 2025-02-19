<?php include("dataconnection.php"); 
session_start();

if(isset($_GET["view"]))
{
	$Order_Id=$_GET["id"];		
	$result = mysqli_query($connect,"SELECT * from order_details WHERE Order_Id='$Order_Id'");
	$row = mysqli_fetch_assoc($result);
}

		    



?>

<!DOCTYPE html>
<html>

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="css/shikeongcart-bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="css/shikeongcart-font-awesome.min.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700">
    <!-- owl carousel-->
    <link rel="stylesheet" href="css/shikeongcart-owl.carousel.css">
    <link rel="stylesheet" href="css/shikeongcart-owl.theme.default.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/shikeongcart-style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/shikeongcart-custom.css">
    <!-- Favicon-->
    
	<!-- socail icon-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <script type="text/javascript">

function confirmation()
{
	var option;
	option=confirm("Do you want to delete this product?");
	return option;
}

</script>
  <style>
.fa {
  padding: 20px;
  font-size: 10px;
  width:30px;
  text-align: center;
  text-decoration: none;
  margin: 5px 3px;
  border-radius: 50%;
}

.fa:hover {
    opacity: 0.7;
}

.fa-facebook {
  background: #3B5998;
  color: white;
}

.fa-twitter {
  background: #55ACEE;
  color: white;
}
.fa-linkedin {
  background: #007bb5;
  color: white;
}

.fa-youtube {
  background: #bb0000;
  color: white;
}

.fa-instagram {
  background: #125688;
  color: white;
}
  </style>
  <body>
    <!-- navbar-->
    <header class="header mb-5">
     
      
      
      <div id="search" class="collapse">
        <div class="container">
          <form role="search" class="ml-auto">
            <div class="input-group">
              <input type="text" placeholder="Search" class="form-control">
              <div class="input-group-append">
                <button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </header>
    <div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <!-- breadcrumb-->
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
				<?php 
				
					$Order_Id=$_GET["id"];		
					$result = mysqli_query($connect,"SELECT * from order_details WHERE Order_Id='$Order_Id'");
					$row = mysqli_fetch_assoc($result);
				?>
				
                  <li class="breadcrumb-item"><a href="order_history.php?history&id=<?php echo $row["Customer_Id"]; ?>">History Details</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Order Cart</li>
                </ol>
              </nav>
            </div>
            <div id="basket" class="col-lg-9">
              <div class="box">
                <form method="get" name="user_form" action="">
                  <h1>Order cart</h1>
				  <?php 
				  
				  $Order_Id=$_GET["id"];
						$result_prod = mysqli_query($connect, "SELECT * from order_details WHERE Order_Id='$Order_Id'");	
						$count = mysqli_num_rows($result_prod); ?>
                  <p class="text-muted">You currently have <?php echo $count; ?> item(s) in your cart.</p>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th colspan="2">Product</th>
                          <th>Quantity</th>
                          <th>Unit price</th>
                          
                          <th >Total</th>
                        </tr>
                      </thead>
                      <tbody>
					  <?php
			if(isset($_GET["view"]))
			{
				$Order_Id=$_GET["id"];			
				$result = mysqli_query($connect,"SELECT * from order_details WHERE Order_Id='$Order_Id'");
			$_SESSION['Order_Id']=$Order_Id;
			 $subtotal=0;
			 while($row = mysqli_fetch_assoc($result))
				{
					
					$subtotal+= $row["all_total"];
				
				?>		
				<script>
					
					</script>
                        <tr>
						
                          <td><img src="image/<?php echo $row["Product_img"]; ?>" ></td>
                          <td><a href="#"><?php echo $row["Name"]; ?></a></td>
                          <td>
                            <input name="qty" type="text" min=0 value="<?php echo $row["Quantity"]; ?>" class="form-control" disabled>
                          </td>
                          <td>RM<?php echo $row["Price"]; ?></td>
                          
                          <td>RM<?php echo $row["all_total"]; ?></td>
                          </tr>
                      <?php	
				}
					$_SESSION['subtotal']=$subtotal;
				
			}
			?>
                      </tbody>
                      <tfoot>
					  
                        <tr>
                          <th colspan="4">Total</th>
						  
						  <?php 
						  
						  		$subtotal=$_SESSION['subtotal'];
								
								
						  ?>
                          <th ><p id="total">RM<?php echo $subtotal;?></p></th>
						 </tr> 
						 <tr>
						  <th colspan="3" >Date Order</th>
						  <?php 
						  
						  		$Order_Id=$_SESSION['Order_Id'];
								$datere = mysqli_query($connect,"SELECT * from shipping WHERE Order_Id='$Order_Id'");
								$date = mysqli_fetch_assoc($datere);
								
								
						  ?>
                          <th ><p ><?php echo $date["Date"];?></p></th>
						   </tr>
						    <tr>
						  <th colspan="3">Shipping_Address</th>
						  <?php 
						  
						  		
								
								
						  ?>
                          <th ><p ><?php echo $date["Shipping_Address"];?></p></th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  <!-- /.table-responsive-->
                  <div class="box-footer d-flex justify-content-between flex-column flex-lg-row">
				  <?php 
				  
						$Order_Id=$_SESSION['Order_Id'];
						$result = mysqli_query($connect,"SELECT * from order_details WHERE Order_Id='$Order_Id'");
						$row = mysqli_fetch_assoc($result);
						 ?>	
                    <div class="left"><a href="order_history.php?history&id=<?php echo $row["Customer_Id"]; ?>" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i> Back to Record</a></div>
                    <div class="right"><a href="downloadpdf.php?download&id=<?php echo $row["Customer_Id"];?>&orderid=<?php echo $Order_Id;?>" class="btn btn-primary"><i class="fa fa-chevron-right"></i> Download Receipt</a></div>
                     
						
                    </div>
                  </div>
                </form>
              
              <!-- /.box-->
              
            </div>
            <!-- /.col-lg-9-->
            <div class="col-lg-3">
              <div id="order-summary" class="box">
                <div class="box-header">
                  <h3 class="mb-0">Order summary</h3>
                </div>
                <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>
                <div class="table-responsive">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>Order subtotal</td>
                        <th>RM<?php echo $subtotal;?></th>
                      </tr>
                      <tr>
                        <td>Shipping and handling</td>
                        <th>RM10.00</th>
                      </tr>
                      <tr>
                        <td>Tax</td>
                        <th>$0.00</th>
                      </tr>
                      <tr class="total">
					  <?php $alltotal=$subtotal+10;?>
                        <td>Total</td>
                        <th>RM<?php echo $alltotal;?></th>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              
            </div>
            <!-- /.col-md-3-->
          </div>
        </div>
      </div>
    </div>
    <!--
    *** FOOTER ***
    _________________________________________________________
    -->
    <div id="footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <h4 class="mb-3">Pages</h4>
            <ul class="list-unstyled">
              <li><a href="text.html">About us</a></li>
              <li><a href="text.html">Terms and conditions</a></li>
              <li><a href="faq.html">FAQ</a></li>
              <li><a href="contact.html">Contact us</a></li>
            </ul>
            <hr>
            <h4 class="mb-3">User section</h4>
            <ul class="list-unstyled">
              <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a></li>
              <li><a href="register.html">Regiter</a></li>
            </ul>
          </div>
          <!-- /.col-lg-3-->
          <div class="col-lg-3 col-md-6">
            <h4 class="mb-3">Top categories</h4>
            <h5>Men</h5>
            <ul class="list-unstyled">
              <li><a href="category.html">T-shirts</a></li>
              <li><a href="category.html">Shirts</a></li>
              <li><a href="category.html">Accessories</a></li>
            </ul>
            <h5>Ladies</h5>
            <ul class="list-unstyled">
              <li><a href="category.html">T-shirts</a></li>
              <li><a href="category.html">Skirts</a></li>
              <li><a href="category.html">Pants</a></li>
              <li><a href="category.html">Accessories</a></li>
            </ul>
          </div>
          <!-- /.col-lg-3-->
          <div class="col-lg-3 col-md-6">
            <h4 class="mb-3">Where to find us</h4>
            <p><strong>Obaju Ltd.</strong><br>13/25 New Avenue<br>New Heaven<br>45Y 73J<br>England<br><strong>Great Britain</strong></p><a href="contact.html">Go to contact page</a>
            <hr class="d-block d-md-none">
          </div>
          <!-- /.col-lg-3-->
          <div class="col-lg-3 col-md-6">
            <h4 class="mb-3">Get the news</h4>
            <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
            <form>
              <div class="input-group">
                <input type="text" class="form-control"><span class="input-group-append">
                  <button type="button" class="btn btn-outline-secondary">Subscribe!</button></span>
              </div>
              <!-- /input-group-->
            </form>
            <hr>
            <h4 class="mb-3">Stay in touch</h4>
            
			<div style="">
			<a href="https://www.facebook.com/mmumalaysia" class="fa fa-facebook"></a>
			<a href="https://twitter.com/mmumalaysia" class="fa fa-twitter"></a>
			<a href="https://www.linkedin.com/school/21072/" class="fa fa-linkedin"></a>
			<a href="https://youtube.com/mmumalaysiatv" class="fa fa-youtube"></a>
			<a href="https://www.instagram.com/mmumalaysia/" class="fa fa-instagram"></a>
			</div>
          <!-- /.col-lg-3-->
        </div>
        <!-- /.row-->
      </div>
      <!-- /.container-->
    </div>
    <!-- /#footer-->
    <!-- *** FOOTER END ***-->
    
    
    <!--
    *** COPYRIGHT ***
    _________________________________________________________
    -->
    <div id="copyright" style="margin-bottom:-100px">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-2 mb-lg-0">
            <p class="text-center text-lg-left">©2022 Online Grocery Store.</p>
          </div>
          <div class="col-lg-6">
            
			
			<p class="text-center text-lg-right">design by <a href="https://www.mmu.edu.my">Multimedia University</a>
              <!-- If you want to remove this backlink, pls purchase an Attribution-free License @ https://bootstrapious.com/p/obaju-e-commerce-template. Big thanks!-->
            </p>
			
          </div>
        </div>
      </div>
    </div>
    <!-- *** COPYRIGHT END ***-->
    <!-- JavaScript files-->
    <script src="js/shikeongcart-jquery.min.js"></script>
    <script src="js/shikeongcart-bootstrap.bundle.min.js"></script>
    <script src="js/shikeongcart-jquery.cookie.js"> </script>
    <script src="js/shikeongcart-owl.carousel.min.js"></script>
    <script src="js/shikeongcart-owl.carousel2.thumbs.js"></script>
    <script src="js/shikeongcart-front.js"></script>
  </body>
</html>
<?php
mysqli_close($connect);
?>