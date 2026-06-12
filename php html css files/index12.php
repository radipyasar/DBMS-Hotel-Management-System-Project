<?php
   
   include("database.php");

   $sql =  "SELECT room.room_number,
            round(AVG(room_review.rating)) AS average_rating
            FROM room
            LEFT JOIN room_review
            ON room.room_id = room_review.room_id
            GROUP BY room.room_id, room.room_number;";
    $result = mysqli_query($conn,$sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room reviews</title>
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
    <h2>Room Ratings</h2>

    <table>
        <tr>
            <th>ROOM NO</th>
            <th>RATING</th>  
        </tr>

        <?php
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>".$row["room_number"]."</td>";
            echo "<td>".$row["average_rating"]."</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <br>
    <a href="index11.php" class="btn">BACK</a>
</div>
</body>
</html>