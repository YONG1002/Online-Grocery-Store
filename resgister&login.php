<?php
session_start();
include("dataconnection.php");
$error="";

if(isset($_GET["submitbtn"]))
{
	$cust_name=$_GET["cust_name"];
	$cust_password=$_GET["cust_password"];
	$cust_email=$_GET["cust_email"];
	$confirm_password=$_GET["confirm_password"];
		
	$errors=array();
	
	$checkUser="SELECT * from customer where cust_email='$cust_email'";
	$result=mysqli_query($connect,$checkUser);
	$count=mysqli_num_rows($result);
	
	$checkname="SELECT * from customer where cust_name='$cust_name'";
	$result2=mysqli_query($connect,$checkname);
	$count2=mysqli_num_rows($result2);
	
	
	
	if($count>0)
	{
		$errors['e']="email already Using!!!";
		?>
		<script>
		alert("User already signed up,Please Using another email!");
		</script>
		<?php
	
	
	}
	else if($count2>0)
	{
		$errors['n']="nickname already Using!!!	";
		?>
		<script>
		alert("User already signed up,Please Using another Name!");
		</script>
		<?php
	
	}
	else
	{
		$sql=mysqli_query($connect,"INSERT INTO customer(cust_name,cust_password,cust_email,confirm_password)VALUES('$cust_name','$cust_password','$cust_email','$confirm_password')");
		
		?>
		<script>
		alert("User successful added");
		</script>
		<?php
		if($connect->query($sql))
		{
		
		}


	}
		
}	



if(isset($_GET["loginbtn"]))
{
	if(empty($_GET["c_email"])|| empty($_GET["c_password"]))
	{
		$error="<br>email or password is empty";
	}
	else
	{
		$cust_email=$_GET["c_email"];
		$cust_password=$_GET["c_password"];
		
		$cust_email=mysqli_real_escape_string($connect,$cust_email);
		$cust_password=mysqli_real_escape_string($connect,$cust_password);
		
		$result=mysqli_query($connect,
		"SELECT * FROM customer WHERE cust_email='$cust_email' AND cust_password='$cust_password'");
		
		$count=mysqli_num_rows($result);
		
		if($count==1)
		{
			$row=mysqli_fetch_assoc($result);
			$_SESSION["id"]=$row["Customer_Id"];
			header("location:lobby.php");
		}
		else
		{
			?>
		<script>
		alert("wrong email or password!");
		</script>
		<?php
		}
	}
}
	

?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Customer Form</title>
  
</head>
<style>
body{
	margin: 0;
	padding: 0;
	display: flex;
	justify-content: center;
	align-items: center;
	min-height: 100vh;
	font-family: 'Jost', sans-serif;
	background: linear-gradient(to bottom, #360033, #0b8793);
}
.main{
	width: 950px;
	height: 800px;
	background: red;
	overflow: hidden;
	background: url("https://doc-08-2c-docs.googleusercontent.com/docs/securesc/68c90smiglihng9534mvqmq1946dmis5/fo0picsp1nhiucmc0l25s29respgpr4j/1631524275000/03522360960922298374/03522360960922298374/1Sx0jhdpEpnNIydS4rnN4kHSJtU1EyWka?e=view&authuser=0&nonce=gcrocepgbb17m&user=03522360960922298374&hash=tfhgbs86ka6divo3llbvp93mg4csvb38") no-repeat center/ cover;
	border-radius: 10px;
	box-shadow: 5px 20px 50px #000;
}
#chk{
	display: none;
}
.signup{
	position: relative;
	width:100%;
	height: 100%;
	
}
label{
	color: #fff;
	font-size: 2.3em;
	justify-content: center;
	display: flex;
	margin: 60px;
	font-weight: bold;
	cursor: pointer;
	transition: .5s ease-in-out;
}
input{
	width: 40%;
	height: 20px;
	background: #e0dede;
	justify-content: center;
	display: flex;
	margin: 20px auto;
	padding: 20px;
	border: none;
	outline: none;
	border-radius: 5px;
	
}
button{
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
.login{
	height: 460px;
	background: #eee;
	border-radius: 60% / 10%;
	transform: translateY(-180px);
	transition: .8s ease-in-out;
}
.login label{
	color: #360033;
	transform: scale(.6);
}

#chk:checked ~ .login{
	transform: translateY(-500px);
}
#chk:checked ~ .login label{
	transform: scale(1);	
}
#chk:checked ~ .signup label{
	transform: scale(.6);
}

#message,#msg{margin-left:30%;}

.true {
  color: green;
}

.false {
  color: red;
}

</style>

<script>




var rer = function() {
	
	var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");
	
	 if(password.value != confirm_password.value)
	 {
		confirm_password.setCustomValidity("Passwords Don't Match");
	}else {
    confirm_password.setCustomValidity('');
  }

	
	
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'white';
    document.getElementById('message').innerHTML = 'Matching';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Not Matching';
  }
  
  
  
  
}

function check()
{
	var myInput = document.getElementById("password");
var lt = document.getElementById("lt");
var cp = document.getElementById("cp");
var num = document.getElementById("num");
var length = document.getElementById("length");

// When the user clicks on the password field, show the msg box
myInput.onfocus = function() {
  document.getElementById("msg").style.display = "block";
}

// When the user clicks outside of the password field, hide the msg box
myInput.onblur = function() {
  document.getElementById("msg").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {
    lt.classList.remove("false");
    lt.classList.add("true");
  } else {
    lt.classList.remove("true");
    lt.classList.add("false");
}

  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {
    cp.classList.remove("false");//if yes print "true" then remove "false"
    cp.classList.add("true");
  } else {
    cp.classList.remove("true");//if no print "false" then remove "true" 
    cp.classList.add("false");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {
    num.classList.remove("false");
    num.classList.add("true");
  } else {
    num.classList.remove("true");
    num.classList.add("false");
  }

  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("false");
    length.classList.add("true");
  } else {
    length.classList.remove("true");
    length.classList.add("false");
  }
}
}



</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<body>

<!DOCTYPE html>
<html>
<head>
	<title>Customer Form</title>
	
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form name="user_form" method="GET" action="">
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="cust_name" placeholder="User name" onclick="check()" required autocomplete="off"> 
					<p style="color:red;margin-left:30%;"><?php if(isset($errors['n'])) echo $errors['n']; ?></p>
					<input type="email" name="cust_email" placeholder="Email" onclick="check()" required autocomplete="off">
					<p style="color:red;margin-left:30%;"><?php if(isset($errors['e'])) echo $errors['e']; ?></p>
					
					
					<input onclick="check()" onclick="rer()" id="password" required  type="password" name="cust_password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  placeholder="Password" required autocomplete="off" />
					
					
					
					<div id="msg">
					  <p id="lt" class="false">&#10004; A <b>lowercase</b> letter</p>
					  <p id="cp" class="false">&#10004;A <b>capital (uppercase)</b> letter</p>
					  <p id="num" class="false">&#10004;A <b>number</b></p>
					  <p id="length" class="false">&#10004;Minimum <b>8 characters</b></p>
					</div>

					
					<input id="confirm_password" required onclick="rer()" type="password" name="confirm_password" placeholder="Confirm Password" required />
					<span  id='message'></span>
					<button type="submit" value="Send!" name="submitbtn" onclick="check()">Sign up</button>

				</form>
			</div>

			<div class="login">
				<form>
					<label for="chk" aria-hidden="true">Login</label>
					<input type="email" name="c_email" placeholder="Email" required="">
					<input type="password" name="c_password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required="">
					<p style="color:red;margin-left:30%;"><?php if(isset($errors['lp'])) echo $errors['lp']; ?></p>
					
					<a href="change.php" style="color:red;margin-left:30%;font-style: italic;">Forget Password?</a>
					<button type="submit" value="Send!" name="loginbtn" onclick="check()">Login</button>
				</form>
			</div>
	</div>
</body>
</html>

  
</body>
</html>




