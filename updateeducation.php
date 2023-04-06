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
    $education_id =$_GET['id'];
    $sql = mysqli_query ($conn, "SELECT equalification.*,level.l_name,board.bo_name
    FROM equalification join level on equalification.l_id=level.l_id join board on equalification.bo_id=board.bo_id where e_id=$education_id");
    ?>
    <div class="title">College Information</div>
    <form action="#" id="personal_detail_form" method="POST">
    <?php while($education = mysqli_fetch_array($sql)){?>
        <div class="form-group">
            <label>Level Name</label>
            <input type="text" placeholder="update level name" name="level" value="<?php echo $education['l_name'];?>"> 
            <input type="hidden" name="l_id" value="<?php echo $education['l_id']?>" > 
        </div>
        <div class="form-group">
            <label>Board Name</label>
            <input type="text" placeholder="update board" name="board" value="<?php echo $education['bo_name'];?>">
            <input type="hidden" name="bo_id" value="<?php echo $education['bo_id']?>" > 
        </div>
        <div class="form-group">
            <label>Passed Year</label>
            <input type="text" placeholder="update Year" name="year" value="<?php echo $education['passed_year'];?>">
        </div>
        <div class="form-group">
            <label>Percentage</label>
            <input type="text" placeholder="update percentage" name="percentage" value="<?php echo $education['percentage'];?>"> 
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
$e_id = $_GET['id'];
$l_id = $_POST['l_id'];
$bo_id = $_POST['bo_id'];
$level = $_POST['level'];
$board = $_POST['board'];
$year = $_POST['year'];
$percentage =  $_POST['percentage'];	
 $result = mysqli_query($conn, "UPDATE equalification SET passed_year ='$year', percentage=$percentage WHERE e_id=$education_id");
 $result1 = mysqli_query($conn, "UPDATE level SET l_name='$level' WHERE l_id=$l_id");
 $result2 = mysqli_query($conn, "UPDATE board SET bo_name='$board' WHERE bo_id=$bo_id");
header("Location: educationtable.php");
}
?>