<?php
//declaring variables 
$fname="";//first name
$lname="";//last name
$em="";//email1
$em2="";//email2
$psw="";//password1
$psw2="";//password2
$date="";//date the user signed up
$error_array=array();//holds error message   now it is empty array


if(isset($_POST['submit_btn']))//if submit button is pressed then execute this if
{
  //first name
  $fname=strip_tags($_POST['First_Name']);//strip tags will delete any unwanted tags post is the method name
  $fname=str_replace(' ','', $fname);//remove unwanted spaces from the name
  $fname=ucfirst(strtolower($fname));//firstly convert all the letter to lower case and then capitalize the first variable
  $_SESSION['First_Name']=$fname;//stores the first name into session variable

  //last name
  $lname=strip_tags($_POST['Last_Name']);//strip tags will delete any unwanted tags post is the method name
  $lname=str_replace(' ', '', $lname);//remove unwanted spaces from the name
  $lname=ucfirst(strtolower($lname));//firstly convert all the letter to lower case and then capitalize the first variable
  $_SESSION['Last_Name']=$lname;//stores the last name into session variable

  //email
  $em=strip_tags($_POST['Email1']);//strip tags will delete any unwanted tags post is the method name
  $em=str_replace(' ', '', $em);//remove unwanted spaces from the name
  $em=ucfirst(strtolower($em));//firstly convert all the letter to lower case and then capitalize the first variable
  $_SESSION['Email1']=$em;//stores the Email1 into session variable

  //email2
  $em2=strip_tags($_POST['Email2']);//strip tags will delete any unwanted tags post is the method name
  $em2=str_replace(' ', '', $em2);//remove unwanted spaces from the name
  $em2=ucfirst(strtolower($em2));//firstly convert all the letter to lower case and then capitalize the first variable
  $_SESSION['Email2']=$em2;//stores the Email2 into session variable

  //password
  $psw=strip_tags($_POST['psw1']);//strip tags will delete any unwanted tags post is the method name
  $psw2=strip_tags($_POST['psw2']);//strip tags will delete any unwanted tags post is the method name
//we dont need to remove any spaces or convert upper to lower case for password

  $date=date("d-m-y");//current date

  if($em==$em2)
  {
    if(filter_var($em,FILTER_VALIDATE_EMAIL))//checks whether email is in valid format or not
    {
      $em=filter_var($em,FILTER_VALIDATE_EMAIL);


      $em_check=mysqli_query($con,"SELECT email FROM users WHERE email='$em'");//checks whether email is already present or not

      $n_rows=mysqli_num_rows($em_check);

      if($n_rows > 0)
      {
        array_push($error_array,"email already in use <br>"); 
      }
    }
    else
    {
      array_push($error_array,"invalid email format <br>");
    }
  }
  else
  {
    array_push($error_array,"Emails don't match <br>");
  }
  if(strlen($fname)>25 || strlen($fname)<2)
  {
    array_push($error_array,"your first name should be between 2 and 25 characters <br>");

  }
  if(strlen($lname)>25 || strlen($lname)<2)
  {
    array_push($error_array,"your last name should be between 2 and 25 characters <br>");
    
  }
  if($psw != $psw2)
  {
    array_push($error_array,"your password do not match <br>");
  }
  else 
  {
    if(preg_match('/[^A-Za-z0-9]/', $psw))//password must be in A-Z  a-z  0-9
      array_push($error_array,"your passwords can only contain english caharacters or numbers <br>");
  }
  if(strlen($psw)>30 || strlen($psw)<5)
  {
    array_push($error_array,"your password must be between 5 and 30 characters <br>");
    
  }


  if(empty($error_array))
  {
    $psw=md5($psw);//encrypts the passwords in the database

    //generate username by concatenating first and last name
    $username=strtolower($fname . "_" . $lname);
    $check_username_query=mysqli_query($con,"SELECT username FROM users WHERE username='$username'");//checks for the uniqueness of username

    $i=0;
    //if username exist add number to usuer name
    while(mysqli_num_rows($check_username_query) !=0)
    {
      $i++;
      $username=$username . "_" . $i;
      $check_username_query=mysqli_query($con,"SELECT username FROM users WHERE username='$username'");//checks untill the username created by adding a number is unique
    }

    //random profile pics assignment
    $r=rand(1,4); //selects random number between 1 to 4
    if($r==1)
      $profile_pic="assets/images/profile_pics/default/1.png";
    else if($r==2)
      $profile_pic="assets/images/profile_pics/default/2.png";
    else if($r==3)
      $profile_pic="assets/images/profile_pics/default/3.png";
    else if($r==4)
      $profile_pic="assets/images/profile_pics/default/4.png";


    $query=mysqli_query($con, "INSERT INTO users VALUES('', '$fname', '$lname', '$username', '$em',  '$psw',  '$date', '$profile_pic')");
    array_push($error_array, "<span style='color:red;'> Yaayyyy signup successful. Now you can login </span>");


    //clear sessons variable
    $_SESSION['First_Name']="";
    $_SESSION['Last_Name']="";
    $_SESSION['Email1']="";
    $_SESSION['Email2']="";
  }
}
?>