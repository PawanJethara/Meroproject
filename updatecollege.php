<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>College Information</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
  <?php include("connection.php");
    $college_id =$_GET['id'];
    $res = mysqli_query($conn, "SELECT  coinformation.*,batch.bname,class.cl_name,subject.sub_name FROM coinformation 
    join batch ON coinformation.ba_id =batch.ba_id join class on coinformation.cl_id=class.cl_id
    join subject ON coinformation.sub_code =subject.sub_code where co_id=$college_id");
    ?>
    <div class="title">College Information</div>
    <form action="#" id="personal_detail_form" method="POST">
    <?php while($college = mysqli_fetch_array($res)){?>
        <div class="form-group">
            <label>College Name</label>
            <input type="text" placeholder="update college name" name="coname" value="<?php echo $college['coname'];?>"> 
        </div>
        <div class="form-group">
            <label>Batch Name</label>
            <input type="text" placeholder="update batch" name="batch" value="<?php echo $college['bname'];?>">
            <input type="hidden" name="ba_id" value="<?php echo $college['ba_id']?>" > 
        </div>
        <div class="form-group">
            <label>Class Name</label>
            <input type="text" placeholder="update class" name="class" value="<?php echo $college['cl_name'];?>">
            <input type="hidden" name="cl_id" value="<?php echo $college['cl_id']?>" > 
        </div>
        <div class="form-group">
            <label>Subject Name</label>
            <input type="text" placeholder="update subject" name="subject" value="<?php echo $college['sub_name'];?>">
            <input type="hidden" name="sub_code" value="<?php echo $college['sub_code']?>" > 
        </div>
        <div class="form-group">
            <label>Roll no</label>
            <input type="text" placeholder="update roll no" name="rollno" value="<?php echo $college['rollno'];?>">
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
$co_id = $_GET['id'];
$ba_id = $_POST['ba_id'];
$sub_code = $_POST['sub_code'];
$cl_id = $_POST['cl_id'];
$coname = $_POST['coname'];
$batch = $_POST['batch'];
$class = $_POST['class'];
$subject =  $_POST['subject'];
$rollno =$_POST['rollno'];	
$result = mysqli_query($conn, "UPDATE coinformation SET coname ='$coname', rollno=$rollno WHERE co_id=$college_id");
$result1 = mysqli_query($conn, "UPDATE batch SET bname='$batch' WHERE ba_id=$ba_id");
$result2 = mysqli_query($conn, "UPDATE class SET cl_name='$class' WHERE cl_id=$cl_id");
$result2 = mysqli_query($conn, "UPDATE Subject SET sub_name='$subject' WHERE sub_code=$sub_code");
// var_dump($_POST['update']); die();
header("Location: collegetable.php");
}
?>