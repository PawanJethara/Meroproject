<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Personal Information</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <?php include("connection.php");
    $address1_id =$_GET['id'];
    $sql = mysqli_query ($conn, "SELECT address1.*,country.cname,district.dname,province.pname,city.ci_name
  FROM address1 join country on address1.c_code=country.c_code join district on address1.dp_code=district.dp_code 
  join province on address1.p_id=province.p_id join city on address1.ci_id=city.ci_id where a_id=$address1_id ");
    ?>
        <div class="title">Personal Information</div>
        <form action="#" id="personal_detail_form" method="POST">
            <?php while($address1 = mysqli_fetch_array($sql)){?>
            <div class="form-group">
                <label>Address type</label>
                <input type="text" placeholder="update address" name="address"
                    value="<?php echo $address1['address_type'];?>">

            </div>
            <div class="form-group">
                <label>Country Name</label>
                <input type="text" placeholder="update country" name="country" value="<?php echo $address1['cname'];?>">
                <input type="hidden" name="c_code" value="<?php echo $address1['c_code']?>">
            </div>
            <div class="form-group">
                <label>District Name</label>
                <input type="text" placeholder="update district" name="district"
                    value="<?php echo $address1['dname'];?>">
                <input type="hidden" name="dp_code" value="<?php echo $address1['dp_code']?>">
            </div>
            <div class="form-group">
                <label>Province Name</label>
                <input type="text" placeholder="update province" name="province"
                    value="<?php echo $address1['pname'];?>">
                <input type="hidden" name="p_id" value="<?php echo $address1['p_id']?>">
            </div>
            <div class="form-group">
                <label>City Name</label>
                <input type="text" placeholder="update city" name="city" value="<?php echo $address1['ci_name'];?>">
                <input type="hidden" name="ci_id" value="<?php echo $address1['ci_id']?>">
            </div>
            <div class="form-group">
                <label>Ward No.</label>
                <input type="text" placeholder="update ward no." name="ward" value="<?php echo $address1['ward_no'];?>">

            </div>
            <div class="button">
                <input type="submit" name="update" value="update">
            </div>
            <?php }?>
        </form>
    </div>
</body>

</html>

<?php
if(isset($_POST['update'])){
$p_id = $_POST['p_id'];
$c_code = $_POST['c_code'];
$dp_code = $_POST['dp_code'];
$ci_id = $_POST['ci_id'];
$a_id = $_GET['id'];
$address = $_POST['address'];
$country = $_POST['country'];
$district = $_POST['district'];
$province =  $_POST['province'];
$city =$_POST['city'];
$ward =$_POST['ward'];	
$result = mysqli_query($conn, "UPDATE address1 SET address_type ='$address', ward_no=$ward WHERE a_id=$a_id");
$result1 = mysqli_query($conn, "UPDATE country SET cname='$country' WHERE c_code=$c_code");
//  var_dump($_POST['update']); die();
$result2 = mysqli_query($conn, "UPDATE province SET pname='$province' WHERE p_id=$p_id");
$result3 = mysqli_query($conn, "UPDATE district SET dname='$district' where dp_code=$dp_code");
$result4 = mysqli_query($conn, "UPDATE city SET ci_name='$city' where ci_id=$ci_id");
header("Location: addresstable.php");
}
?>

