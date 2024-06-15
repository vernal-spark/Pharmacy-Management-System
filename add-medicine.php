<?php include 'partials/menu.php'; ?>
<div style="width:100vw;height:100vh;background-image:url('https://img.freepik.com/free-vector/hand-painted-watercolor-pastel-sky-background_23-2148902771.jpg?w=2000');object-fit:contain" class="main-content">
  <h2 style="margin-left: 120px;padding-top:2%">Add Food</h2>
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
          <td> Name: </td>
          <td>
            <input type="text" name="title" placeholder="Enter Category Name" value="">
          </td>
        </tr>
        <tr>
          <td>Medicine Price: </td>
          <td>
            <input type="number" name="price" placeholder="Enter price" value="">
          </td>
        </tr>
        <tr>
          <td>Medicine Quantity: </td>
          <td>
            <input type="number" name="qty" placeholder="Enter qty" value="">
          </td>
        </tr>
        <tr>
          <td>Medicine Image: </td>
          <td>
            <input type="file" name="image">

          </td>
        </tr>
        <tr>
          <td>Description: </td>
          <td>
            <textarea name="description" rows="8" cols="80"></textarea>
          </td>
        </tr>


     
        <tr>
          <td><input type="submit" name="submit" value="Add Category" class="update-admin-btn"></td>

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

    if(isset($_FILES['image']['name']))
    {
      //upload image and in order to do it we need image name,src pat and dest path
      $image_name=$_FILES['image']['name'];
      $src_path=$_FILES['image']['tmp_name'];
      $image_name="medicine".rand(000,999).".".$image_name;
      $dest_path="images/medicines/".$image_name;

      //upload image
      $upload=move_uploaded_file($src_path, $dest_path);

      if($upload==false)
      {
        $_SESSION['update']="FAILED TO ADD IMAGE";
        header("location:add-medicine.php");
        die();
      }
    }
    else {
      $image_name="";
    }

    // $id = $_POST['id'];
    $title = $_POST['title'];
    $desc=$_POST['description'];
    $price=$_POST['price'];
    $qty=$_POST['qty'];
    $sql="insert into medicines (price,description,title,image_name,qty) values('$price','$desc','$title','$image_name','$qty');";
    //executing the query
    $res=mysqli_query($con,$sql) or die(mysqli_error($con));
    if($res)
    {
      $_SESSION['add']="Medicine added successfully";

      header('location:manage-medicine.php');
    }
    else {
      $_SESSION['add']="Falied to add Medicine";

      header('location:manage-medicine.php');
    }
  }
 ?>
