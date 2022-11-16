<?php
include("db_con.php");
if(isset($_POST['save']))
{
    $state = $_POST['state'];
    $country_id = $_POST['country'];
    $sql = "INSERT INTO `state_tbl`(`country_id`,`name`) VALUES ('$country_id','$state')";
    mysqli_query($con,$sql);
    echo "<script>alert('$state added successfully')</script>";
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
        <select name="country" required >
            <option value="" >--Select Country--</option>
            <?php
                $sql = "SELECT * from `country_tbl` where status = 1";
                $result = mysqli_query($con,$sql);
                if(mysqli_num_rows($result) > 0)
                {
                    while($rows = mysqli_fetch_assoc($result))
                    {
                        $country_id = $rows['id'];
                        $country_name = $rows['name'];
                        echo "<option value='$country_id' >$country_name</option>";
                    }
                }
            ?>
        </select>
        <input type="text" name="state" required />
        <button type="submit" name="save" >Save</button>
    </form>
</body>
</html>