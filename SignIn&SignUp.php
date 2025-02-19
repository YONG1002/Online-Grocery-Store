<?php
session_start();
include("dataconnection.php");
$error="";

if(isset($_GET["submitbtn"]))
{
	$admin_name=$_GET["name"];
	$admin_email=$_GET["email"];
	$admin_pass=$_GET["password"];
	$admin_con=$_GET["confirm_password"];
	
	$errors=array();
	
	$checkUser="SELECT * from admin where email='$admin_email'";
	$result=mysqli_query($connect,$checkUser);
	$count=mysqli_num_rows($result);
	
	if($count>0)
	{
		$errors['e']="Email already Using!!!";
		?>
		<script>
			alert("User already signed up, Please Using another Email !");
		</script>
		<?php
	}
	else
	{
		$sql=mysqli_query($connect,"INSERT INTO admin(Name,Password,email)VALUES('$admin_name','$admin_pass','$admin_email')");
		?>
		<script>
			alert("Record saved");
		</script>
		<?php
		if($connect->query($sql))
		{
			
		}
	}
}

if(isset($_GET["submit"]))
{
	if(empty($_GET["email"])|| empty($_GET["Password"]))
	{
		$error="<br>email or password is empty";
	}
	else
	{
		$email=$_GET["email"];
		$Password=$_GET["Password"];
		
		$name=mysqli_real_escape_string($connect,$name);
		$Password=mysqli_real_escape_string($connect,$Password);
		
		$result=mysqli_query($connect,
		"SELECT * FROM admin WHERE email='$email' AND Password='$Password'");
		
		$count=mysqli_num_rows($result);
		
		if($count==1)
		{
			$row=mysqli_fetch_assoc($result);
			$_SESSION["id"]=$row["admin_id"];
			header("location:dashboard.php");
		}
		else
		{
			$error="<br>Username and password is invalid";
			header("refresh:0.5; url='../pages/signin&signup.php'");
		}
	}
}
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	//something was posted
	$email = $_POST['email'];
	$Password = $_POST['Password'];
	
	if(!empty($email) && !empty($Password) && !is_numeric($email))
	{
		//read from database
		$query = "select * from admin where email = '".$email."' AND Password='".$Password."' limit 1";
		$result = mysqli_query($connect, $query);
		
		if($result)
		{
			if($result && mysqli_num_rows($result) > 0)
			{

				$user_data = mysqli_fetch_assoc($result);
				
				if($user_data['Password'] === $Password)
				{

					$_SESSION['admin_id'] = $user_data['admin_id'];
					header("Location:dashboard.php");
					die;
				}
			}
		}
		echo "<br>wrong username or password!";
	}else
	{
		echo "<br>wrong username or password!";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Sign In & Sign up</title>

<!-- Font-->
<link rel="stylesheet" type="text/css" href="css/sourcesanspro-font.css">
<!-- Main Style Css -->
<link rel="stylesheet" href="css/style.css"/>

<style>
.true 
{
	color: #00FF31;
}

.false
{
	color: red;
}

input::placeholder
{
	color: white;
}
</style>

<script>

var rer = function()
{
	
	var password = document.getElementById("password"), confirm_password = document.getElementById("confirm_password");
	
	if(password.value != confirm_password.value)
	{
		confirm_password.setCustomValidity("Passwords Don't Match");
	}
	else
	{
		confirm_password.setCustomValidity('');
	}
	
	if (document.getElementById('password').value == document.getElementById('confirm_password').value) 
	{
		document.getElementById('message').style.color = '#00FF31';
		document.getElementById('message').innerHTML = 'Match';
	}
	else
	{
		document.getElementById('message').style.color = 'red';
		document.getElementById('message').innerHTML = 'Not Match !!!';
	}
}
function check()
{
	
	var name, email;
	var name_pattern, email_pattern;
	
	var myInput = document.getElementById("password");
	var lt = document.getElementById("lt");
	var cp = document.getElementById("cp");
	var num = document.getElementById("num");
	var length = document.getElementById("length");
	var spec = document.getElementById("spec");
	
	name_pattern=/^[a-zA-Z\s]+$/;
	email_pattern=/^[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;
	
	name = document.register.name.value;
	email = document.register.email.value;

	// When the user clicks on the password field, show the msg box
	myInput.onfocus = function()
	{
		document.getElementById("msg").style.display = "block";
	}

	// When the user clicks outside of the password field, hide the msg box
	myInput.onblur = function()
	{
		document.getElementById("msg").style.display = "none";
	}

	// When the user starts to type something inside the password field
	myInput.onkeyup = function()
	{
		var lowerCaseLetters = /[a-z]/g;
		if(myInput.value.match(lowerCaseLetters))
		{
			lt.classList.remove("false");
			lt.classList.add("true");
		}
		else 
		{
			lt.classList.remove("true");
			lt.classList.add("false");
		}
		var upperCaseLetters = /[A-Z]/g;
		if(myInput.value.match(upperCaseLetters))
		{
			cp.classList.remove("false");//if yes print "true" then remove "false"
			cp.classList.add("true");
		} 
		else
		{
			cp.classList.remove("true");//if no print "false" then remove "true" 
			cp.classList.add("false");
		}
		var numbers = /[0-9]/g;
		if(myInput.value.match(numbers))
		{
			num.classList.remove("false");
			num.classList.add("true");
		}
		else
		{
			num.classList.remove("true");
			num.classList.add("false");
		}

		// Validate length
		if(myInput.value.length >= 8)
		{
			length.classList.remove("false");
			length.classList.add("true");
		}
		else
		{
			length.classList.remove("true");
			length.classList.add("false");
		}
		
		var special = /[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
		if(myInput.value.match(special))
		{
			spec.classList.remove("false");
			spec.classList.add("true");
		}
		else
		{
			spec.classList.remove("true");
			spec.classList.add("false");
		}
	}
	
	if(name=="" || !name.match(name_pattern))
	{
		document.getElementById("error_name").innerHTML=" * The Name Should Be Character";
	}
	else
	{
		document.getElementById("error_name").innerHTML="";
	}

	if(email=="" || !email.match(email_pattern))
	{
		document.getElementById("error_email").innerHTML=" * Please Enter Valid Email";
	}
	else
	{
		document.getElementById("error_email").innerHTML="";
	}
}
</script>
</head>
<body class="form-v8" style="background-color:#e91e63;">
	<div class="page-content" >
		<div class="form-v8-content"  style="width: 30%;">
			
			<div class="form-right" >
				<div class="tab">
					<div class="tab-inner">
						<button class="tablinks" onclick="openCity(event, 'sign-up')" id="defaultOpen">Sign Up</button>
					</div>
					<div class="tab-inner">
						<button class="tablinks" onclick="openCity(event, 'sign-in')">Sign In</button>
					</div>
				</div>
				<form class="form-detail" name="register" action="#" method="GET">
					<div class="tabcontent" id="sign-up">
						<div class="form-row">
							<label class="form-row-inner">
							
								<input type="text" name="name" placeholder="Username" id="full_name" class="input-text" pattern="[a-zA-Z\s]+" required />
								<p id="error_name" style="color:red;"></p>
		  						<span class="border"></span>
							</label>
						</div>
						<div class="form-row">
							<label class="form-row-inner">
							<input type="email" name="email" placeholder="E-Mail" id="your_email_1" class="input-text" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}" required autocomplete="off" />
		  						<p id="error_email" style="color:red;"></p>
								<span class="border"></span>
							</label>
						</div>
						<div class="form-row">
							<label class="form-row-inner">
							<input onclick="check()" onclick="rer()" id="password"  type="password" name="password" placeholder="Password" class="input-text" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number, a special character, one uppercase and lowercase letter, and at least 8 or more characters" required autocomplete="off" />
								<div id="msg">
								<p id="lt" class="false">&#10004; A <b>Lowercase</b> Letter</p>
								<p id="cp" class="false">&#10004;A <b>Uppercase</b> Letter</p>
								<p id="spec" class="false">&#10004;A <b>Special </b> Character</p>
								<p id="num" class="false">&#10004;A <b>Number</b></p>
								<p id="length" class="false">&#10004;Minimum <b>8 Characters</b></p>
								</div>
								<span class="border"></span>
							</label>
						</div>
						<div class="form-row">
							<label class="form-row-inner">
							<input onclick="rer()" id="confirm_password" type="password" name="confirm_password" placeholder="Confirm Password" class="input-text" required autocomplete="off" />
								<span id="message"></span>
								<span class="border"></span>
							</label>
						</div>
						<div class="form-row-last" style="text-align: center">
							<input type="submit" name="submitbtn" class="register" value="Register" onclick="check()">
						</div>
					</div>
				</form>
				
				<form class="form-detail" name="login_form" action="#" method="POST">
					<div class="tabcontent" id="sign-in">
						<div class="form-row">
							<label class="form-row-inner">
								<input type="email" name="email" placeholder="E-Mail" id="your_email_1" class="input-text" required />
		  						<span class="border"></span>
							</label>
						</div>
						<div class="form-row">
							<label class="form-row-inner">
								<input type="password" name="Password" placeholder="Password" id="password_1" class="input-text" required />
								<span class="border"></span>
							</label>
						</div>
						<div class="form-row-last" style="text-align: center">
							<input type="submit" name="submit" class="register" value="Sign In" onclick="login()">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function openCity(evt, cityName) {
		    var i, tabcontent, tablinks;
		    tabcontent = document.getElementsByClassName("tabcontent");
		    for (i = 0; i < tabcontent.length; i++) {
		        tabcontent[i].style.display = "none";
		    }
		    tablinks = document.getElementsByClassName("tablinks");
		    for (i = 0; i < tablinks.length; i++) {
		        tablinks[i].className = tablinks[i].className.replace(" active", "");
		    }
		    document.getElementById(cityName).style.display = "block";
		    evt.currentTarget.className += " active";
		}

		// Get the element with id="defaultOpen" and click on it
		document.getElementById("defaultOpen").click();
	</script>
	
<?php
mysqli_close($connect);
?>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>