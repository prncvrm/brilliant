<?php
$con = mysqli_connect("gvr.cvczowsc1hmw.ap-south-1.rds.amazonaws.com","root","password","gvr");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  else{
  	echo "connected";
  }
?> 