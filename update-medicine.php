<?php include 'partials/menu.php'; ?>
<div style="width:100vw;height:100vh;background-image:url('https://img.freepik.com/free-vector/hand-painted-watercolor-pastel-sky-background_23-2148902771.jpg?w=2000');object-fit:contain" class="main-content">
  <div class="wrapper">
    <h1>Update medicines</h1>
<br><br>


    <?php
    $category_name="";
    $image_name="";
    $id=$_GET['id'];
    $sql="select * from medicines where id=$id;";
    $res=mysqli_query($con,$sql) or die(mysqli_error($con));
    if($res)
    {
      $count=mysqli_num_rows($res);
      if($count==1)
      {
      while($rows=mysqli_fetch_assoc($res))
      {
        $id = $rows['id'];
        $title = $rows['title'];
        $image_name = $rows['image_name'];
        $desc=$rows['description'];
        $price=$rows['price'];
        $qty=$rows['qty'];
      }

      }
      else {
        header("location:manage-medicines.php");
      }
    }
     ?>


    <form class="" action="" method="post" enctype="multipart/form-data">
      <table class="add-admin-tbl">
        <tr>
          <td>Medicine Name: </td>
          <td>
            <input type="text" name="title" placeholder="Enter Medicine Name" value="<?php echo $title;?>">
          </td>
        </tr>
        <tr>
          <td>Medicine Price: </td>
          <td>
            <input type="text" name="price" placeholder="Enter Medicine Price" value="<?php echo $price;?>">
          </td>
        </tr>
        <tr>
          <td>Medicine Quantity: </td>
          <td>
            <input type="number" name="qty" placeholder="Enter qty" value="<?php echo $qty ?>">
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
            <textarea name="description" rows="8" cols="80"><?php echo $desc;?></textarea>
          </td>
        </tr>
       
        <tr>
          <td><input type="submit" name="submit" value="Add Medicine" class="update-admin-btn"></td>

        </tr>
      </table>
    </form>

  </div>
</div>
<?php
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
        $image_name="cant select";
      }
    $title = $_POST['title'];
    $desc=$_POST['description'];
    $price=$_POST['price'];
    $qty=$_POST['qty'];
      // echo $full_name;
      $sql="update medicines set qty=$qty,price='$price',description='$desc',title='$title',image_name='$image_name' where id=$id";
      $res=mysqli_query($con,$sql) or die(mysqli_error($con));
      if($res)
      {
        $_SESSION['update']='Medicine updated successfully';
        header("location:manage-medicine.php");
      }
      else {
        $_SESSION['update']='Medicine did not get updated ';
        header("location:manage-medicine.php");
      }
  }
 ?>
