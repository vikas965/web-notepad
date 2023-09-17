<?php

include "connect.php";

if(isset($_POST['submit'])){
     
    
    $uname = $_POST['username'];
    // $number =  $_POST['number'];
    $email = $_POST['email'];
    $password =  md5($_POST['password']);
    $cpassword =  md5($_POST['cpassword']);

   if($password == $cpassword)
   {
    $sql = "INSERT INTO note_users(user_name,user_pwd) VALUES('$uname','$password')";
    $result = mysqli_query($con,$sql);
    if($result)
    {
        echo "<script>alert('Registered succesfully')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    }
    else{
       die(mysqli_error($con));
    }
   }
   else{
    echo "<script>alert('Passwords doesn't match')</script>";
   }
    
    
    
}

?>

<!DOCTYPE html>

</html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
      <style>
        body{
            padding:30px;
          display:flex;
          align-items:center;
          justify-content:center;
          flex-direction:column;
        
            
        }

        form{
            border:solid 1px black;
            border-radius:8px;
            /* height:100%; */
            padding:70px;
            padding-top:40px;
            padding-bottom:40px;
            width:80%;
        }
        h1{
            margin-bottom:50px;
        }
      </style>
    </head>

    <body>
        <h1 class="text-center">SIGNUP HERE</h1>
    <form class="row g-3" method="post">
        

    <input type="text" name="username" class="form-control" id="inputAddress" placeholder="USERNAME">
  
  

    <input name="password" type="password" class="form-control" id="inputPassword4"placeholder="PASSWORD">
 


    <input name="cpassword" type="password" class="form-control" id="inputPassword4" placeholder="CONFIRM PASSWORD">

  
  

  <div class="col-12 mx-auto">
    <input name="submit" type="submit" class="btn btn-primary m-auto w-50" value="LOGIN">
  </div>
</form>
    </body>

</html>