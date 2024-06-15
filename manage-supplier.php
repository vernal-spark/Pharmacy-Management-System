<?php include('partials\menu.php'); ?>
<!-- Main content starts -->
<div style="width:100vw;height:100vh;background-image:url('https://img.freepik.com/free-vector/hand-painted-watercolor-pastel-sky-background_23-2148902771.jpg?w=2000');object-fit:contain" class="main-content">
  <h2 style="margin-left: 120px;padding-top:2%">Medicine Items</h2>
  <br>
  <?php
  if (isset($_SESSION['add'])) {
    print("<h4 style='margin-left: 120px;padding-top:2%;color:green'>" . $_SESSION['add'] . "</h4>"); //displaying the status
    unset($_SESSION['add']); //removing session message
  }
  // if (isset($_SESSION['delete'])) {
  //   print("<h4 style='margin-left: 120px;padding-top:2%;color:red'>" . $_SESSION['delete'] . "</h4>"); //displaying the status
  //   unset($_SESSION['delete']); //removing session message
  // }
  // if (isset($_SESSION['update'])) {
  //   print("<h4 style='margin-left: 120px;padding-top:2%;color:red'>" . $_SESSION['update'] . "</h4>"); //displaying the status
  //   unset($_SESSION['update']); //removing session message
  // }
  ?>
  <br>
  <br>
  <a href="add-customer.php" class="add-admin-btn">Add Supplier</a>
  <div class="wrapper">
    <div style="overflow-x: auto;">


    <table class="tbl-category">
      <tr>
        <th>
          SNo
        </th>
        <th>
          Supplier Name
        </th>
        <th>
          Supplier Email
        </th>
        <th>
          Supplier Number
        </th>
        <th colspan="2">
          Actions
        </th>
      </tr>
      <?php
      $sql = "select * from supplier;";
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
            $name = $rows['name'];
            $email = $rows['email'];
            $phone_no=$rows['phone_number'];

      ?>
            <tr>
              <td><?php print($ctr++); ?></td>
              <td><?php print($name); ?></td>
              <td><?php print($email); ?></td>
              <td><?php print($phone_no); ?></td>

              <td class="data-tbl-category">
                <a href="update-supplier.php?id=<?php echo $id; ?>" class="update-admin-btn">Update Supplier</a><a href="delete-supplier.php?id=<?php echo $id; ?>" class="delete-admin-btn">Delete Suppler</a></td>

            </tr>
      <?php
          }
        }
         else {
           print("<h2 style='padding:40px;color:blue;'>
            No Supplier added yet :(
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
