<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Update Information</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <?php include("connection.php");
    $student_id =$_GET['id'];
    $student_res = mysqli_query($conn, "SELECT studentd.*,name.fname,name.lname,name.mname FROM studentd join name on name.n_id = studentd.n_id  where studentd.s_id =$student_id");
    ?>
    <div class="title">Update Student Information</div>
    <form action="#" method="POST">
    <?php while($student = mysqli_fetch_array($student_res)){?>
        <div class="form-group">
            
            <label>First Name:</label>
            <input type="text" placeholder="Enter first name" name="fname" value="<?php echo $student['fname'];?>">
            <input type="hidden" name="n_id" value="<?php echo $student['n_id']?>" >
        </div>
        <div class="form-group">
            <label>Midddle Name:</label>
            <input type="text" placeholder="Enter middle name" name="mname" value="<?php echo $student['mname'];?>">
        </div>
        <div class="form-group">
            <label>Last Name:</label>
            <input type="text" placeholder="Enter Last Name" name="lname" value="<?php echo $student['lname'];?>">
        </div>
        <div class="form-group">
            <label>Phone:</label>
            <input type="number" placeholder="Enter phone number" name="phone" value="<?php echo $student['phone'];?>">
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="text" placeholder="Enter Email" name="email" value="<?php echo $student['email'];?>">
        </div> 
        <div class="form-group">
            <label>DOB:</label>
            <input type="text" placeholder="Enter date of borth" name="dob" value="<?php echo $student['dob'];?>">
        </div>
        <div class="form-group">
            <label>Gender:</label>
            <input type="text" placeholder="Enter your gender" name="gender" value="<?php echo $student['gender'];?>">
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
    $n_id = $_POST['n_id'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname =  $_POST['lname'];
$email =$_POST['email'];
$phone =$_POST['phone'];
$dob =$_POST['dob'];
$gender =$_POST['gender'];	
$result = mysqli_query($conn, "UPDATE studentd SET phone=$phone, email='$email', dob='$dob', gender='$gender' WHERE s_id=$student_id");
$result1 = mysqli_query($conn, "UPDATE name SET fname='$fname', mname='$mname', lname='$lname' WHERE n_id=$n_id");
header("Location: personaltable.php");
}
?>