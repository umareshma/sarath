
<?php

//define variable  set to empty values
$nameErr = $emailErr = $passwordErr = $conformpasswordErr = "";
$name = $email = $password = $conformpassword = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = htmlspecialchars($_REQUEST['name']);
	//name check //
	if(empty($_POST['name'])){
		$nameErr = "name is required";		
	}
	else{
		$name = $_POST['name'];
		if(!preg_match("/^[a-zA-z ]*$/",$name)){
			$nameErr = "only letter and white sapce allowed";
		}
	}
	//email check //
	if(empty($_POST['email'])){
		$emailErr = "email is required";		
	}
	else{
		$email = $_POST['email'];
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$emailErr = "Inavalid email format";
		}
		//password check //
	}
	if(empty($_POST['password'])){
		$passwordErr = "password is required";		
	}
	else{
		$password = $_POST['password'];
	}
	//conformpassword check //
	if(empty($_POST['conformpassword'])){
		$conformpasswordErr = "conformpassword is required";		
	}
	else{
		$conformpassword = $_POST['conformpassword'];
		if($_POST['password']!= $_POST['conformpassword']){
		$conformpasswordErr = "password not equel to same";
	}
	}
	}
	$thispage = htmlspecialchars($_SERVER['PHP_SELF']);
	
 
 ?>
 
<html>

<body>

<p><span >* required failed</span></p>
<form method="POST" action="<?= $thispage ?>">

UserName: <input type="text" name="name">
<span >* <?php echo $nameErr;?></span><br>

Email: <input type="text" name="email">
<span >* <?php echo $emailErr;?></span><br>
password: <input type="password" name="password">
<span >* <?php echo $passwordErr;?></span><br>

confirmpassword: <input type="password" name="conformpassword">
<span >* <?php echo $conformpasswordErr;?></span><br>

<input type="submit" name="submit" value="submit"><br>
</form>

<?php include 'task3.php';?>
<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $password ;
echo "<br>";

echo $conformpassword;
?>


</body>
</html>



