<html>
<body>

 <h2><a href = "task3form.php"> "SIGNIN"</a></h2>
<form action="task3loginfrm.php" method="post">
 Enter your User_ID :<input type="text" name="username">
 <br>
 Enter Password: <input type="password" name="password">
 <br>
 <input type="submit" name="submit" value="Login">
 </form>

 </body>
</html>

<?php 
if(isset($_POST['submit'])){
	$user=$_POST['username'];
	$password=$_POST['password'];
	if(($user=="hari")&&($password=="5393")){
		echo"welcome hari";

	}
	
	else{
		echo"invalid user name password";
}
}
?>
		