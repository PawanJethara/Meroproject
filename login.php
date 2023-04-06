<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 10%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
  text-align:center;
  border:1px solid black;
  background-color: gray;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>
<form action="" method="POST">
  <!-- <div class="imgcontainer">
    <img src="img_avatar2.png" alt="Avatar" class="avatar">
  </div> -->

  <div class="container">
  <?php 

$error="";
$success="";
$header="";
if(isset($_POST['submit'])){
    $username=$_POST['username'];
$password=$_POST['password'];
    if($username=="pawan"){
        if($password=="pawan1"){
             $error="";
             $success="Welcome Admin";
             header('Location: personalinfo.php');
             die();
        }
        else{
            $error="Invalid Password";
            $success=""; 
        }
    }
    else{
        $error="Invalid User";
        $success="";
    }
}
  ?>
  <h2>Login Form</h2>
   <P class="error" name="error"><?php echo $error;?></p>
   <P class="success" name="success"><?php echo $success;?></p>
    <label for="username"><b>Username:</b></label>
    <input type="text" placeholder="Enter Username" name="username" required><br><br>
    <label for="password"><b>Password:</b></label>
    <input type="password" placeholder="Enter Password" name="password" required><br><br>
        
    <button type="submit" name="submit">Login</button><br><br>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label><br><br>
  </div>

  <!-- <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div> -->
</form>

</body>
</html>

 