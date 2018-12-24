<?php
  session_start();
  if(isset($_SESSION['id']) or isset($_SESSION['name']) or isset($_SESSION['email']))
  {
    header("Location:../dashboard.php");
    exit;
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="frontend/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="frontend/css/cover.css" rel="stylesheet">
  <body>

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">