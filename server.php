<?php
  session_start();

  $errors=array();
  
  $db=mysqli_connect('127.0.0.1','root','','');
  mysqli_query($db ,"CREATE DATABASE project");
  mysqli_select_db($db,'project');
  $table1="CREATE TABLE info ( serialnumber INT(11) AUTO_INCREMENT PRIMARY KEY,username VARCHAR(255),emailid VARCHAR(255),password VARCHAR(255))";
  mysqli_query($db,$table1);
  $table2="CREATE TABLE appiontment ( id INT(11) AUTO_INCREMENT PRIMARY KEY,patientname VARCHAR(255),age VARCHAR(5),gender VARCHAR(255),contact VARCHAR(255),docapp VARCHAR(255),payment VARCHAR(255))";
  mysqli_query($db,$table2);
  $table3="CREATE TABLE doctor ( number INT(11) AUTO_INCREMENT PRIMARY KEY,doctorname VARCHAR(255),contact VARCHAR(255),specilization VARCHAR(255))";
  mysqli_query($db,$table3);
 
  if(isset($_POST['register']))
 {
 
    $username=mysqli_real_escape_string($db,$_POST['username']);	  
    $emailid=mysqli_real_escape_string($db,$_POST['emailid']);	
  	$password_1=mysqli_real_escape_string($db,$_POST['password_1']);	
  	$password_2=mysqli_real_escape_string($db,$_POST['password_2']);	
	if(empty($username))
      array_push($errors,"username is required");	 
    if(empty($emailid))
      array_push($errors,"email is required");	 
    if(empty($password_1))
      array_push($errors,"password is required");	 
    if($password_1!=$password_2)
      array_push($errors,"passwords do not match");
	  
	$info_check_query="SELECT * FROM info WHERE username = '$username' or emailid='$emailid' LIMIT 1";
  	$result=mysqli_query($db,$info_check_query);
    $name=mysqli_fetch_assoc($result);
    if($name)
   {
      if($name['username']==$username)
	   array_push($errors," username already exists ");
	  if($name['emailid']==$emailid)
	   array_push($errors," emailid  has already registered ");  
   }  
   if(count($errors)==0)
  {
     $password=md5($password_1);
	 $query="INSERT INTO info(username,emailid,password) VALUES ('$username','$emailid','$password')";    
  	 mysqli_query($db,$query);
     $_SESSION['username']=$username;
	 
   
    
	
	   header("location:index.php");
 }
} 
 
 

 if(isset($_POST['login']))
 {
    $staffid=mysqli_real_escape_string($db,$_POST['staffid']);	
    $username=mysqli_real_escape_string($db,$_POST['username']);	  
    $password=mysqli_real_escape_string($db,$_POST['password_1']);	
    if(count($errors)==0)
	{ 
       $password=md5($password);	  
	   $query="SELECT * FROM info WHERE username='$username' AND password='$password' ";  
	   $results= mysqli_query($db,$query);
	   if(mysqli_num_rows($results))
	   {
	     $_SESSION['username']=$username;
	     if(!empty($staffid))
		   header("location:adminindex.php");
		 else
		   header("location:index.php");
	   }
	   else
	   
	     array_push($errors,"wrong username or password , try again");
	}  
	 else
	 {

	    array_push($errors,"wrong username or password  try again");
          
	  } 
 }
	
	 if(count($errors)!=0)
	 {
     
      foreach($errors as $error)
	  {
	    echo $error ;
		echo "<br>";
		
	    
	  }
     echo "<button><a href='index.php?logout=1'>go back</a></button>";
	 }
	 
	 
	if(isset($_POST['patsubmit'])) 
	 {
	   $pname=mysqli_real_escape_string($db,$_POST['pname']);	  
       $age=mysqli_real_escape_string($db,$_POST['age']);	
  	   $gen=mysqli_real_escape_string($db,$_POST['gen']);	
  	   $contact=mysqli_real_escape_string($db,$_POST['contact']);	 
	   $docapp=$_POST['docapp'];
	   $payment=$_POST['payment'];
	   $que="INSERT INTO appiontment (patientname,age,gender,contact,docapp,payment) VALUES('$pname','$age','$gen','$contact','$docapp','$payment')";
	   $result=mysqli_query($db,$que);
       if($result)
	   {
	   echo "<script>alert('appointment request sent')</script>";
	   }
	   else
	   echo "<script>alert('appointment request not sent')</script>";
	   header("refresh:1;url=index.php");
	
	 } 

	 if(isset($_POST['update']))
	 {
		$pname=mysqli_real_escape_string($db,$_POST['pname']);
		$contact=mysqli_real_escape_string($db,$_POST['contact']);	
		$payment=$_POST['payment'];
		$result=mysqli_query($db,"update appiontment set payment='$payment' where patientname='$pname'");
		
		if($result)
		{
		echo "<script>alert('payment updated')</script>";
		}
		else
		echo "<script>alert('appointment request not sent')</script>";
		header("refresh:1;url=index.php");
	 }	
	 if(isset($_POST['add']))
	 {
		 $docname=mysqli_real_escape_string($db,$_POST['doctorname']);
		 $contact=mysqli_real_escape_string($db,$_POST['contact']);
		 $spec=mysqli_real_escape_string($db,$_POST['spec']);
		 $result=mysqli_query($db,"INSERT INTO doctor (doctorname,contact,specilization) VALUES('$docname','$contact','$spec')");
		 if($result)
		 {
		 echo "<script>alert('Doctor added ')</script>";
		 }
		 else
		 echo "<script>alert('Try again')</script>";
		 header("refresh:1;url=index.php");
	 }
    
 
 
 ?> 

  