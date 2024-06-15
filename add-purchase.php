<?php include 'partials/menu.php'; ?>
<div style="width:100vw;height:100vh;background-image:url('https://img.freepik.com/free-vector/hand-painted-watercolor-pastel-sky-background_23-2148902771.jpg?w=2000');object-fit:contain" class="main-content">
  <h2 style="margin-left: 120px;padding-top:2%">Add Purchase</h2>
  <br>
  <!-- if admin could not be added -->
  <?php
    if(isset($_SESSION['add']))
    {
      print("<h4 style='margin-left: 120px;padding-top:2%'>".$_SESSION['add']."</h4>");//displaying the status
      unset($_SESSION['add']);//removing session message
    }
    // if(isset($_SESSION['update']))
    // {
    //   print("<h4 style='margin-left: 120px;padding-top:2%;color:red'>".$_SESSION['update']."</h4>");//displaying the status
    //   unset($_SESSION['update']);//removing session message
    // }
   ?>
  <br>
  <div class="wrapper">
    <form class="" action="" method="post" enctype="multipart/form-data">
      <table class="add-admin-tbl">
      <tr>
          <td>Customer ID </td>
          <td>
            <input type="text" name="id" placeholder="Enter Customer ID" value="">
          </td>
        </tr>
        <tr>
          <td>Orders</td>
          <td>
          <?php
          $sql="select title from medicines;";
          //executing the query
          $res=mysqli_query($con,$sql) or die(mysqli_error($con));
          while($rec=mysqli_fetch_assoc($res))
          {
            $medicine=$rec['title'];
            $ctr=1;
        ?>
          <div class="purchase"> 
            
            <input type="checkbox" name="orders[]" value="<?php echo $medicine?>" onclick="visible('<?php echo $ctr ?>')"><?php echo $medicine?>
            <input type="number" id='<?php echo ($ctr)?>'>
            <br>
            </div>
        <?php
            $ctr++;
          }
        ?>
          </td>
        </tr>


     
        <tr>
          <td><input type="submit" name="submit" value="Add Purchase" class="update-admin-btn"></td>

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

    $id = $_POST['id'];
    $price=0;
    $order=$_POST['orders'];
    $tmp="";
    foreach($order as $i){
        $tmp.= $i." ";
        // $sql="select price from medicines where tiltle=$i";
        // $res=mysqli_query($con,$sql) or die(mysqli_error($con));
        // $rec=mysqli_fetch_assoc($res);
        // $price+=$rec['price'];
    }
    // die();
    

    $sql="insert into purchases (cid,price,orders) values('$id','$price','$tmp');";
    //executing the query
    $res=mysqli_query($con,$sql) or die(mysqli_error($con));
    if($res)
    {
      $_SESSION['add']="Purchase added successfully";

      header('location:manage-purchase.php');
    }
    else {
      $_SESSION['add']="Falied to add Purchase";

      header('location:manage-purchase.php');
    }
  }
 ?>
 <script>
  function visible(a){
    console.log(a);
  }
  </script>
 