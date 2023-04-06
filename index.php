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
        let w = document.forms["myForm"]["address"].value;
        let x = document.forms["myForm"]["country"].value;
        let y = document.forms["myForm"]["province"].value;
        let z = document.forms["myForm"]["district"].value;
        let m = document.forms["myForm"]["city"].value;
        let n = document.forms["myForm"]["ward"].value;
        if (w == "") {
            alert("Please enter the address type");
            return false;
        }
        if (x == "") {
            alert("Please Select the country name");
            return false;
        }
        if (y == "") {
            alert("Please Select your correct province");
            return false;
        }
        if (z == "") {
            alert("Please Select your correct district");
            return false;
        }
        if (m == "") {
            alert("Please Select your correct city");
            return false;
        }
        if (n == "") {
            alert("Please Select your ward no.");
            return false;
        }
    }
    </script>

  <h2 style=text-align:center>Students Information</h2>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Student Details</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 ml-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Address</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="educationq.php">Equalification</a>
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
        </ul>
      </div>
    </div>
  </nav>
</div>
<?php  include("connection.php");
$country_res = mysqli_query($conn, "SELECT * FROM country");
$district_res = mysqli_query($conn, "SELECT * FROM district");
$province_res = mysqli_query($conn, "SELECT * FROM province"); 
$city_res = mysqli_query($conn, "SELECT * FROM city"); 
?>

<div class="container">
  <div class="title">Address Information</div>
  <form action="#" method="POST" onsubmit="return validateForm()" name='myForm'>
    <div class="form-group">
      <label>Address Type</label>
      <select name="address">
      <option></option>
        <option>Permanent</option>
        <option>Temporary</option> 
      </select>
    </div>  

    <div class="form-group">
      <label>Country Name</label>
      <select name="country" class="">
       <option></option>
       <?php while($country = mysqli_fetch_array($country_res)){?>
        <option value="<?php echo $country['c_code'];?>"><?php echo $country['cname'];?></option>
      <?php }?>
    </select>
  </div>

  <div class="form-group">
    <label>Province Name</label>
    <select name="province" class="">
      <option></option>
    </select>
  </div>

  <div class="form-group">
    <label>District Name</label>
    <select name="district" class="">
      <option></option>
    </select>
  </div>

  <div class="form-group">
    <label>City Name</label>
    <select name="city" class="">
      <option></option>
    </select>
  </div>

  <div class="form-group">
    <label>Ward no.</label>
    <input type="text" placeholder="Enter ward number" name="ward">
  </div> 
  <div class="button">
    <input type="submit" name="submit">
  </div>
</form>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $( "select[name='province']" ).change(function () {
        var p_id = $(this).val();
        if(p_id) {


            $.ajax({
                url: "ajax.php",
                dataType: 'Json',
                data: {'id':p_id},
                success: function(data) {
                    $('select[name="district"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="district"]').append('<option value="'+ key +'">'+ value +'</option>');
                    });
                }
            });


        }else{
            $('select[name="district"]').empty();
        }
    });

    $( "select[name='country']" ).change(function () {
        var p_id = $(this).val();
        if(p_id) {


            $.ajax({
                url: "country.php",
                dataType: 'Json',
                data: {'id':p_id},
                success: function(data) {
                    $('select[name="province"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="province"]').append('<option value="'+ key +'">'+ value +'</option>');
                    });
                }
            });


        }else{
            $('select[name="province"]').empty();
        }
    });

    $( "select[name='district']" ).change(function () {
        var ci_id = $(this).val();
        if(ci_id) {


            $.ajax({
                url: "city.php",
                dataType: 'Json',
                data: {'id':ci_id},
                success: function(data) {
                    $('select[name="city"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="city"]').append('<option value="'+ key +'">'+ value +'</option>');
                    });
                }
            });


        }else{
            $('select[name="city"]').empty();
        }
    });
</script>
</div>
</body>
</html>

<?php 

if(isset($_POST['submit'])){
  $s_id =$_SESSION["person_id"]; 
  $address     = $_POST['address'];
  $country     = $_POST['country'];
  $province     = $_POST['province'];
  $district     = $_POST['district'];
  $city     = $_POST['city'];
  $ward     = $_POST['ward'];
// var_dump($address,$country,$province,$district); die();
  $query1 = "INSERT INTO address1 (s_id,address_type, c_code,dp_code,p_id,ci_id,ward_no)
  VALUES ($s_id,'$address',$country, $district, $province,$city,$ward)";
    // var_dump($query1); die();
  $data1 = mysqli_query($conn,$query1);
  
  if($data1){
    echo "Data inserted into database";
  }
  else{
    echo "Data are not inserted into database";	
  }
}
?>