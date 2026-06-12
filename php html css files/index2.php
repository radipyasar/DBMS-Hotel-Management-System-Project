<?php
    include("database.php");
    $done = false;
    $message = "";

    $sql = "select *
            from room as r join roomstatus as s
            on r.room_id=s.room_id
            where s.status='Available'";
    $result = mysqli_query($conn,$sql);

    if(isset($_POST["confirm"])){
        $phone = $_POST["gphone"];
        $room = $_POST["rno"];
        if(empty($phone)||empty($room)||!isset($_POST["credit"])){
            $message = "Fill All Fields";
        }
        else{
            $sql1 = "select * from guest";
            $sql2 = "select * from room as r join roomstatus as s
                     on r.room_id=s.room_id
                     where r.room_number={$room}";
            $result1 = mysqli_query($conn,$sql1);
            $result2 = mysqli_query($conn,$sql2);
            while($row1=mysqli_fetch_assoc($result1)){
                if($phone==$row1["phone"]){
                    while($row2=mysqli_fetch_assoc($result2)){
                        if($row2["status"]=="Available"){
                            $gid = "select * from guest
                                    where phone='{$phone}'";
                            $rid = "select * from room
                                    where room_number={$room}";
                            $g = mysqli_query($conn,$gid);
                            while($r1=mysqli_fetch_assoc($g)){
                                $x = $r1["guest_id"];
                            }
                            $r = mysqli_query($conn,$rid);
                            while($r2=mysqli_fetch_assoc($r)){
                                $y = $r2["room_id"];
                                $a = $r2["price"];
                            }
                            $book = "insert into booking(guest_id,room_id)
                                     values({$x},{$y})";
                            mysqli_query($conn,$book);
                            $bid = "select * from booking 
                                    where guest_id={$x} and room_id={$y}";
                            $b = mysqli_query($conn,$bid);
                            while($r3=mysqli_fetch_assoc($b)){
                                $z = $r3["booking_id"];
                            }
                            $method = $_POST["credit"];
                            $payment_record = "insert into payment(booking_id,amount,payment_method)
                                               values({$z},{$a},'{$method}')";
                            mysqli_query($conn,$payment_record);
                            $new = "update roomstatus
                                    set status='Unavailable'
                                    where room_id={$y}";
                            mysqli_query($conn,$new);
                            $done = true;
                            break;

                        }
                       
                    }
                }
                
            }
                        if($done){
                            $message = "Booking Successful";
                        }else{
                            $message = "You did not resister/Unavailable room";
                        }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Booking</title>
    
    <style>
            body{
                margin: 0;
                padding: 30px 0;
                background-color: #f4f4f4;
                font-family: Arial, sans-serif;
            }

            .container{
                width: 500px;
                margin: auto;
                text-align: center;
                background: white;
                padding: 30px;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0,0,0,0.2);
            }

            table{
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
                margin-bottom: 30px;
            }

            th, td{
                border: 1px solid black;
                padding: 12px;
                text-align: center;
            }

            th{
                background: blue;
                color: white;
            }

            form{
                margin-top: 10px;
            }

            .form-group{
                margin: 15px 0;
            }

            .form-group label{
                display: inline-block;
                width: 120px;
                text-align: right;
                margin-right: 10px;
                font-size: 18px;
            }

            .form-group input[type="text"],
            .form-group input[type="number"]{
                width: 180px;
                padding: 8px;
            }

            .payment{
                margin-top: 20px;
            }

            .payment label{
                font-size: 18px;
            }

            .payment-options{
                margin-top: 10px;
            }

            .payment-options input{
                margin-right: 5px;
            }

            input[type="submit"]{
                margin-top: 20px;
                padding: 10px 20px;
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
                display: inline-block;
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

            p{
                color: red;
                margin-top: 15px;
            }
    </style>
</head>
<body>
    <div class="container">
    <h2>Available Rooms</h2>

    <table>
        <tr>
            <th>Room no</th>
            <th>Room Type</th>
            <th>Price</th>
        </tr>

        <?php
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>".$row["room_number"]."</td>";
            echo "<td>".$row["type"]."</td>";
            echo "<td>".$row["price"]."</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <h2>Book Your Room</h2>

<form action="index2.php" method="post">

    <div class="form-group">
        <label for="gphone">Phone:</label>
        <input type="text" id="gphone" name="gphone">
    </div>

    <div class="form-group">
        <label for="rno">Room no:</label>
        <input type="number" id="rno" name="rno">
    </div>

    <div class="payment">
        <label>Payment Method:</label>

        <div class="payment-options">
            <input type="radio" name="credit" value="Visa"> Visa

            <input type="radio" name="credit" value="Master"> Master
        </div>
    </div>

    <input type="submit" name="confirm" value="Confirm">

    <p><?php echo $message; ?></p>

</form>

    <br>
    <a href="index.php" class="btn">Back</a>
</div>
</body>
</html>

<?php

mysqli_close($conn);
?>