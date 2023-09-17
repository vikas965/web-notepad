<?php




 include "connect.php";
 header("Content-Type: text/plain");
 header("Content-Disposition: attachment; filename=\"example.txt\"");
 


if(isset($_GET['file_id']))
{
    $file_id = $_GET['file_id'];
    $que_data = "SELECT * FROM  contents where user_id=1 and content_id = $file_id";
    $get_data = mysqli_query($con,$que_data);
    
    
    
    
    
    
    
    
    
    while ($row=mysqli_fetch_assoc($get_data)) {
        // Format the data as desired (e.g., comma-separated values)
        $data =  $row['content_data'];
        
        // Output the data
        echo $data . "\n";
    }
    
}
?>
