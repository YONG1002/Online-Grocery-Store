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
	
		<legend><b style="font-size:30px;background-color:#ffcc00;border:5px solid black;">Add New Admin Detail</b></legend>
		<form name="addnewfrm" method="post" action="" enctype="multipart/form-data">
			
			<p>Admin Name:<input type="text" name="Name" required>
			<p>Admin Password:<input type="text" name="Password" required>
			<p>Admin email:<input type="text" name="email" required>
				  
						  
			<p>Admin Picture:</p>
			<input type="file" name="choosefile" value="" size="50" />
			
			<br><br>			
			<p><input type="submit" name="savebtn" value="Save Admin">

		</form>

		<input type="button" value="Back to main" onclick="location='tablesadmin.php'">
		<br>
		
		</fieldset>
</body>
</html>

<?php
$msg="";


if(isset($_POST["savebtn"])) 	
{
	echo"<pre>",print_r($_FILES['choosefile']['name']),"</pre>";
	
	$Name=$_POST["Name"];
	$Password=$_POST["Password"];
	$email=$_POST["email"];

	$admin_img=time() . '_' . $_FILES['choosefile']['name'];


	$target='profile_img/' . $admin_img;
	if(move_uploaded_file($_FILES['choosefile']['tmp_name'],$target))
	{
		$msg = "Upload Sucessfully";
		
	} else{
		$msg = "Failed to upload";
	}
	
	
	$result=mysqli_query($connect,"SELECT * FROM admin WHERE email='$email'");
	
	$count=mysqli_num_rows($result);
	
	if($count!=0)
	{
		?>
		<script>
		alert("The email is already in use.Please change");
		</script>
		<?php
	}
	else
	{
		mysqli_query($connect,"INSERT INTO admin(Name,Password,email,admin_img)VALUES('$Name','$Password','$email','$admin_img')");
		?>
		<script>
		alert("Record saved!");
		</script>
		<?php
	}
	

}

?>

