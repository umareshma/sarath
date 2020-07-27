<!Doctype html>
<html>
<head>
  <title>Table Insert Update delete using ajax with php mysql</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 
</head>
<body>
  <div class="container" style="text-align:center;">
    <h1>Table Insert Update delete using ajax with php mysql</h1>
    <button class="btn btn-warning" id="add_data" >Add new data</button>
    <table class="table" id="show_data">
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
      </tr>
      <?php
      //  database connection
      
      include('server.php');
      $sel = "select * from data order by id desc";
      $query = mysqli_query($conn,$sel);
      if(mysqli_num_rows($query) > 0)
      {
        while($data = mysqli_fetch_array($query))
        {
          echo '
            <tr>
			  <td>'.$data['id'].'</td>
              <td>'.$data['name'].'</td>
              <td>'.$data['email'].'</td>
              <td>
                <button class="btn edit" id='.$data['id'].'>Edit</button>
                <button class="btn delete" id='.$data['id'].'>delete</button>
              </td>
            </tr>
          ';
        }
      }
      else
      {
        echo '
            <tr>
              <td>No  Data found</td>
              <td>No  Data found</td>
              <td>No  Data found</td>
            </tr>
          ';
      }
      ?>
    </table>
  </div>
  <script type="text/javascript">
  // add_data
    $(document).on('click','#add_data',function (){
         $('#add_data_field').show();
    });
 
    $(document).on('click','#add',function (){
		var id = $('#id').val();
        var nm = $('#name').val();
        var em = $('#email').val();
    $.ajax({
      url:"add_data.php",
      method:"post",
      data:{id:id,nm:nm,em:em},
      success:function(data){
        $('#show_data').html(data);
      }
    });
    });
	//edit data
  $(document).on('click','.edit',function (){
        var id = $(this).attr('id');
    var edit = 'show_edit_data';
    $.ajax({
      url:"edit_data.php",
      method:"post",
      data:{id:id,edit:edit},
      success:function(data){
        $('#show_data').html(data);
      }
    });
    });
  
  $(document).on('click','.update',function (){
	   var id = $('#id').val();
        var name = $('#new_name').val();
        var email = $('#new_email').val();
    var update_id = $(this).attr('id');
    var edit = 'edit_data';
    $.ajax({
      url:"edit_data.php",
      method:"post",
      data:{id:id,name:name,email:email,edit:edit,update_id:update_id},
      success:function(data){
        $('#show_data').html(data);
      }
    });
    });
  // delete data
  $(document).on('click','.delete',function (){
        var del_id = $(this).attr('id');
    $.ajax({
      url:"delete_data.php",
      method:"post",
      data:{del_id:del_id},
      success:function(data){
        $('#show_data').html(data);
      }
    });
    });
 
  </script>
</body>
</html>