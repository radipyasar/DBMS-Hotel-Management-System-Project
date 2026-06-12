<?php
    include("database.php");
    $message = "";
    $done = false;
    if(isset($_POST["confirm"])){
        $phone = $_POST["gphone"];
        $service = $_POST["sname"];
        if(empty($phone)||empty($service)||empty($_POST["review"])){
            $message = "Fill all the fields";
        }
        else{
            $sql = "select * from guest";
            $result = mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($result)){
                if($phone==$row["phone"]){
                    $gid = $row["guest_id"];
                    $sql1 = "select * from service";
                    $result1 = mysqli_query($conn,$sql1);
                    while($row1=mysqli_fetch_assoc($result1)){
                        if($service==$row1["service_name"]){
                            $sid = $row1["service_id"];
                            $verify = "select * from service_booking
                                       where guest_id={$gid} and service_id={$sid}";
                            $vr = mysqli_query($conn,$verify);
                            while($vrow=mysqli_fetch_assoc($vr)){
                                $sbid = $vrow["s_booking_id"];
                                $del1 = "delete from service_payment
                                         where s_booking_id={$sbid}";
                                mysqli_query($conn,$del1);
                                $del = "delete from service_booking
                                        where guest_id={$gid} and service_id={$sid}";
                                mysqli_query($conn,$del);
                                $rate = $_POST["review"];
                                $r = null;
                                if($rate=="Excellent"){
                                    $r=10;
                                }elseif($rate=="Average"){
                                    $r=5;
                                }else{
                                    $r=1;
                                }
                                $add = "insert into service_review(guest_id,service_id,rating)
                                        values({$gid},{$sid},{$r})";
                                mysqli_query($conn,$add);
                                $done = true;
                            }
                            if($done){
                                $message="Booking Cancelled";
                            }else{
                                $message="Couldn't Cancel Booking";
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
    <title>Cancel Service</title>
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
        <h2>Cancel Your Service</h2>
        <form action="index9.php" method="post">
            <label for="gphone">Phone: </label>
            <input type="text" id="gphone" name="gphone">
            <br>
            <label for="sname">Service: </label>
            <input type="text" id="sname" name="sname">
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
            <a href="index5.php" class="btn">Back</a>
        </form>
    </div>
</body>
</html>

<?php
    mysqli_close($conn);
?>