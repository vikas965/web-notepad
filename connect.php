<?php


$servername = "localhost";
$username = "root";
$password = "";
$database = "webnote";
$con = mysqli_connect($servername,$username,$password,$database);

if(!$con)
{
    die(mysqli_error($con));
}
// else{
//     echo "connected";
// }


?>