<?php
   
   if(isset($_POST["register"])){
    header("Location: index1.php");
    exit();
   }
   if(isset($_POST["check"])){
    header("Location: index2.php");
    exit();
   }
    if(isset($_POST["bcheck"])){
    header("Location: index3.php");
    exit();
   }
   if(isset($_POST["service"])){
    header("Location: index5.php");
    exit();
   }
   if(isset($_POST["out"])){
    header("Location: index10.php");
    exit();
   }
   if(isset($_POST["review"])){
    header("Location: index11.php");
    exit();
   }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
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
    </style>
</head>
<body>
   <div class="container">
    <h2>HOTEL MANAGEMENT SYSTEM</h2>
    <form action="index.php" method="post">
        <input type="submit" name="register" value="Register"> 
        <input type="submit" name="check" value="Check Avaialable Rooms">
        <input type="submit" name="bcheck" value="Check Your Bookings">
        <input type="submit" name="service" value="Exclusive Services">
        <input type="submit" name="out" value="Room Check Out">
        <input type="submit" name="review" value="Reviews">
    </form>
   </div>  
</body>
</html>