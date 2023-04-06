<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Education Information</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
  <?php include("connection.php");
    $family_id =$_GET['id'];
    $sql = mysqli_query ($conn, "SELECT * from finformation where f_id=$family_id");
    ?>
    <div class="title">Family Information</div> 
    <form action="#" id="personal_detail_form" method="POST">
    <?php while($family = mysqli_fetch_array($sql)){?>
        <div class="form-group">
            <label>Father Name</label>
            <input type="text" placeholder="update father name" name="fname" value="<?php echo $family['fathername'];?>">  
        </div>
        <div class="form-group">
            <label>Father Number</label>
            <input type="text" placeholder="update father number" name="fnumber" value="<?php echo $family['fathernumber'];?>">  
        </div>
        <div class="form-group">
            <label>Mother Name</label>
            <input type="text" placeholder="update mother name" name="mname" value="<?php echo $family['mothername'];?>">  
        </div>
        <div class="form-group">
            <label>Father Number</label>
            <input type="text" placeholder="update mother number" name="mnumber" value="<?php echo $family['mothernumber'];?>">  
        </div>
        <div class="form-group">
            <label>Guardian Name</label>
            <input type="text" placeholder="update guardian name" name="gname" value="<?php echo $family['guardianname'];?>">  
        </div>
        <div class="form-group">
            <label>Father Number</label>
            <input type="text" placeholder="update guardian number" name="gnumber" value="<?php echo $family['guardiannumber'];?>">  
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
$f_id = $_GET['id'];
$fname = $_POST['fname'];
$fnumber = $_POST['fnumber'];
$mname = $_POST['mname'];
$mnumber = $_POST['mnumber']; 
$gname = $_POST['gname'];
$gnumber = $_POST['gnumber'];	
 $result = mysqli_query($conn, "UPDATE finformation SET fathername='$fname', fathernumber='$fnumber', mothername='$mname', mothernumber='$mnumber', guardianname='$gname', guardiannumber='$gnumber' WHERE f_id=$family_id");
header("Location: familytable.php");
}
?>