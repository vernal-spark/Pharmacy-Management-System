<?php include 'partials/menu.php'; ?>
<div style="width:100vw;height:100vh;background-image:url('https://img.freepik.com/free-vector/hand-painted-watercolor-pastel-sky-background_23-2148902771.jpg?w=2000');object-fit:contain" class="main-content">
  <div class="wrapper">
    <h1>Update Supplier</h1>
<br><br>


    <?php
    $category_name="";
    $image_name="";
    $id=$_GET['id'];
    $sql="select * from supplier where id=$id;";
    $res=mysqli_query($con,$sql) or die(mysqli_error($con));
    if($res)
    {
      $count=mysqli_num_rows($res);
      if($count==1)
      {
      while($rows=mysqli_fetch_assoc($res))
      {
        $id = $rows['id'];
            $name = $rows['name'];
            $email = $rows['email'];
            $phone_no=$rows['phone_number'];
      }

      }
      else {
        header("location:manage-supplier.php");
      }
    }
     ?>


    <form class="" action="" method="post" enctype="multipart/form-data">
      <table class="add-admin-tbl">
        <tr>
          <td>Supplier Name: </td>
          <td>
            <input type="text" name="name" placeholder="Enter Supplier Name" value="<?php echo $name;?>">
          </td>
        </tr>
        <tr>
          <td>Supplier Email: </td>
          <td>
            <input type="text" name="email" placeholder="Enter Supplier Email" value="<?php echo $email;?>">
          </td>
        </tr>
        <tr>
          <td>Supplier  Number: </td>
          <td>
          <input type="text" name="number" placeholder="Enter Supplier Price" value="<?php echo $phone_no;?>">

          </td>
        </tr>
    
        <tr>
          <td><input type="submit" name="submit" value="Add Supplier" class="update-admin-btn"></td>

        </tr>
      </table>
    </form>

  </div>
</div>
<?php
  if(isset($_POST['submit']))
  {
    $name = $_POST['name'];
    $email=$_POST['email'];
    $number=$_POST['number'];
      // echo $full_name;
      $sql="update supplier set name='$name',phone_number='$number',email='$email' where id=$id";
      $res=mysqli_query($con,$sql) or die(mysqli_error($con));
      if($res)
      {
        $_SESSION['update']='Supplier updated successfully';
        header("location:manage-supplier.php");
      }
      else {
        $_SESSION['update']='Supplier did not get updated ';
        header("location:manage-supplier.php");
      }
  }
 ?>