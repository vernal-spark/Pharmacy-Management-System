<?php
    include("config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Dashboard</title>
</head>

<body>

    <section class="main">
        <div class="container">

            <div class="main__form">
                <div class="main__form--title text-center">Log In</div>
                <form action="" method="POST">
                    <div class="form-row">
                        <div class="col col-12">
                            <?php  
                            if (isset($_SESSION['login'])) {
                                print("<h4 style='margin-left: 120px;padding-top:2%;color:red'>" . $_SESSION['login'] . "</h4>"); //displaying the status
                                unset($_SESSION['login']); //removing session message
                              }
                            ?>
                            <label class="input">
                                <i id="left" class="fas fa-envelope left"></i>
                                <input type="text" name="email" placeholder="Email" required>
                            </label>
                        </div>
                        <div class="col col-12">
                            <label class="input">
                                <i id="left" class="fas fa-key"></i>
                                <input id="pwdinput" type="password" name="password" placeholder="Password" required>
                                <i id="pwd" class="fas fa-eye right"></i>
                            </label>
                        </div>
                        <!-- <div class="col col-12">
                            <label class="input">
                                <i id="left" class="fas fa-male left"></i>
                                <select name="role" id="Role">
                                    <option value="admins">Admin</option>
                                    <option value="pharmacists">Pharmacist</option>
                                    <option value="salesmans">Customer</option>
                                </select>
                            </label>
                        </div>
                            <input type="hidden" name="action" value="login"> -->
                            
                        <div class="col col-12">
                        <input type="submit" name="submit" value="Submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="assets/js/jquery-3.5.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/app.js"></script>
</body>

</html>
<?php
// echo "hello";
    if(isset($_POST['submit']))
    {
        $email=$_POST['email'];
        $password=$_POST['password'];
        $role='admins';
        $sql="select * from admin where email='$email' and password='$password';";
        // else if($role=="pharmacists")
        // $sql="select * from pharmacist where email='$email' and password='$password';";
        // else
        // $sql="select * from customer where email='$email' and password='$password';";


        $res=mysqli_query($con,$sql) or die(mysqli_error($con));
        $count=mysqli_num_rows($res);
        if($count==1)
        {
            header("location:admin-dashboard.php");
            // else if($role=="pharmacists")
            // header("location:pharmacist-dashboard.php");
            // else
            // header("location:customer-dashboard.php");


        }
        else
        {
            $_SESSION['login']="User account does not exist";
        }
    
    }
?>