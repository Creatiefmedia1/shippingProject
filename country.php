<?php
include("db_con.php");
if(isset($_POST['save']))
{
    $country = $_POST['country'];
    $sql = "INSERT INTO `country_tbl`(`name`) VALUES ('$country')";
    mysqli_query($con,$sql);
    echo "<script>alert('$country added successfully')</script>";
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" >
        <input type="text" name="country" required />
        <button type="submit" name="save" >Save</button>
    </form>
</body>
</html>