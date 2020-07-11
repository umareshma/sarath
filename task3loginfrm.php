
<?php 
if(isset($_POST['submit'])){
	$user=$_POST['username'];
	$pass=$_POST['pass'];
	if(($user=="hari")&&($pass=="5393")){
     echo "<script>location.href='task3form.php'</script>";
	
	
	}
	
	else{
	echo "<script>alert('user &password not correct')</script>";
	
}
}
?>
<html>
<body>
<div>
 
<form action="task3loginfrm.php" method="post">
 Enter your User_ID :<input type="text" name="username">
 <br>
 Enter Password: <input type="password" name="pass">
 <input type="submit" name="submit" >
 </form>

 </body>
</html>

