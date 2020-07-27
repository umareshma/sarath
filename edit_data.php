<?php
if(isset($_POST['edit']))
{
   //  database connection
  include('server.php');
   
   $output='';
   if($_POST['edit'] == 'show_edit_data')
   {
      $id = $_POST['id'];
      $update = "select * from data where id='".$id."'";
      $update_query = mysqli_query($conn,$update);
      if($update_query)
      {
         $update_data = mysqli_fetch_array($update_query);
         $output.='
            <table class="table table-bordered" id="show_data">
               <tr>
			      <th>id</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Menu</th>
               </tr>
               <tr id="add_data_field" style="display:none;">
			      <td><input type="text"  id="id" class="form-control" /></td>
                  <td><input type="text"  id="name" class="form-control" /></td>
                  <td><input type="email"  id="email" class="form-control" /></td>
                  <td><button class="btn" id="add">Add</button></td>
               </tr>';
         $sel = "select * from data order by id desc";
         $query = mysqli_query($conn,$sel);
         while($data = mysqli_fetch_array($query))
         {
            if($data['id'] == $id)
            {
               $output.='
               <tr>
			      <td><input type="text" id="id" class="form-control" /></td>
                  <td><input type="text" id="new_name" class="form-control" value="'.$update_data['name'].'" /></td>
                  <td><input type="text" id="new_email" class="form-control" value="'.$update_data['email'].'" /></td>
                  <td><button class="btn update" id='.$update_data['id'].'>Update</button></td>
               </tr>
               ';
            }
            else
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
         }
         $output.='</table>';
      }
      else
      {
         $output.='Problem in Fetching data';
      }
   }
   else
   {
	    $id = $_POST['id'];
      $name = $_POST['name'];
      $email = $_POST['email'];
      $id = $_POST['update_id'];
      $update = "update data set name='".$name."',email='".$email."' where id='".$id."'";
      $update_query = mysqli_query($conn,$update);
      if($update_query)
      {
         $output.='<table class="table table-bordered" id="show_data">
               <tr>
			       <th>id</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Menu</th>
               </tr>
               <tr id="add_data_field" style="display:none;">
			       <td><input type="text"  id="id" class="form-control" /></td>
                  <td><input type="text"  id="name" class="form-control" /></td>
                  <td><input type="email"  id="email" class="form-control" /></td>
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
         $output.='Problem in Updating data';
      }
   }
echo $output;
}
?>