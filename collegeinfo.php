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
    function MyForm() {
        let w = document.forms["myForm"]["cname"].value;
         let x = document.forms["myForm"]["batch"].value;
         let y = document.forms["myForm"]["class"].value;
         let z = document.forms["myForm"]["subject"].value;
         let m = document.forms["myForm"]["rollno"].value;
          
        if (w == "") {
            alert("Where is the college name");
            return false;
        }
        if (x == "") {
            alert("Your batch field is empty");
            return false;
        }
        if (y == "") {
            alert("Class field is necessary to fill");
            return false;
        }
        if (z == "") {
           alert("Which Subject you want to choose");
            return false;
         }
         if (m == "") {
           alert("Rollno is necessary field");
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
                        <a class="nav-link active" href="collegeinfo.php">Cinformation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="finformation.php">Finformation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="personaltable.php">View List</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    </div>

    <?php  include("connection.php");
$class_res = mysqli_query($conn, "SELECT * FROM class");
$batch_res = mysqli_query($conn, "SELECT * FROM batch");
$subject_res = mysqli_query($conn, "SELECT * FROM subject");  
?>

    <div class="container">
        <div class="title">College Information</div>
        <form action="" method="POST"
        onsubmit="return MyForm()" name='myForm'>
            <div class="form-group">
                <label>College Name</label>
                <input type="text" placeholder="Enter college name" name="cname">
            </div>

            <div class="form-group">
                <label>Batch Name</label>
                <select name="batch" class="">
                    <option></option>
                    <?php while($batch = mysqli_fetch_array($batch_res)){?>
                    <option value="<?php echo $batch['ba_id'];?>"><?php echo $batch['bname'];?></option>
                    <?php }?>
                </select>
            </div>

            <div class="form-group">
                <label>Class Name</label>
                <select name="class" class="">
                    <option></option>
                    <?php while($class = mysqli_fetch_array($class_res)){?>
                    <option value="<?php echo $class['cl_id'];?>"><?php echo $class['cl_name'];?></option>
                    <?php }?>
                </select>
            </div>

            <div class="form-group">
                <label>Subject Name</label>
                <select name="subject" class="">
                    <option></option>
                    <?php while($subject = mysqli_fetch_array($subject_res)){?>
                    <option value="<?php echo $subject['sub_code'];?>"><?php echo $subject['sub_name'];?></option>
                    <?php }?>
                </select>
            </div>

            <div class="form-group">
                <label>Roll Number</label>
                <input type="text" placeholder="Enter Roll Number" name="rollno">
            </div>

            <div class="button">
                <input type="submit" name="submit">
            </div>
    </div>
    </form>
</body>

</html>

<?php 

  if(isset($_POST['submit'])){
    $s_id = $_SESSION["person_id"];
	$cname     = $_POST['cname'];
    $batch     = $_POST['batch'];
    $class     = $_POST['class'];
    $subject   = $_POST['subject'];
    $rollno      = $_POST['rollno'];
    
    $query = "INSERT INTO coinformation (coname, ba_id, cl_id, sub_code, rollno,s_id)
    VALUES ('$cname',$batch, $class, $subject, $rollno,$s_id)";
    $data = mysqli_query($conn,$query);
    // var_dump($_POST['submit']); die();
    
     
    if($data){
      echo "Data inserted into database"; 
  }
  else{
      echo "Data are not inserted into database";	
  }
}
?>