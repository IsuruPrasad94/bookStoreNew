<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") 
   {
      // username and password sent from form 
      
      $myuseremail = $_POST['uemail'];
      $mypassword = $_POST['password'];
      
      $sqlS = "SELECT * FROM users WHERE u_email = '$myuseremail' and u_pwrd = '$mypassword'";
      $result = mysqli_query($con,$sqlS);
      $row = mysqli_fetch_array($result);
      $active = $row['u_status'];
      $name=$row['u_name'];

      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
    
      if($count == 1) {
         
         $_SESSION['login_user'] = $name;
         
         header("location: welcome.php");
      }else {
         echo "<script>alert('Email/password Incorrect');</script>";
      }
   }
?>
<!DOCTYPE html>
<html>
   
   <head>
      <title>Login Page</title>
          <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
            crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="CSS/style.css">

      
      
   </head>
   
   <body>
    <form method="POST">
      <div id="form_wrapper">
            <div id="form_left">
                <img src="img/home_img.jpg" alt="computer icon">
            </div>
            <div id="form_right">
                <h1>Member Login</h1>
                <div class="input_container">
                    <i class="fas fa-envelope"></i>
                    <input placeholder="Email" type="email" name="uemail" id="field_email" class='input_field'>
                </div>
                <div class="input_container">
                    <i class="fas fa-lock"></i>
                    <input  placeholder="Password" type="password" name="password" id="field_password" class='input_field'>
                </div>
                <input type="submit" value="Login" id='input_submit' class='input_field'>
                
            </div>
        </div>
      </form>
   </body>
</html>