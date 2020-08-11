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
    <h3 style="text-align:center">Payment Details</h3>
		<form  action="server.php" method="post">
          <label for="pname" >Patient name</label>
          <input type="text" name="pname" class="form-control"  required >
	      <label for="contact">contact number</label>
	      <input type="numbers" name="contact" class="form-control" required>
          <label> Payment status</label>
		  <select name="payment" class="form-control">
		  <option value="paid">paid</option>
		  <option value="Not paid">Not paid</option>
		  </select>
		  <br><br> 
		  <input type="submit" value="update" name="update" class="btn  btn-primary" id="button" >
		  <a href="index.php" class="btn btn-primary">Go back</a>
		 </form>

		</div>  
  </div>	
  </div>
  </div>	
  
