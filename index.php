
<?php 
session_start();


 include "connect.php";

 if(!isset($_SESSION['id']))
 {
    header("Location: login.php");
 }

if(isset($_POST['add']))
{
    $user_id = $_SESSION['id'];
    $content = $_POST['content'];
    // $contname = $_POST['contname'];
    
    $que = "INSERT INTO contents(content_data,user_id) VALUES('$content',$user_id)";
    $res = mysqli_query($con,$que);
    if($res)
    {
        echo "<script>window.alert('Added Succesfully')</script>";
        header("Location: index.php");
    }
} 




?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="notepad.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" > -->
  </head>
</head>
<body>
    <style>
        body{
            /* background:black; */
            overflow-x:hidden;
        }
        .tooltip1 {
  position: relative;
  display: inline-block;
  /* border-bottom: 1px dotted black; If you want dots under the hoverable text */
}

.tooltip1 .tooltiptext1 {
  visibility: hidden;
  width: auto;
  background-color: black;
  color: #fff;
  text-align: center;
  padding: 5px 10px;
  
  border-radius: 11px;
  border-bottom-left-radius: 0;
  /* Position the tooltip text - see examples below! */
  position: absolute;
bottom: 25px;
left: 5px;
  z-index: 1;
}

/* Show the tooltip text when you mouse over the tooltip container */
.tooltip1:hover .tooltiptext1 {
  visibility: visible;
}

        .show_notes{
            width:100%;
            display:flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            gap:60px;
            padding-top:100px;
        }

        .box{
            width: 240px;
            height: 130px;
            border: solid 1px black;
            border-radius:10px;
            background: rgba(255, 255, 255, 0);
            color: black;
            display:flex;
            align-items:center;
            gap: 40px;
            justify-content: center;
            
        }
        
    </style>
    

   
        <input name="contname" type="text" placeholder="Note Name" required>
      

    <button onclick="toggleDiv()">TOGGLE NOTEPAD</button>


    <div class="paper" id="paper">
        <div class="paper-content">
        <form action="" method="post">
            <textarea name="content" autofocus></textarea>
           
        </div>
    </div>
    <input name="add" type="submit" value="SAVE">
    </form>
    
    <div class="show_notes">
        
        

        <?php 
        
        $que_data = "SELECT * FROM  contents where user_id=1 ";
        $get_data = mysqli_query($con,$que_data);
        while($row=mysqli_fetch_assoc($get_data))
        {
            echo "
                
                
               <div class='box'>
              
                <div class='tooltip1'>
                    <a href=''><i class='fa-solid fa-eye'></i></a>
                    <span class='tooltiptext1'>VIEW</span>
                 </div>


                <div class='tooltip1'>

                    <a href=''><i class='fa-solid fa-edit'></i></a>
                    <span class='tooltiptext1'>EDIT</span>
                 </div>


               

              <div class='tooltip1'>
              <a href='' class=''><i class='fa-solid fa-trash'></i></a>
              <span class='tooltiptext1'>DELETE</span>
           </div>


                 <div class='tooltip1'>
                 <a href='download_data.php?file_id={$row['content_id']}' class='tag'><i class='fa-solid fa-download'></i></a>
                 <span class='tooltiptext1'>DOWNLOAD</span>
              </div>
                
                
               
           
              </div>

                ";
        }

        
        ?>

       

        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script>
       function toggleDiv() {
            var div = document.getElementById("paper");
            if (div.style.display === "none" || div.style.display === "") {
                div.style.display = "block";
            } else {
                div.style.display = "none";
            }
        }
    </script>
</body>
</html>






