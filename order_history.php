<?php include("dataconnection.php");
session_start();


			
			
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
 
  <title>
    Order History
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
                <h6 class="text-white text-capitalize ps-3">Order History</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th style="color:black;text-align:center;text-center;">Order ID</th>
                      
                      <th style="color:black;text-align:center;text-center;">Order Price</th>
                      <th style="color:black;text-align:center;text-center;">Order Date</th>
					  <th style="color:black;text-align:center;text-center;">Action</th>
					  
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
				  <?php
				  if(isset($_GET["history"]))
					{
					 $Customer_Id = $_GET["id"];				
					$result = mysqli_query($connect,"SELECT * from order_process WHERE Customer_Id='$Customer_Id'");
					}
	while($row=mysqli_fetch_assoc($result))
	{
	?>
                  <tbody>
				  <tr>
                     <td style="color:black;text-align:center;text-center;">
                        <?php echo  $row['Order_Id']; ?>
                      </td>
                      <td style="color:black;text-align:center;text-center;">
                        <?php echo  $row['subtotal']; ?>
                      </td>
                       <td style="color:black;text-align:center;text-center;">
                        <?php echo  $row['Order_date']; ?>
                      </td>
                      
					  <td style="color:black;text-align:center;text-center;">
                        <a style="color:black;text-align:center;text-center;font-size: 12px;" href="Order_history_detail.php?view&id=<?php echo $row['Order_Id'];?>">
							View </a>
                      </td>
                      
                    </tr>
                  </tbody>
				  <?php
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
		
		$Customer_Id=$_SESSION['id'];				
		$result = mysqli_query($connect,"SELECT * from order_process WHERE Customer_Id='$Customer_Id'");
		$row=mysqli_fetch_assoc($result);
		?>
        <a href="tablesorder.php">Back to Record</a>
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
  
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="js/shikeongOderhistory-material-dashboard.min.js?v=3.0.0"></script>
</body>

</html>