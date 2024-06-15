
<?php
include 'config.php';
  //get id of admin to be deleted
  $id=$_GET['id'];
  //writing sql query to delete a record
  $sql='delete from customer where id='.$id;
  //executing it
  $res=mysqli_query($con,$sql) or die(mysqli_error($con));
  if($res)
  {
    $_SESSION['delete']="Customer deleted successfully";
    header('location:manage-customers.php');
  }
  else {
      $_SESSION['delete']="Customer could not be deleted";
      header('location:manage-customers.php');
  }
?>
