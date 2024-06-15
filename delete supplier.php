<?php
include 'config.php';
  //get id of admin to be deleted
  $id=$_GET['id'];
  //writing sql query to delete a record
  $sql='delete from supplier where id='.$id;
  //executing it
  $res=mysqli_query($con,$sql) or die(mysqli_error($con));
  if($res)
  {
    $_SESSION['delete']="Supplier deleted successfully";
    header('location:manage-supplier.php');
  }
  else {
      $_SESSION['delete']="Supplier could not be deleted";
      header('location:manage-supplier.php');
  }
?>