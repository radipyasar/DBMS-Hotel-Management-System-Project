<?php
  session_start();
  include("database.php");
  $message = "";
  if(isset($_POST["confirm"])){
    $_SESSION["gphone"]=$_POST["gphone"];
    if(empty($_SESSION["gphone"])){
        $message = "Enter Your Number";
    }
    else{
        $sql = "select * from guest";
        $result = mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
            if($_SESSION["gphone"]==$row["phone"]){
                header("Location: index4.php");
            }
            else{
                $message="You did not register";
            }
        }
    }
  }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enquiry Page</title>
    <style>
        body{
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;   /* horizontal center */
            align-items: center;       /* vertical center */
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }

        .container{
            text-align: center;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }

        input{
            margin: 8px;
            padding: 8px;
        }

        input[type="submit"]{
            background: blue;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
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
        <h2>Enquiry</h2>
        <form action="index3.php" method="post">
            <label for="gphone">Phone: </label>
            <input type="text" id="gphone" name="gphone">
            <br>
            <input type="submit" name="confirm" value="Confirm">
            <p><?php echo $message; ?></p> <br>
            <a href="index.php" class="btn">Back</a>
        </form>
    </div>
</body>
</html>