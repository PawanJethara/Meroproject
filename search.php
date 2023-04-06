<?php include("connection.php");?>

<?php    
    $output="";
    
    if(isset($_POST['submit'])){
        $input=$_POST['input'];
        if(!empty($input)){

            // $query = mysqli_query($conn, "SELECT * FROM test where firstname like '%$input%' ");
           $student_res = mysqli_query($conn, "SELECT studentd.*,name.fname,name.lname,name.mname FROM studentd join name on name.n_id = studentd.n_id  where fname like'$input'");
            
            
            $output .="
            <table class='table table-bordered table-stripped'>
            <tr>
                <th>S_id</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Date of Birth</th>
                <th>gender</th>
            </tr>
            ";
            // var_dump('$result'); die();
            if(mysqli_num_rows($student_res)<1){
                $output .="
                <tr>
                <td colspn='6' class='text-center'>NO data found</td>
                </tr>
                ";
                // var_dump('$result'); die();
            }
            else{
                while($row= mysqli_fetch_array($student_res)){
                    $output .="
                <tr>
                <th>".$row['s_id']."</th>
                <th>".$row['fname']." ".$row['mname']." ".$row['lname']."</th>
                <th>".$row['phone']."</th>
                <th>".$row['email']."</th>
                <th>".$row['dob']."</th>
                <th>".$row['gender']."</th>
                </tr>
                    ";
                }
            }
        }

    }
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>

        <form class="example" action="" method="POST">
        <input type="text" placeholder="Search.." name="input">
        <button type="submit" name="submit"><i class="fa fa-search"></i>Search</button>
        </form>

        <?php
        echo $output;
        ?>

    </body>
</html>