<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br>
        <?php
    if(isset($_SESSION['add']))
    {
        echo $_SESSION['add']; // displaying session message
        unset($_SESSION['add']); //removing session message
    }
    ?>
    <br>
    <br>
        <!-- <br> -->
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name : </td>
                    <td><input type="text" name="full_name" placeholder="Enter Full Name"></td>
                </tr>
                <tr>
                    <td>Username : </td>
                    <td><input type="text" name="username" placeholder="Your username"></td>
                </tr>
                <tr>
                    <td>Password : </td>
                    <td><input type="password" name="password" placeholder="Your Password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>

<?php

// process the data from form and submit into database

// check whether submit button is clicked or not

if(isset($_POST['submit'])){
    // button clicked
    
    // 1. get the data from form

    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);  // password is encrypted using md5 encryption

    // 2. SQL Query to save the data into database

    $sql = "INSERT INTO tbl_admin SET
            full_name='$full_name',
            username='$username',
            password='$password'
    ";
    
   
// 3. execute the query and save the data into database
    $res = mysqli_query($conn, $sql) or die(mysqli_error());

    // check whether data is inserted or not
    if($res==TRUE){
        // create a session variable to display message
        $_SESSION['add'] = "Admin added successfully";
        // Redirect page to manage admin
        header("location:".SITEURL.'admin/manage-admin.php');
    }
    else{
        // create a session variable to display message
        $_SESSION['add'] = "Failed to add Admin";
        // Redirect page to add admin
        header("location:".SITEURL.'admin/add-admin.php');
    }

}


?>