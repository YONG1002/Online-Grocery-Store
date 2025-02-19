<?php include("dataconnection.php");
session_start();










 ?>
 

<html>
<head>

</head>
<style>
body{

	background: linear-gradient(to right, #F0F2F0, #000C40);
}
p{
	font-size: 25px;
	
}
input{
	width: 40%;
	height: 20px;
	background: #e0dede;
	justify-content: center;
	display: flex;
	
	padding: 20px;
	border: none;
	outline: none;
	border-radius: 5px;
	
}

button,select{
	width: 60%;
	height: 40px;
	margin: 10px auto;
	justify-content: center;
	display: block;
	color: #fff;
	background: #0b8793;
	font-size: 1em;
	font-weight: bold;
	margin-top: 20px;
	outline: none;
	border: none;
	border-radius: 5px;
	transition: .2s ease-in;
	cursor: pointer;

}
button:hover{
	background: #360033;
}
</style>
<body>



		<fieldset style="background-color:#ffcc00;border:5px solid black;width:80%;">
	
		<legend><b style="font-size:30px;background-color:#ffcc00;border:5px solid black;">Add New Product Detail</b></legend>
		<form name="addnewfrm" method="post" action="" enctype="multipart/form-data">
			
			<p>Product_Name:<input type="text" name="Product_Name" >
			<p>Product_code:<input type="text" name="Product_code" >
			<p>Price:<input type="text" name="Price">
			<p>Product_Quantity:<input type="number"  min="1" max="9999" name="Product_Quantity">
			
			<div style="margin-left:45%;margin-top:-30%;">
			<p>Brand:<input type="text" name="Brand">
			
			
			<p ><label>Description:</label></p><textarea  cols="40" rows="4" name="Description"></textarea>
			
			<p>Status:</p><select name="Status" style="width: 60%;height: 40px;margin: 10px auto;">
								<option  >Please Select </option>
								<option value="in_stock ">in stock </option>
								<option value="out_of_stock">out of stock</option>
			                  </select>
							  
			<p>Category:</p><select name="category" style="width: 60%;height: 40px;margin: 10px auto;">
								<option  >Please Select </option>
								<option value="1 ">Fresh</option>
								<option value="2">Groceries</option>
								<option value="3">Household</option>
								<option value="4">Drinks</option>
			                  </select>				  
			</div>				  
			<p>Product Picture:</p>
			<input type="file" name="choosefile" value="" size="50"/>
			
			<br><br>			
			<p><input type="submit" name="savebtn" value="Save Product">

		</form>

		<input type="button" value="Back to main" onclick="location='tablesproduct.php'">
		<br>
		
		</fieldset>
</body>
</html>

<?php
$msg="";


if(isset($_POST["savebtn"])) 	
{
	echo"<pre>",print_r($_FILES['choosefile']['name']),"</pre>";
	
	$Product_Name=$_POST["Product_Name"];
	$Product_code=$_POST["Product_code"];
	$Price=$_POST["Price"];
	$Product_Quantity=$_POST["Product_Quantity"];
	$Brand=$_POST["Brand"];
	$Description=$_POST["Description"];
	$Status=$_POST["Status"];
	$category=$_POST["category"];
	$Admin_Id=$_SESSION['id'];
	$Product_img=time() . '_' . $_FILES['choosefile']['name'];


	$target='image/' . $Product_img;
	if(move_uploaded_file($_FILES['choosefile']['tmp_name'],$target))
	{
		$msg = "Upload Sucessfully";
		
	} else{
		$msg = "Failed to upload";
	}
	
	
	$result=mysqli_query($connect,"SELECT * FROM product WHERE Product_code='$Product_code'");
	
	$count=mysqli_num_rows($result);
	
	if($count!=0)
	{
		?>
		<script>
		alert("The product code is already in use.Please change");
		</script>
		<?php
	}
	else
	{
		mysqli_query($connect,"INSERT INTO product(Product_Name,Product_code,Price,Product_Quantity,Brand,Description,Category_Id,Admin_Id,Status,Product_img)VALUES('$Product_Name','$Product_code','$Price','$Product_Quantity','$Brand','$Description','$category','$Status','$Product_img')");
		?>
		<script>
		alert("Record saved!");
		</script>
		<?php
	}
	

}

?>

