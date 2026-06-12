<?php
    include("database.php");
    $message = "";
    $done = false;

    if(isset($_POST["confirm"])){
        $phone = $_POST["gphone"];
        $room = $_POST["rno"];
        if(empty($phone)||empty($room)||empty($_POST["review"])){
            $message = "Fill All Fields";
        }
        else{
            $sql = "select * from guest";
            $result = mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($result)){
                if($phone==$row["phone"]){
                    $sql1 = "select * from room";
                    $result1 = mysqli_query($conn,$sql1);
                    while($row1=mysqli_fetch_assoc($result1)){
                        if($room==$row1["room_number"]){
                            $gid = $row["guest_id"];
                            $rid = $row1["room_id"];
                            $verify = "select * from booking
                                       where guest_id={$gid} and room_id={$rid}";
                            $vr = mysqli_query($conn,$verify);
                            while($vrow=mysqli_fetch_assoc($vr)){
                                $bid = $vrow["booking_id"];
                                $del = "delete from payment
                                        where booking_id={$bid}";
                                mysqli_query($conn,$del);
                                $del1 = "delete from booking
                                         where guest_id={$gid} and room_id={$rid}";
                                mysqli_query($conn,$del1);
                                $new = "update roomstatus
                                       set status='Available'
                                       where room_id={$rid}";
                                mysqli_query($conn,$new);
                                $rate = $_POST["review"];
                                $r = null;
                                if($rate=="Excellent"){
                                    $r=10;
                                }elseif($rate=="Average"){
                                    $r=5;
                                }else{
                                    $r=1;
                                }
                                $add = "insert into room_review(guest_id,room_id,rating)
                                        values({$gid},{$rid},{$r})";
                                mysqli_query($conn,$add);
                                $done = true;
                            }
                            if($done){
                                $message = "Room Checked out";
                            }else{
                                $message = "You did not register/Invalid room/No booking";
                            }
                        }
                    }
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
    <title>Check Out Page</title>
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
        <h2>ROOM CHECK OUT</h2>
        <form action="index10.php" method="post">
            <label for="gphone">Phone: </label>
            <input type="text" id="gphone" name="gphone">
            <br>
            <label for="rno">Room no: </label>
            <input type="number" id="rno" name="rno">
            <br>
            <label for="review">Review: </label> <br>
            <input type="radio" name="review" value="Excellent">
            Excellent <br>
            <input type="radio" name="review" value="Average">
            Average <br>
            <input type="radio" name="review" value="Worst">
            Worst <br>
            <input type="submit" name="confirm" value="Confirm">
            <p><?php echo $message; ?></p> <br>
            <a href="index.php" class="btn">Back</a>
        </form>
    </div>
</body>
</html>


<?php
    mysqli_close($conn);
?>