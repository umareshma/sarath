
<html>
 <body>
 <head>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
<script>
 $(document).ready(function(){
     $("#sub").click(function(){
		 
		 $.ajax({
		
		 url: "select.php",
		 method: "post",
		 data: $('#frm').serializeArray(),
		 dataType: "test",
		 success: function(test) {
			 console.log(test);
		 }
		 });
	 });
 });
 </script>
 </head>
 
 <form name="form"   method="post"  id="frm">
 <div>
 first_name<input type="text" name="first_name" id="fname" class="form_control">
 </div>
 <div>
last_name<input type="text" name="last_name" id="lname" class="form_control">
</div>
 <button name="sub" id="sub">save</button>
 
 </form>
 
 </body>
 </html>