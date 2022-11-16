<?php
include("db_con.php");
if(isset($_POST['save']))
{
    $organisation = $_POST['organisation']; $org_code = $_POST['org_code']; $incorp_date = $_POST['incorp_date']; $comp_start_date = $_POST['comp_start_date'];
    $regd_no = $_POST['regd_no']; $cin_no = $_POST['cin_no']; $address = $_POST['address']; 
    $country_id = $_POST['country']; $state = $_POST['state']; $phone = $_POST['phone']; $alt_phone = $_POST['alt_phone']; $mobile = $_POST['mobile'];
    $fax = $_POST['fax']; $email = $_POST['email']; $pan = $_POST['pan']; $gstin = $_POST['gstin'];  $tan = $_POST['tan'];  $it_regd = $_POST['it_regd'];
    $cst = $_POST['cst']; $tin = $_POST['tin']; $punchline = $_POST['punchline'];
    $logo = $_FILES['logo']['name'];
    mkdir("org_folder/".$organisation);
    move_uploaded_file($_FILES["logo"]["tmp_name"],"org_folder/$organisation/" . $_FILES["logo"]["name"]);
    $sql = "INSERT INTO `organisation_tbl`(`name`, `code`, `date_of_incorp`, `comp_start_date`, `regd_no`, `cin_no`, `address`, `country_id`, `state_id`,
    `phone`, `alt_phone`, `mobile`, `fax`, `email`, `pan`, `gstin`, `tan`, `it_regd_no`, `cst`, `tin`, `punchline`, `logo`) 
    VALUES ('$organisation','$org_code','$incorp_date','$comp_start_date','$regd_no','$cin_no','$address','$country_id','$state','$phone','$alt_phone',
    '$mobile','$fax','$email','$pan','$gstin','$tan','$it_regd','$cst','$tin','$punchline','$logo')";
    mysqli_query($con,$sql);
    echo "<script>alert('$organisation added successfully')</script>";
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
    <form method="post" enctype="multipart/form-data" >
        <input type="text" name="organisation" required placeholder="Organsation name" />
        <input type="text" name="org_code" required placeholder="Organisation code" />
        <input type="date" name="incorp_date" required placeholder="Incorp date" />
        <input type="date" name="comp_start_date" required placeholder="Company start date" />
        <br/>

        <input type="text" name="regd_no" required placeholder="Regd. no." />
        <input type="text" name="cin_no" required placeholder="CIN no." />
        <input type="text" name="address" required placeholder="Address" />
        <br/>

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
                        echo "<option value='$country_name' >$country_name</option>";
                    }
                }
            ?>
        </select>
        <input type="text" name="state" required placeholder="State" />
        <input type="number" name="phone" required placeholder="Phone no." />
        <br/>

        <input type="number" name="alt_phone" required placeholder="Alt. phone no." />
        <input type="number" name="mobile" required placeholder="Mobile no." />
        <input type="text" name="fax" required placeholder="Fax no." />
        <br/>

        <input type="email" name="email" required placeholder="Email address" />
        <input type="text" name="pan" required placeholder="PAN no." />
        <input type="text" name="gstin" required placeholder="GSTIN no." />
        <br/>

        <input type="text" name="tan" required placeholder="TAN no." />
        <input type="text" name="it_regd" required placeholder="IT regd no." />
        <input type="text" name="cst" required placeholder="CST no." />
        <br/>

        <input type="text" name="tin" required placeholder="TIN no." />
        <input type="text" name="punchline" required placeholder="PUNCH line" />
        <input type="file" name="logo" required placeholder="LOGO" />
        <br/>
        

        <button type="submit" name="save" >Save</button>
    </form>
</body>
</html>