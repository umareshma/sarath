<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "hi";
if(isset($_POST["submit"])) {
$conn =  mysqli_connect($servername, $username, $password, $database );
if (!$conn){
  echo("connection failed: " .mysqli_error());

 
} 

$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$conformpassword=$_POST['conformpassword'];

$sql = "INSERT INTO hello(USER_NAME,EMAIL_ID,PASSWORD,CONFORM_PASSWORD) value('$name','$email','$password','$conformpassword')";

if (mysqli_query($conn,$sql)){
	echo "TABLE hello connected";
	
}
else{
	echo "notconnected".mysqli_error($conn);
}
mysqli_close($conn);  
}


?>  