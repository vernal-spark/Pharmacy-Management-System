<?php include('partials/menu.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>
<body>
<div class="container-fluid d-flex justify-content-evenly mt-5">   
<div class="card " style="width: 18rem;">
  <div class="card-body text-center">
    <h5 class="card-title">No of Purchases</h5>
    <h6 class="card-subtitle">
    <?php
    $sql='select count(*) as total from purchases';
    $res = mysqli_query($con, $sql) or die(mysqli_error($con));
    $data = mysqli_fetch_assoc($res);
    echo $data['total'];
    ?>
    </h6>    
  </div>
</div>
<div class="card" style="width: 18rem;">
  <div class="card-body text-center">
    <h5 class="card-title">No of Medicines</h5>
    <h6 class="card-subtitle">
    <?php
    $sql='select count(*) as total from medicines';
    $res = mysqli_query($con, $sql) or die(mysqli_error($con));
    $data = mysqli_fetch_assoc($res);
    echo $data['total'];
    ?>
    </h6>
  </div>
</div>
<div class="card" style="width: 18rem;">
  <div class="card-body text-center">
    <h5 class="card-title">No of Customers</h5>
    <h6 class="card-subtitle">
    <?php
    $sql='select count(*) as total from customer';
    $res = mysqli_query($con, $sql) or die(mysqli_error($con));
    $data = mysqli_fetch_assoc($res);
    echo $data['total'];
    ?>
    </h6>
  </div>
</div>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>
