<?php
    include("database.php");
    $sql = "select * from service";
    $result = mysqli_query($conn,$sql);

    if(isset($_POST["book"])){
        header("Location: index6.php");
        exit();
    }
    if(isset($_POST["check"])){
        header("Location: index7.php");
        exit();
    }
    if(isset($_POST["cancel"])){
        header("Location: index9.php");
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exclusive Services</title>
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
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
            width: 500px;
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

        table{
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td{
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        th{
            background: blue;
            color: white;
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
        <h2>EXCLUSIVE SERVICES</h2>
        <table>
        <tr>
            <th>Service Name</th>
            <th>Price</th>
        </tr>

        <?php
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>".$row["service_name"]."</td>";
            echo "<td>".$row["price"]."</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <form action="index5.php" method="post">
        <input type="submit" name="book" value="Book a service">
        <br>
        <input type="submit" name="check" value="Check Your services">
        <br>
        <input type="submit" name="cancel" value="Cancel Your Service">
        <br>
        <br>
        <a href="index.php" class="btn">Back</a>
    </form>

    </div>
</body>
</html>


<?php
mysqli_close($conn);
?>
