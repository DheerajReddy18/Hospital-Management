

<html>
<head>
   <title> Registration </title>
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
   <form  action="server.php" method="post">
     
     <label for="username">Username:</label>
	 <br />
	 <input type="text" name="username" required>
	 <br />
	 <label for="emailid">Email ID</label>
	 <br />
	 <input type="text" name="emailid"  >
	 <br />
	
	 <label for="password">Password:</label>
	 <br />
	 <input type="password" name="password_1" required>
     <br   />
	 <label for="password">Confirm password:</label> 
	 <br />
	 <input type="password" name="password_2" required>
	 <br /><br />
	 <input type="submit" value="Register"  class="btn btn-primary" name="register" >
   </form>
   <p>already a user?<a href="Login.php">log in</p> 
</div>
</div>
</div>
<script src="jquery/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>    
 
</body>
</html>