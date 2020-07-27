<?php
if(isset($_POST['del_id']))
{
   // declaring a output variable for showing data
   $output='';
   $id = $_POST['del_id'];
   // creating database connection,'user_details');
   include ('server.php');
   $del = "delete from data where id='".$id."'";
   $query = mysqli_query($conn,$del);
   if($query)
   {
      $output.='<table class="table table-bordered" id="show_data">
               <tr>
			      <th>id</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Menu</th>
               </tr>
               <tr id="add_data_field" style="display:none;">
                  <td><input type="text" placeholder="Enter your name" id="name" class="form-control" /></td>>
                  <td><input type="email" placeholder="Enter your email" id="email" class="form-control" /></td>
                  <td><button class="btn" id="add">Add</button></td>
               </tr>';
      $sel = "select * from data order by id desc";
      $query = mysqli_query($conn,$sel);
      while($data = mysqli_fetch_array($query))
      {
         $output.='
            <tr>
			    <td>'.$data['id'].'</td>
               <td>'.$data['name'].'</td>
               <td>'.$data['email'].'</td>
               <td>
                  <button class="btn edit" id='.$data['id'].'>Edit</button>
                  <button class="btn delete" id='.$data['id'].'>delete</button>
               </td>
            </tr>';
      }
      $output.='</table>';
   }
   else
   {
      $output.='Problem in Inserting data';
   }
echo $output;
}
?>
