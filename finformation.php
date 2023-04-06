<?php
$error="";
$Mothername="";
$Fatherno="";
$Motherno="";
$Guardianno="";
$Guardianname="";
if(isset($_POST['submit'])){
$Father_name=$_POST['faname'];
$Mother_name=$_POST['moname'];
$Father_Number=$_POST['fnumber'];
$Mother_Number=$_POST['mnumber'];
$Guardian_name=$_POST['gname'];
$Guardian_number=$_POST['gnumber']; 
if(empty($Father_name)){
  $error="Father Name required";
}
if(empty($Mother_name)){
  $Mothername="Mother Name required";
}
if(strlen($Father_Number)<=9){
  $Fatherno="Number should be greather than 9 character";
}
if(strlen($Mother_Number)<=9){
  $Motherno="Number should be greather than 9 character";
}
if(empty($Guardian_name)){
  $Guardianname=" Please Enter the Guardian Name";
}
if(strlen($Guardian_number)<=9){
  $Guardianno="Number should be greather than 9 character";
}
}
?>
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
        let x = document.forms["myForm"]["faname"].value;
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
            alert("Father name required");
            return false;
        }
        if (y == "") {
            alert("Percentage must be filled out");
            return false;
        }

    }
    function validateName() {
        let x = document.forms["myForm"]["faname"].value;
        if (x == "") {
        alert("Please Enter Name");
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
                        <a class="nav-link " href="educationq.php">Equalification</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="collegeinfo.php">Cinformation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="finformation.php">Finformation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="personaltable.php">View List</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    </div>
    <div class="container">
        <div class="title">Family Information</div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" onsubmit="return validateForm()" name='myForm'>
            <div class="form-group">
                <label>Father Name</label>
                <input type="text" placeholder="Enter Father Name" name="faname" onkeyup="return validateName()">
                <P class="error" name="error"></p><?php echo $error;?> 
            </div>
            <div class="form-group">
                <label>Father Number</label>
                <input type="text" placeholder="Enter Father Number" name="fnumber" >
                <P class="Ftaherno" name="Fatherno"></p><?php echo $Fatherno;?> 
            </div>
            <div class="form-group">
                <label>Mother Name</label>
                <input type="text" placeholder="Enter Mother Name" name="moname">
                <P class="Mothername" name="Mothername"><?php echo $Mothername;?>
            </div>
            <div class="form-group">
                <label> Mother Number</label>
                <input type="text" placeholder="Enter Mother Number" name="mnumber"><?php echo $Motherno;?>
            </div>
            <div class="form-group">
                <label>Guardian Name</label>
                <input type="text" placeholder="Enter Guardian Name" name="gname"><?php echo $Guardianname;?>
            </div>
            <div class="form-group">
                <label>Guardian Number</label>
                <input type="text" placeholder="Enter Guardian Number" name="gnumber"><?php echo $Guardianno;?>
            </div>
            <div class="button">
                <input type="submit" name="submit">
            </div>
        </form>
    </div>
</body>

</html>

<?php include("connection.php"); ?>
<?php 
//var_dump($_POST['submit']); die();
if(isset($_POST['submit'])){
    $s_id = $_SESSION["person_id"];
	$faname      = $_POST['faname'];
    $fnumber     = $_POST['fnumber'];
    $moname      = $_POST['moname'];
    $mnumber     = $_POST['mnumber'];
    $gname       = $_POST['gname'];
    $gnumber     = $_POST['gnumber'];

    $query = "INSERT INTO finformation (fathername, fathernumber, mothername, mothernumber, guardianname, guardiannumber,s_id)
    VALUES ('$faname', '$fnumber', '$moname', '$mnumber', '$gname','$gnumber',$s_id)";
    $data3 = mysqli_query($conn,$query);

    if($data3){
      echo "Data inserted into database";
  }
  else{
      echo "Data are not inserted into database";	
  }
}
?>