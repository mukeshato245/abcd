<?php include('partials-front/menu.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <div class="main-content">
        <div class="wrapper">
            <h3>My Orders</h3>
            <a href="<?php echo SITEURL; ?>"><input type="submit" name="submit" class="btn-primary" value="logout"></a>

 


            <br>
            <table class="abc">
                <tr>
                    <th>Sn.</th>
                    <th>Date</th>
                    <th>Food Items</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Amount</th>
                    <th>Status</th>
                </tr>

                <?php
$sql = "SELECT * FROM tbl_order ORDER BY id DESC";
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);
$sn = 1;
if($count>0)
{
    while($row=mysqli_fetch_assoc($res))
    {
        $id = $row['id'];
        $food = $row['food'];
        $price = $row['price'];
        $qty = $row['qty'];
        $total = $row['total'];
        $order_date = $row['order_date'];
        $status = $row['status'];
        $customer_name = $row['customer_name'];
        $customer_contact = $row['customer_contact'];
        $customer_email = $row['customer_email'];
        $customer_address = $row['customer_address'];
        
        ?>
        <tr>
            <td><?php echo $sn++; ?>.</td>
            <td><?php echo $order_date; ?>.</td>
            <td><?php echo $food; ?></td>
            <td><?php echo $price; ?></td>
            <td><?php echo $qty; ?></td>
            <td><?php echo $total; ?></td>
            <td><?php echo $status; ?></td>           
        </tr>
        <?php
    }
}
else
{
    echo "<tr><td colspan='5' class='error' >Orders not available</td></tr>";
}
?>



                
            </table>
        </div>
    </div>
</body>
</html>

<?php include('partials-front/footer.php'); ?>