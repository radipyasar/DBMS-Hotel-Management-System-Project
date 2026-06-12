<?php
     session_start();

    include("database.php");

    $phone = $_SESSION["gphone"]; 

    $sql1= "select *
            from guest as g join service_booking as sb
            on g.guest_id=sb.guest_id
            join service as s on s.service_id=sb.service_id
            where g.phone='{$phone}'";
    $result1 = mysqli_query($conn,$sql1);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Services</title>
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
    <h2>Your Services</h2>

    <table>
        <tr>
            <th>Service</th> 
        </tr>

        <?php
        while($row = mysqli_fetch_assoc($result1)){
            echo "<tr>";
            echo "<td>".$row["service_name"]."</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <br>
    <a href="index5.php" class="btn">Back</a>
</div>
</body>
</html>

<?php
mysqli_close($conn);
?>