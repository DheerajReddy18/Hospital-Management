<html>
<head>
   <title> Login </title>
   <link rel="stylesheet" href="css/bootstrap.min.css" />
   <style>
    
	 #button:hover{
	               
	      cursor:pointer;
	    }	
	 	
   </style>
</head>
<body style="background:url('images/2.jpg') no-repeat;background-size:cover; ">
  <div class="container" style="width:300px" >
  <div class="card">
  <img src="images/1.jpg"  class="card=img-top" />
  <div class="card-body">
 
   <form    action="server.php" method="post">
     
     <label for="username">Username</label>
     <input type="text" name="username"   required >
	
	 <label for="password">password</label>
	 <input type="password" name="password_1"    required>
     <br /><br />
	 <input type="submit" value="Log in" class="btn  btn-primary" id="button" name="login">
   </form>
   <p>Not a user?<a href="Registration.php">register here</p> 
  
   
</div>
</div>
</div>
<script src="jquery/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>    
 
</body>
</html>