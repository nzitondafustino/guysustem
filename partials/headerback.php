<?php
  session_start();
  if(!isset($_SESSION['id']) or !isset($_SESSION['name']) or !isset($_SESSION['email']))
  {
    header("Location:../index.php");
    exit;
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="frontend/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="frontend/css/dashboard.css" rel="stylesheet">
    <link href="frontend/css/bootstrap-datepicker3.css" rel="stylesheet">
  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="dashboard.php">IT HUB RWANDA</a>
      <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
       <input type="submit" name="search" value="Search" class="btn btn-success" style="margin-left: 10px;"> -->
      <form method="POST" action="../includes/logout.inc.php">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <input type="submit" class="btn btn-outline-light" name="logout" value="Logout">
        </li>
      </ul>
    </form>
    </nav>