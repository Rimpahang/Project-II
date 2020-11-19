<?php
if(empty($_SESSION)) // if the session not yet started
   session_start();

if(!isset($_SESSION['username'])) { 
  echo "<script>window.location='../home.php';</script>";
  exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head> 
  <title>
    KPA Dashboard
  </title>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="resource/css/bootstrap.min.css" rel="stylesheet" />
  <link href="resource/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
 </head>

