<?php
// Create connection
$dbc = mysqli_connect("localhost","root","","limbo");

// Check connection
if (mysqli_connect_errno())
  {
  die ("Failed to connect to MySQL: " . mysqli_connect_error());
  }
?>