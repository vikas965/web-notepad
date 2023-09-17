<?php
session_start();

include "connect.php";
if(isset($_POST['submit'])){
            
    $uname = $_POST['username'];
    $password=md5( $_POST['password']);

    $sql = "SELECT * from note_users where user_name='$uname' and user_pwd='$password'";
    $result = mysqli_query($con,$sql);
    if($result)
    {
        $row= mysqli_fetch_assoc($result);
        $_SESSION['id'] = $row['user_id'];
        
        header("Location:index.php");
        
    }
}

?>

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
        <h1 class="text-center">SIGNIN HERE</h1>
    <form class="row g-3" method="post">
        

    <input type="text" name="username" class="form-control" id="inputAddress" placeholder="USERNAME">
  
  

    <input name="password" type="password" class="form-control" id="inputPassword4"placeholder="PASSWORD">
 


 

  
  

  <div class="col-12 mx-auto">
    <input name="submit" type="submit" class="btn btn-primary m-auto w-50" value="Login">
  </div>
</form>
    </body>

</html>