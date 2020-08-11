<?php
  session_start();
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
  </style>
    
  </head>
  <body >
  
  <div class="jumbotron" style="background:url('images/3.jpg');background-size:cover;height:300px;"></div>
  <div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
  <div class="card"> 
		<div class="card-body">
    <h2 style="text-align:center">Add Doctor</h2>
		<form  action="server.php" method="post">
          <label for="pname" >Doctor name</label>
          <input type="text" name="doctorname" class="form-control"  required >
	        <label for="contact">contact number</label>
	        <input type="numbers" name="contact" class="form-control" required>
          <label> specilization </label>
		      <input type="text" name="spec" class="form-control" required>
		  
		  <br><br> 
		  <input type="submit" value="add" name="add" class="btn  btn-primary" id="button" >
		  <a href="index.php" class="btn btn-primary">Go back</a>
		 </form>

		</div>  
  </div>	
  </div>
  </div>	