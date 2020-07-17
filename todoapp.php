
<?php 

include 'de1.php';

 if(isset($_POST['submit'])) {
	$id = $_POST['id'];
	$task = $_POST['task'];
	mysqli_query($conn,"INSERT INTO sarath(ID,USER_NAME) VALUES ('$id','$task')");
  
 }
 if(isset($_POST['del'])) {
	 $task = $_POST['task'];
	$id = $_POST['id'];
	mysqli_query($conn, "DELETE FROM sarath WHERE id='$id'");
	

 }
 if(isset($_POST['edit'])) {
	 $task = $_POST['task'];
	$id = $_POST['id'];
	mysqli_query($conn, "UPDATE sarath SET USER_NAME='$task' WHERE id='$id'");	

 }
  $todo = mysqli_query($conn, "SELECT * FROM sarath");
 
  ?>
 
<html>
<body>
<h1> TO DO APP LIST<h1>
<form method="post" action="<?php $_SERVER["PHP_SELF"] ?>">
<input type="text" name="id" >
<input type="text" name="task" >

<button type="submit" name="submit">Add</button>
<button type="del" name="del" >x</button>
<button type="edit" name="edit" >@</button>
</form>
<?php while ($row = mysqli_fetch_array($todo)){ ?>
<?php echo $row['ID'];?>
<?php echo $row['USER_NAME'];
echo "<br>"; ?>

 
<?php } ?>  

  </table>
</body>
</html>
