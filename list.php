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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.21.3/dist/bootstrap-table.min.css">
  </head>
  <body>
    <table data-toggle="table">
        <h2 class="display-6 text-center">Students Personal Information</h2> 
      <thead>
        <tr>
          <th>S.No.</th>
          <th>Name</th>
          <th>Phone</th>
          <th>Email</th>
          <th>DOB</th>
          <th>Gender</th>
          <th>Action</th>
        </tr>
      </thead>

<?php  include("connection.php");?>

<?php
$res = mysqli_query($conn, "SELECT  studentd.*,name.fname,name.mname,name.lname FROM studentd join name ON studentd.n_id =name.n_id");
?>
        <tr>
          <?php
          while($row = mysqli_fetch_assoc($res)){
          ?>
          <td><?php echo $row['s_id'];?></td>
          <td><?php echo $row['fname'].' '.$row['mname'].' '.$row['lname'];?></td>
          <td><?php echo $row['phone'];?></td>
          <td><?php echo $row['email'];?></td>
          <td><?php echo $row['dob'];?></td>
          <td><?php echo $row['gender'];?></td>
          <td bgcolor="red">
          <a type="button" href="delete.php?id=<?php echo $row['s_id'];?>" onClick="return confirm('Are you sure you want to delete?')">Delete</a>
           
           <!-- <input type="button" name="update"  value="Update"> -->
           <a type="button" href="updateform.php?id=<?php echo $row['s_id'];?>">Update</a>
           <a type="button" href="list.php">View</a>
          </td>
          </tr>
          <?php
          }
          ?>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.21.3/dist/bootstrap-table.min.js"></script>
  </body>
</html>