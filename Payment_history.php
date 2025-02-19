<?php include("dataconnection.php");
session_start();


			
			
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
 
  <title>
    Payment History
  </title>
 
  
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="css/shikeongOderhistory-material-dashboard.css?v=3.0.0" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-200">
  
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
		  
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Payment History</h6>
				<a href="tablespayment.php" class="text-white text-capitalize ps-3">Back to Main</a>
				<form name="search_form" method="GET" action="">
			<div style="margin-left:1%;">
			<input class="border" type="text" name="searchname" placeholder="2022-03-10 23:45:34">
			
			<input class="button" type="submit" value="Search Date" name="searchbtn">
			</div>
			
			
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th style="color:black;text-align:center;text-center;">Payment Id</th>
                      <th style="color:black;text-align:center;text-center;">Payment Amount</th>
                      <th style="color:black;text-align:center;text-center;">Payment Method</th>
					  <th style="color:black;text-align:center;text-center;">cardnum</th>
					  <th style="color:black;text-align:center;text-center;">shipping price</th>
					  <th style="color:black;text-align:center;text-center;">Subtotal</th>
					  <th style="color:black;text-align:center;text-center;">Customer name</th>
					  <th style="color:black;text-align:center;text-center;">phone</th>
					  <th style="color:black;text-align:center;text-center;">email</th>
					  <th style="color:black;text-align:center;text-center;">card expdate</th>
					  <th style="color:black;text-align:center;text-center;">cvv</th>
					  <th style="color:black;text-align:center;text-center;">Address</th>
					  <th style="color:black;text-align:center;text-center;">Order Id</th>
					  <th style="color:black;text-align:center;text-center;">Shipping Id</th>
					  <th style="color:black;text-align:center;text-center;">Payment time</th>
					  
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
      <?php
        if(isset($_GET["searchbtn"]))
				{
					$result=$_GET["searchname"];
					$search=mysqli_query($connect,"SELECT * from payment WHERE Payment_time like '%$result%'");
					if(mysqli_num_rows($search)==0)
					{
						?>
						  <tbody>
								  <tr>
									 <td class="align-middle text-center">
										<?php echo " Result could not be found !"; ?>
									  </td>
									</tr>
						  </tbody>
					<?php
				  }
				  else
				  {
					  while($row2=mysqli_fetch_assoc($search))
						{
							?>
                <tbody>
				        <tr>
                     <td style="color:black;text-align:center;text-center;">
                        <?php echo  $row2['Payment_Id']; ?>
                      </td>
                      <td style="color:black;text-align:center;text-center;">
                        <?php echo  $row2['Payment_Amount']; ?>
                      </td>
                       <td style="color:black;text-align:center;text-center;">
                        <?php echo  $row2['Payment_Method']; ?>
                      </td>
					  <td style="color:black;text-align:center;text-center;">
                        <?php echo  $row2['cardnum']; ?>
                      </td>
					  <td style="color:black;text-align:center;text-center;">
                        <?php echo  $row2['shipping_price']; ?>
                      </td>
					  <td style="color:black;text-align:center;text-center;">
                        <?php echo  $row2['Subtotal']; ?>
                      </td>
					  <td style="color:black;text-align:center;text-center;">
                        <?php echo  $row2['cus_name']; ?>
                      </td>
					  <td style="color:black;text-align:center;text-center;">
                        <?php echo  $row2['phone']; ?>
                      </td>
					  <td style="color:black;text-align:center;text-center;">
                        <?php echo  $row2['email']; ?>
                      </td>
					  <td style="color:black;text-align:center;text-center;">
                        <?php echo  $row2['card_expdate']; ?>
                      </td>
					  <td style="color:black;text-align:center;text-center;">
                        <?php echo  $row2['cvv']; ?>
                      </td>
					  <td style="color:black;text-align:center;text-center;">
                        <?php echo  $row2['Address']; ?>
                      </td>
					  <td style="color:black;text-align:center;text-center;">
                        <?php echo  $row2['Order_Id']; ?>
                      </td>
					  <td style="color:black;text-align:center;text-center;">
                        <?php echo  $row2['Shipping_Id']; ?>
                      </td>
					  <td style="color:black;text-align:center;text-center;">
                        <?php echo  $row2['Payment_time']; ?>
                      </td>
                      
					  <input type="hidden" name="cusid" value="<?php echo $row2['Customer_Id'];?>" />
                      
                    </tr>
                  </tbody>
				  <?php
				  }
					  
				  }
        }
				else
        {
          if(isset($_GET["history"]))
					{
					$Customer_Id = $_GET["id"];				
					$result2 = mysqli_query($connect,"SELECT * from payment WHERE Customer_Id='$Customer_Id'");

						while($row2=mysqli_fetch_assoc($result2))
						{
							?>
                <tbody>
				        <tr>
                     <td style="color:black;text-align:center;text-center;">
                        <?php echo  $row2['Payment_Id']; ?>
                      </td>
                      <td style="color:black;text-align:center;text-center;">
                        <?php echo  $row2['Payment_Amount']; ?>
                      </td>
                       <td style="color:black;text-align:center;text-center;">
                        <?php echo  $row2['Payment_Method']; ?>
                      </td>
					  <td style="color:black;text-align:center;text-center;">
                        <?php echo  $row2['cardnum']; ?>
                      </td>
					  <td style="color:black;text-align:center;text-center;">
                        <?php echo  $row2['shipping_price']; ?>
                      </td>
					  <td style="color:black;text-align:center;text-center;">
                        <?php echo  $row2['Subtotal']; ?>
                      </td>
					  <td style="color:black;text-align:center;text-center;">
                        <?php echo  $row2['cus_name']; ?>
                      </td>
					  <td style="color:black;text-align:center;text-center;">
                        <?php echo  $row2['phone']; ?>
                      </td>
					  <td style="color:black;text-align:center;text-center;">
                        <?php echo  $row2['email']; ?>
                      </td>
					  <td style="color:black;text-align:center;text-center;">
                        <?php echo  $row2['card_expdate']; ?>
                      </td>
					  <td style="color:black;text-align:center;text-center;">
                        <?php echo  $row2['cvv']; ?>
                      </td>
					  <td style="color:black;text-align:center;text-center;">
                        <?php echo  $row2['Address']; ?>
                      </td>
					  <td style="color:black;text-align:center;text-center;">
                        <?php echo  $row2['Order_Id']; ?>
                      </td>
					  <td style="color:black;text-align:center;text-center;">
                        <?php echo  $row2['Shipping_Id']; ?>
                      </td>
					  <td style="color:black;text-align:center;text-center;">
                        <?php echo  $row2['Payment_time']; ?>
                      </td>
                      
					  
                      
                    </tr>
                  </tbody>
				  <?php
				  }
				}
        }  
				  
	?>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="material-icons py-2">settings</i>
    </a>
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Material UI Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="material-icons">clear</i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds -->
       
        
        <div class="mt-2 d-flex">
          <h6 class="mb-0">Light / Dark</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>
        <hr class="horizontal dark my-sm-4">
		<?php
if(isset($_GET["searchbtn"]))
				{		
		$Customer_Id =$_GET["cusid"];
		$Customer_Id=$_GET['id'];				
		$result = mysqli_query($connect,"SELECT * from order_process WHERE Customer_Id='$Customer_Id'");
		$row=mysqli_fetch_assoc($result);
				}
		?>
        <a href="tablespayment.php">Back to Record</a>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  
 
  <script src="js/shikeongOderhistory-perfect-scrollbar.min.js"></script>
  
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  </form>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="js/shikeongOderhistory-material-dashboard.min.js?v=3.0.0"></script>
</body>

</html>