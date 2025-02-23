<?php include('config/constants.php'); ?>

<html>

<head>
<link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="center">
<div class="border">


        <h4 class="text-center">Online Food Ordering System</h4>
        
        <?php
        if (isset($_SESSION['login'])) {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }

        ?>
        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        ?>
        

        <form action="" method="POST">
            Gmail&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="text" name="gmail" placeholder="Enter your gmail"><br><br>
            Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="password" name="password" placeholder="Enter password"><br><br>
            <br>
            <input type="submit" name="submit" value="login" class="btn-secondary">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo SITEURL . 'register.php'; ?>">Create Account</a>
        </form>
    </div>
    </div>
</body>

</html>


<?php
if (isset($_POST['submit'])) {
    // get the data from login form 
    $gmail = $_POST['gmail'];
    $password = $_POST['password'];

    // sql query 
    $sql = "SELECT * FROM tbl_user WHERE gmail='$gmail' AND password='$password'";

    // execute the query
    $res = mysqli_query($conn, $sql);

    // count rows to check whether exists or not
    $count = mysqli_num_rows($res);

    if ($count == 1) {
        // user available
        $_SESSION['login'] = "<div class='success'>Login successful</div>";
        // $_SESSION['user'] = $gmail; 

        header('location:' . SITEURL);
    } else {
        $_SESSION['login'] = "<div class='error text-center'>Incorrect gmail and password</div>";
        header('location:' . SITEURL . 'login.php');
    }
}
?>