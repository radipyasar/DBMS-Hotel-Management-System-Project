<?php
   session_start();

   include("database.php");

   $phone = $_SESSION["gphone"];

   $sql1 = "select * from guest as g join booking as b
            on g.guest_id=b.guest_id 
            join room as r on r.room_id=b.room_id
            where g.phone='{$phone}'";
    $result1 = mysqli_query($conn,$sql1);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Bookings</title>
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
    <h2>Your Bookings</h2>

    <table>
        <tr>
            <th>ROOM NO</th>
            <th>ROOM TYPE</th>  
        </tr>

        <?php
        while($row = mysqli_fetch_assoc($result1)){
            echo "<tr>";
            echo "<td>".$row["room_number"]."</td>";
            echo "<td>".$row["type"]."</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <br>
    <a href="index.php" class="btn">Home Page</a>
</div>
</body>
</html>

<?php
mysqli_close($conn);
?>