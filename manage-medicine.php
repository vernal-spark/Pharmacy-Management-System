<?php include('partials\menu.php'); ?>
<!-- Main content starts -->
<div class="main-content" style="width:100vw;height:100vh;background-image:url('https://img.freepik.com/free-vector/hand-painted-watercolor-pastel-sky-background_23-2148902771.jpg?w=2000');object-fit:contain">
  <h2 style="margin-left: 120px;padding-top:2%">Medicine Items</h2>
  <br>
  <?php
  if (isset($_SESSION['add'])) {
    print("<h4 style='margin-left: 120px;padding-top:2%;color:green'>" . $_SESSION['add'] . "</h4>"); //displaying the status
    unset($_SESSION['add']); //removing session message
  }
  if (isset($_SESSION['delete'])) {
    print("<h4 style='margin-left: 120px;padding-top:2%;color:red'>" . $_SESSION['delete'] . "</h4>"); //displaying the status
    unset($_SESSION['delete']); //removing session message
  }
  if (isset($_SESSION['update'])) {
    print("<h4 style='margin-left: 120px;padding-top:2%;color:red'>" . $_SESSION['update'] . "</h4>"); //displaying the status
    unset($_SESSION['update']); //removing session message
  }
  ?>
  <br>
  <br>
  <a href="add-medicine.php" class="add-admin-btn">Add Medicine</a>
  <div class="wrapper">
    <div style="overflow-x: auto;">


    <table class="tbl-category">
      <tr>
        <th>
          SNo
        </th>
        <th>
          Medicine Name
        </th>
        <th>
          Medicine Description
        </th>
        <th>
          Medicine Price
        </th>
        <th>
          Medicine Quantity
        </th>
        <th>
          Image Name
        </th>
        <th colspan="2">
          Actions
        </th>
      </tr>
      <?php
      $sql = "select * from medicines;";
      $res = mysqli_query($con, $sql) or die(mysqli_error($con));
      if ($res) {
        //count rows to check if data is present in dbms
        $count = mysqli_num_rows($res);
        if ($count > 0) {
          $ctr = 1;
          while ($rows = mysqli_fetch_assoc($res)) {
            //using while loop to get all the rows and goes on
            //until all rows are read
            $id = $rows['id'];
            $title = $rows['title'];
            $image_name = $rows['image_name'];
            $desc=$rows['description'];
            $price=$rows['price'];
            $qty=$rows['qty'];

      ?>
            <tr>
              <td><?php print($ctr++); ?></td>
              <td><?php print($title); ?></td>
              <td><?php print($desc); ?></td>
              <td><?php print($price); ?></td>
              <td><?php print($qty); ?></td>

              <td><img src="images/medicines/<?php echo $image_name; ?>" alt="" width="100px"></td>

              <td class="data-tbl-category">
                <a href="update-medicine.php?id=<?php echo $id; ?>" class="update-admin-btn">Update Medicine</a><a href="delete-medicine.php?id=<?php echo $id; ?>" class="delete-admin-btn">Delete Medicine</a></td>

            </tr>
      <?php
          }
        }
         else {
           print("<h2 style='padding:40px;color:blue;'>
            No Medicines added yet :(
           </h2>");
        }
      }
      ?>
    </table>
        </div>
  </div>
</div>
<!-- Main content ends -->
<?php include 'partials\footer.php'; ?>
