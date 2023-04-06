<html>
<head>
    <title>Student Details</title>
    <link rel="stylesheet" href="style3.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.21.3/dist/bootstrap-table.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.21.3/dist/bootstrap-table.min.js"></script>
</head>

<body>
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
                        <a class="nav-link " aria-current="page" href="personaltable.php">Personal Information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="addresstable.php">Address</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="familytable.php">Family Information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="collegetable.php">Cinformation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="educationtable.php">Education</a>
                    </li>
                </ul>
            </div>
    </nav>

    <form class="example" action="" method="POST">
        <input type="text" placeholder="Search.." name="search">
        <button type="submit" name="submit"><i class="fa fa-search"></i>Search</button>

        <table data-toggle="table">
            <h2 class="display-6 text-center">Students Address Information</h2>
            <thead>
                <tr>
                    <th>S.No.</th>
                    <th>Address type</th>
                    <th>Country</th>
                    <th>Province</th>
                    <th>District</th>
                    <th>City</th>
                    <th>Ward no</th>
                    <th>Operation</th>
                </tr>
            </thead>

            <?php  include("connection.php");?>

            <?php 
if(isset($_POST['submit'])){
  
      $input=$_POST['search'];
    $sql = mysqli_query ($conn, "SELECT address1.*,country.cname,district.dname,province.pname,city.ci_name
   FROM address1 join country on address1.c_code=country.c_code join district on address1.dp_code=district.dp_code 
   join province on address1.p_id=province.p_id join city on address1.ci_id=city.ci_id where ci_name like'$input'");
    }else{
    $sql = mysqli_query ($conn, "SELECT address1.*,country.cname,district.dname,province.pname,city.ci_name
   FROM address1 join country on address1.c_code=country.c_code join district on address1.dp_code=district.dp_code 
   join province on address1.p_id=province.p_id join city on address1.ci_id=city.ci_id ");
 }

?>
            <tr>
                <?php
          while ($row = mysqli_fetch_assoc($sql)){
          ?>
                <td><?php echo $row['a_id'];?></td>
                <td><?php echo $row['address_type'];?></td>
                <td><?php echo $row['cname'];?></td>
                <td><?php echo $row['pname'];?></td>
                <td><?php echo $row['dname'];?></td>
                <td><?php echo $row['ci_name'];?></td>
                <td><?php echo $row['ward_no'];?></td>
                <td bgcolor="red">
                    <a type="button" href="?id=<?php echo $row['a_id'];?>"
                        onClick="return confirm('Are you sure you want to delete?')">Delete</a>

                    <!-- <input type="button" name="update"  value="Update"> -->
                    <a type="button" href="updateaddress.php?id=<?php echo $row['a_id'];?>">Update</a>
                </td>
            </tr>
            <?php
          }
          ?>
        </table>
        </form>
        
</body>

</html>