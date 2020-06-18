<?php
require 'assets/php/1.php';
require 'assets/php/2.php';
?>

<html>
<head>
	<title>LOGIN PAGE</title>
	<link rel="stylesheet" href="assets/css/login.css">
</head>
<body bgcolor=lightblue>
  <!-- Modal action sends the input of the form to the page specified -->
  <form class="modal" action="login.php" method="POST">  
    
      <br><br> 
     <br>
      <b>First Name</b><br>
      <input type="text"  placeholder="First Name" name="First_Name" 
      value="<?php 
      if(isset($_SESSION['First_Name']))  //isset($_SESSION[]) is responsible for not deleting the element if it follows the format 
      {
        echo $_SESSION['First_Name'];
      } ?>" required style="margin-left: 0px;"><br>
      <?php if(in_array("your first name should be between 2 and 25 characters <br>", $error_array)) echo "your first name should be between 2 and 25 characters <br>"; ?>
      <!-- checks whether it is in the array and if the name is entered wrong then it displays the appropriate message -->
      <br>


      <b>Last Name</b><br>
      <input type="text"  placeholder="Last Name" name="Last_Name" 
      value="<?php 
      if(isset($_SESSION['Last_Name']))//isset($_SESSION[]) is responsible for not deleting the element if it follows the format 
      {
        echo $_SESSION['Last_Name'];
      } ?>" required style="margin-left: 0px;"><br>
      <?php if(in_array("your last name should be between 2 and 25 characters <br>", $error_array)) echo "your last name should be between 2 and 25 characters <br>"; ?>
      <br>

      <b>E-mail</b><br>
      <input type="Email"  placeholder="E-mail" name="Email1" required 
      value="<?php 
      if(isset($_SESSION['Email1']))//isset($_SESSION[]) is responsible for not deleting the element if it follows the format 
      {
        echo $_SESSION['Email1'];
      } ?>"><br>
      <br>



      <b>Confirm Email</b><br>
      <input type="Email"  placeholder="confirm E-mail" name="Email2" required 
      value="<?php 
      if(isset($_SESSION['Email2']))//isset($_SESSION[]) is responsible for not deleting the element if it follows the format 
      {
        echo $_SESSION['Email2'];
      } ?>"><br>

      <?php if(in_array("email already in use <br>", $error_array)) echo "email already in use <br>";
            else if(in_array("invalid email format <br>", $error_array)) echo "invalid email format <br>";
            else if(in_array("Emails don't match <br>", $error_array)) echo "Emails don't match <br>"; 
      ?>
      <br>



      <b>Password</b><br>
      <input type="password" placeholder="Password" name="psw1" required><br><br>
      <b>Confirm Password</b><br>
      <input type="password"  placeholder="Password" name="psw2" required><br><br>

      <?php if(in_array("your password do not match <br>", $error_array)) echo "your password do not match <br>";
            else if(in_array("your passwords can only contain english caharacters or numbers <br>", $error_array)) echo "your passwords can only contain english caharacters or numbers <br>";
            else if(in_array("your password must be between 5 and 30 characters <br>", $error_array)) echo "your password must be between 5 and 30 characters <br>";
      ?>
      
      <input type="submit" style="margin-left: 270px;" name="submit_btn">
      <input type="checkbox"  checked="checked" name="remember" style="height:15px;   margin-left: 80px;"><font size="5"> Remember me</font>
      
      <?php if(in_array("<span style='color:red;'> Yaayyyy signup successful. Now you can login </span>", $error_array)) echo "<span style='color:red;'> Yaayyyy signup successful. Now you can login </span>";?>
      

      <b style="font-size:20px; margin-left: 50px">Forgot <a href="#">password?</a></b>
   </form>
  </body>
</html>