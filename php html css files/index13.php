<?php
   
   include("database.php");

   $sql =  "SELECT service.service_name,
            round(AVG(service_review.rating)) AS average_rating
            FROM service
            LEFT JOIN service_review
            ON service.service_id = service_review.service_id
            GROUP BY service.service_id, service.service_name;";
    $result = mysqli_query($conn,$sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service reviews</title>
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
    <h2>Service Ratings</h2>

    <table>
        <tr>
            <th>SERVICE</th>
            <th>RATING</th>  
        </tr>

        <?php
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>".$row["service_name"]."</td>";
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