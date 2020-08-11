<?php
   include("server.php");
  if(!isset($_SESSION['username']))
  {
    
	header("location:login.php");
  }
  else
  {
    $username=$_SESSION['username'];
  }
  if(isset($_GET['logout']))
  {
    session_destroy();
	unset($_SESSION['username']);
	header("location:login.php");
  }	
  
  
?>   





<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<style>
	 #list{
	        position:absolute;
            left:40%;
	         background-color:lavender;
			 border-spacing:3px;
	      }
	 #title{
	         position:absolute;
            left:38%;
	  
	      }	
	#main,body{
	      background-color:lavender;
		 
		 }	    
	
	</style>
    
  </head>
  <body >
   
    <div class="jumbotron" style="background:url('images/3.jpg');background-size:cover;height:300px;"></div>
	<div class="container-fluid">
	<a href="index.php?logout='1' " class='btn btn-primary' >logout</a>
	<hr>
	<div class="row">
	
	  <div class="col-md-3">
       <div class="list-group">
	  
	   <a href=" "  class="list-group-item active">Appointment</a>
	   <a href="patientdetails.php"  class="list-group-item">patient details</a>
	   <a href="doctor.php"  class="list-group-item ">Doctor's list</a>
       
	   <a href="payment.php"  class="list-group-item">update payment status</a>
	   </div>
	   </div>
	   <div class="col-md-8">
	     <div class="card"> 
		<div class="card-body">
		<h2 style="text-align:center">Book an appointment</h2>
		<form  action="server.php" method="post">
          <label for="pname" >Patient name</label>
          <input type="text" name="pname" class="form-control"  required >
		
	      <label for="age" >age:</label>
	      <input type="text" name="age" class="form-control" required>
		  
	      <label for="gen">gender</label>
	      <input type="text" name="gen" class="form-control" required>
		  
	      <label for="contact">contact number</label>
	      <input type="numbers" name="contact" class="form-control" required>
		  
          <label >Doctor Appiontment</label>
     	  <select name="docapp" class="form-control">
		  <?php 
		     
			 $q="select * from doctor";
			 $res=mysqli_query($db,$q);
			 while($row=mysqli_fetch_array($res)) 
             {
				$docname=$row['doctorname'];
				echo '<option value="'.$docname.'">'.$docname.'</option>'; 
			 }		 
		 
		 
		  ?>
		  </select> 
		  <br />
	      <label> Payment status</label>
		  <select name="payment" class="form-control">
		  <option value="paid">paid</option>
		  <option value="Not paid">Not paid</option>
		  </select>
	      <br />
	      <input type="submit" value="Appiontment request" name="patsubmit" class="btn  btn-primary" id="button" >
        </form>
	    </div>
		</div> 
	   </div>
	   <div class="col-md-1"></div>
     </div>  
	</div>   
	<script src="jquery/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>     
  </body>
</html>