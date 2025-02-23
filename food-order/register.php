<?php include('config/constants.php'); ?>

<html>
    <head>
        <link rel="stylesheet" href="css/login.css">
    </head>
    <body>
    <div class="center">
        <div class="border">


<h4 class="text-center">Online Food Ordering System</h4>

<form action="" method="POST" onsubmit="return validation()">

    Full Name &nbsp;&nbsp;&nbsp;
    <input type="text" name="full_name" placeholder="Enter Full Name" id="full_name">
    <p id="error1" style="color: red;"></p>
    
    Phone&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="number" name="phone" placeholder="Enter Your Phone Number" id="phone">
    <p id="error2"  style="color: red;"></p>
    
    Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="address" placeholder="Enter Your Address" id="address">
    <p id="error3"  style="color: red;"></p>
    
    Gmail&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="gmail" name="gmail" placeholder="Enter your gmail" id="gmail" required>
    <p id="error4"  style="color: red;"></p>
    
    Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="password" name="password" placeholder="Enter password" id="password">
    <p id="error5"  style="color: red;"></p>
    
    <br>
    <input type="submit" name="submit" value="register" class="btn-secondary">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="<?php echo SITEURL . 'login.php'; ?>">login</a>

</form>
</div>
</div>
<script>
    function validation(){
        // var correct_way = /^[A-Za-z]+$/;
        var full_name = document.getElementById("full_name").value;
        if(full_name.length<3){
            document.getElementById("error1").innerHTML="name must have more than 2 characters";
            return false;
        }
    
        var phone = document.getElementById("phone").value;
        if(phone.length<8 || phone<0){
            document.getElementById("error2").innerHTML="phone must at least 8 digit";
            return false;
        }
        
    }
</script>
    </body>
</html>

<?php

// process the data from form and submit into database

// check whether submit button is clicked or not

if (isset($_POST['submit'])) {
    // button clicked

    // 1. get the data from form

    $full_name = $_POST['full_name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $gmail = $_POST['gmail'];
    $password = $_POST['password'];


    // 2. SQL Query to save the data into database

    $sql = "INSERT INTO tbl_user SET
            full_name='$full_name',
            phone='$phone',
            address='$address',
            gmail='$gmail',
            password='$password'
    ";


    // 3. execute the query and save the data into database
    $res = mysqli_query($conn, $sql);

    // check whether data is inserted or not
    if ($res == TRUE) {
        // create a session variable to display message
        $_SESSION['add'] = "<p style='color: green;'>Registered successfully</p>";
        // Redirect page to manage admin
        header("location:" . SITEURL . 'login.php');
    } else {
        // create a session variable to display message
        $_SESSION['add'] = "Failed to register";
        // Redirect page to add admin
        header("location:" . SITEURL . 'register.php');
    }
}


?>