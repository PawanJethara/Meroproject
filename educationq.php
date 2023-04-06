<?php
session_start();
?>
<html>

<head>
    <title>Student Details</title>
    <link rel="stylesheet" href="style3.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <script>
    function validateForm() {
        let x = document.forms["myForm"]["passed"].value;
        let y = document.forms["myForm"]["percentage"].value;
        let z = document.forms["myForm"]["level"].value;
        let w = document.forms["myForm"]["board"].value;
        if (z == "") {
            alert("Level must be filled out");
            return false;
        }
        if (w == "") {
            alert("Why not you select board");
            return false;
        }
        if (x == "") {
            alert("Passed Year must be filled out");
            return false;
        }
        if (y == "") {
            alert("Percentage must be filled out");
            return false;
        }

    }
    </script>
    <h2 style=text-align:center>Students Information</h2>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Student Details</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 ml-auto">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="index.php">Address</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="educationq.php">Education</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="collegeinfo.php">Cinformation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="finformation.php">Finformation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="personaltable.php">View List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=""></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=""></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    </div>
    <?php  include("connection.php");
$level_res = mysqli_query($conn, "SELECT * FROM level");
$board_res = mysqli_query($conn, "SELECT * FROM board"); 
?>
    <div class="container">
        <div class="title">Education Information</div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST"
            onsubmit="return validateForm()" name='myForm'>

            <div class="form-group">
                <label>Level</label>
                <select name="level" class="">
                    <option></option>
                    <?php while($level = mysqli_fetch_array($level_res)){?>
                    <option value="<?php echo $level['l_id'];?>"><?php echo $level['l_name'];?></option>
                    <?php }?>
                </select>
            </div>

            <div class="form-group">
                <label>Board</label>
                <select name="board" class="">
                    <option></option>
                    <?php while($board = mysqli_fetch_array($board_res)){?>
                    <option value="<?php echo $board['bo_id'];?>"><?php echo $board['bo_name'];?></option>
                    <?php }?>
                </select>
            </div>
            <div class="form-group">
                <label>Passed Year</label>
                <input type="text" placeholder="Enter passed year" name="passed" id="passed_year" value="">
                <span id="message"></span>
            </div>
            <div class="form-group">
                <label>Percentage</label>
                <input type="number" placeholder="Enter Percentage" name="percentage">
        </form>
        <div class="button">
            <input type="submit" name="submit" value="submit">
        </div>
    </div>
</body>

</html>

<?php 

  if(isset($_POST['submit'])){
    $s_id = $_SESSION["person_id"];
	$level     = $_POST['level'];
    $board     = $_POST['board'];
    $passed    = $_POST['passed'];
    $percentage     = $_POST['percentage'];

    $query1 = "INSERT INTO equalification (l_id, bo_id,passed_year,percentage,s_id)
    VALUES ('$level',$board, $passed, $percentage,$s_id)";
    $data1 = mysqli_query($conn,$query1);
    // var_dump($_POST['submit']); die();
    if($data1){
      echo "Data inserted into database";
  }
  else{
      echo "Data are not inserted into database";	
  }
}
?>