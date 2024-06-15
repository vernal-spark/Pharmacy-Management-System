<?php include 'partials/menu.php'; ?>
<div style="width:100vw;height:100vh;background-image:url('https://img.freepik.com/free-vector/hand-painted-watercolor-pastel-sky-background_23-2148902771.jpg?w=2000');object-fit:contain" class="main-content ">
  <h2 style="margin-left: 120px;padding-top:2%">Add Supplier</h2>
  <br>
  <!-- if admin could not be added -->
  <?php
    if(isset($_SESSION['add']))
    {
      print("<h4 style='margin-left: 120px;padding-top:2%'>".$_SESSION['add']."</h4>");//displaying the status
      unset($_SESSION['add']);//removing session message
    }
    if(isset($_SESSION['update']))
    {
      print("<h4 style='margin-left: 120px;padding-top:2%;color:red'>".$_SESSION['update']."</h4>");//displaying the status
      unset($_SESSION['update']);//removing session message
    }
   ?>
  <br>
  <div class="wrapper">
    <form class="" action="" method="post" enctype="multipart/form-data">
      <table class="add-admin-tbl">
      <tr>
          <td>Supplier Name: </td>
          <td>
            <input type="text" name="name" placeholder="Enter Supplier Name" value="">
          </td>
        </tr>
        <tr>
          <td>Supplier Email: </td>
          <td>
            <input type="text" name="email" placeholder="Enter Supplier Email" value="">
          </td>
        </tr>
        <tr>
          <td>Supplier  Number: </td>
          <td>
          <input type="text" name="number" placeholder="Enter Supplier Number" value="">

          </td>
        </tr>


     
        <tr>
          <td><input type="submit" name="submit" value="Add Supplier" class="update-admin-btn"></td>

        </tr>
      </table>
    </form>
  </div>
  </div>
<?php include 'partials/footer.php'; ?>


<?php
  //Process the Value from forms and save it in dbms
  //check submit iss clicked
  if(isset($_POST['submit']))
  {

    // $id = $_POST['id'];

    $name = $_POST['name'];
    $email=$_POST['email'];
    $number=$_POST['number'];

    $sql="insert into supplier (name,email,phone_number) values('$name','$email','$number');";
    //executing the query
    $res=mysqli_query($con,$sql) or die(mysqli_error($con));
    if($res)
    {
      $_SESSION['add']="Supplier added successfully";

      header('location:manage-supplier.php');
    }
    else {
      $_SESSION['add']="Falied to add Supplier";

      header('location:manage-supplier.php');
    }
  }
 ?>
