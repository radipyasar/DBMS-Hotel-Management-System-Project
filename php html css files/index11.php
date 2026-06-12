<?php
     if(isset($_POST["rreview"])){
        header("Location: index12.php");
        exit();
     }
     if(isset($_POST["sreview"])){
        header("Location: index13.php");
        exit();
     }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Page</title>
    <style>
        body{
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }

        .container{
            text-align: center;
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
            width: 300px;
        }

        h2{
            margin-bottom: 30px;
        }

        input[type="submit"]{
            width: 200px;
            padding: 10px;
            margin: 10px 0;
            background: blue;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover{
            background: darkblue;
        }
        .btn{
            margin-top: 20px;
            padding: 10px 20px;
            background: blue;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn:hover{
            background: darkblue;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>REVIEWS</h2>
    <form action="index11.php" method="post">
        <input type="submit" name="rreview" value="Room Reviews"> 
        <input type="submit" name="sreview" value="Service Reviews">
        
        <br>
        <br>
        <a href="index.php" class="btn">BACK</a>
    </form>
   </div>  
</body>
</html>