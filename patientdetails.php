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
  </style>
    
  </head>
  <body >
  
  <div class="jumbotron" style="background:url('images/3.jpg');background-size:cover;height:300px;"></div>
  
  <div class="container">
  <a href="index.php" class="btn btn-primary">Main Menu</a>
  <div class="card">
    <div class="card-body"><h3 style="text-align:center">Patient Details</h3></div>
    <div class="card-body">
    <table class="table table-hover">
     <thead>
      <tr>
      <th>No.</th>
      <th>Name</th>
      <th>Age</th>
      <th>Gender</th>
      <th>contact</th>
      <th>Appointment</th>
      <th>Payment</th>
      </tr>
     </thead>
     <tbody>
      <?php   
              $q="select * from appiontment";
	            $res=mysqli_query($db,$q);
	            while($row=mysqli_fetch_array($res))
	            {
                $no=$row['id'];
                $pname=$row['patientname'];
                $age=$row['age'];
                $gen=$row['gender'];
                $contact=$row['contact'];
                $docapp=$row['docapp'];
                $payment=$row['payment'];
                echo " <tr>
                <td>$no</td> 
		            <td>$pname</td> 
		            <td>$age</td> 
		            <td>$gen</td>
		            <td>$contact</td>
                <td>$docapp</td>
                <td>$payment</td>
                </tr>";
               }
      ?>
		  
     </tbody> 
     </table>
    </div>
  
  </div>
  
  
  
  </div>
   



    <script src="jquery/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>     
  </body>
</html>