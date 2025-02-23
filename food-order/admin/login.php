<?php include('../config/constants.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <div class="login">
        <h1 class="text-center">Login</h1>
<br>
<?php 
    if(isset($_SESSION['login']))
    {
        echo $_SESSION['login'];
        unset($_SESSION['login']);
    }
    if(isset($_SESSION['no-login-message']))
    {
        echo $_SESSION['no-login-message'];
        unset($_SESSION['no-login-message']);
    }
?>
<br>
        <form action="" method="POST" class="text-center">
            Username : <input type="text" name="username" placeholder="Enter username"><br><br>
            Password : <input type="password" name="password" placeholder="Enter password"><br><br>
            <input type="submit" name="submit" value="login" class="btn-secondary">
        </form>
    </div>
</body>
</html>

<?php 
if(isset($_POST['submit']))
{
    // get the data from login form 
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    // sql query 
    $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

    // execute the query
    $res = mysqli_query($conn, $sql);

    // count rows to check whether exists or not
    $count = mysqli_num_rows($res);

    if($count==1)
    {
        // user available
        $_SESSION['login'] = "<div class='success'>Login successful</div>";
        $_SESSION['user'] = $username; // to check the user logged or not

        header('location:'.SITEURL.'admin/');
    }
    else{
        $_SESSION['login'] = "<div class='error text-center'>Incorrect username and password</div>";
        header('location:'.SITEURL.'admin/login.php');

    }
}
?>