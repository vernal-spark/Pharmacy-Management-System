<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Pharmacy Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="C:\xampp\htdocs\pharmaa\visible.js"></script>
  
    <link rel="stylesheet" href="admin.css">
    </head>
  <body style="width:100vw;height:100vh;background-image:url('https://img.freepik.com/free-vector/hand-painted-watercolor-pastel-sky-background_23-2148902771.jpg?w=2000');object-fit:contain">
    <!-- Menu section startss -->
    <!-- <div class="menu text-center">
      <div class="wrapper">
        <ul>
          <li><a href="admin-dashboard.php">Home</a></li>
          <li><a href="manage-medicine.php">Medicine</a></li>
          <li><a href="manage-customers.php">Customer</a></li>
          <li><a href="manage-purchase.php">Purchases</a></li>

          
        </ul>
      </div>
    </div> -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Pharmacy Management System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="admin-dashboard.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="manage-medicine.php">Medicines</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="manage-customers.php">Customers</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="manage-purchase.php">Purchases</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <button class="btn btn-outline-danger" type="submit"><a href="index.php" style="text-decoration:none; color:red">Logout</a></button>
      </form>
    </div>
  </div>
</nav>
    <!-- Menu section ends -->
