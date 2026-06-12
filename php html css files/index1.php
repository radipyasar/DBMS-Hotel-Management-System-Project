<?php
    include("database.php");
    $message = "";

    if(isset($_POST["register"])){

        $name = $_POST["gname"];
        $phone = $_POST["gphone"];
        $email = $_POST["gmail"];

        if(empty($name) || empty($phone) || empty($email)){

            $message = "Fill all the fields";

        }

        
        else if(!preg_match("/^[0-9]{11}$/",$phone)){

            $message = "Couldn't Register";

        }

        
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){

            $message = "Couldn't Register";

        }

        else{

            $sql = "insert into guest(name,phone,email)
                    values('{$name}','{$phone}','{$email}')";

            try{

                mysqli_query($conn,$sql);
                $message = "Registered";

            }catch(mysqli_sql_exception){

                $message = "Couldn't Register";

            }
        }
    }

    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    
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
        <h2>REGISTRATION PANEL</h2>
        <form action="index1.php" method="post">
            <label for="gname">Name: </label>
            <input type="text" id="gname" name="gname">
            <br>
            <label for="gphone">Phone: </label>
            <input type="text" id="gphone" name="gphone">
            <br>
            <label for="gmail">Email: </label>
            <input type="email" id="gmail" name="gmail">
            <br>
            <input type="submit" name="register" value="Register">
            <p><?php echo $message; ?></p> <br>
            <a href="index.php" class="btn">Back</a>
        </form>
    </div>
</body>
</html>