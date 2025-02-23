<?php
include('../config/constants.php');

//1. Get the id of admin to be deleted
$id = $_GET['id'];
// 2. create sql query to delete admin
$sql = "DELETE FROM tbl_admin WHERE id=$id";

// execute the query
$res = mysqli_query($conn, $sql);

// check whether the query successfully executed or not
if($res==TRUE)
{
    $_SESSION['delete'] = "<div class='success'>Admin deleted successfully</div>";
    header('location:'.SITEURL.'admin/manage-admin.php');
}
else
{
    $_SESSION['delete'] = "<div class='error'>Failed to delete Admin</div>";
    header('location:'.SITEURL.'admin/manage-admin.php');
}

// 3. Redirect to manage admin page with success/error message

?>