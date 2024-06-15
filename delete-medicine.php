
<?php
include 'config.php';
  //get id of admin to be deleted
  $id=$_GET['id'];
  //writing sql query to delete a record
  $sql='delete from medicines where id='.$id;
  //executing it
  $res=mysqli_query($con,$sql) or die(mysqli_error($con));
  if($res)
  {
    $_SESSION['delete']="Medicines deleted successfully";
    header('location:manage-medicine.php');
  }
  else {
      $_SESSION['delete']="Food could not be deleted";
      header('location:manage-medicine.php');
  }
?>
