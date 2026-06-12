<?php
    include("database.php");
    $message = "";
    $done = false;

    if(isset($_POST["confirm"])){

        $phone = $_POST["gphone"];
        $service = $_POST["sname"];

        if(empty($phone)||empty($service)||empty($_POST["credit"])){

            $message = "Fill all the fields";

        }else{

            $sql = "select * from guest";
            $result = mysqli_query($conn,$sql);

            while($row=mysqli_fetch_assoc($result)){

                if($phone==$row["phone"]){

                    $sql1 = "select * from service";
                    $result1 = mysqli_query($conn,$sql1);

                    while($row1=mysqli_fetch_assoc($result1)){

                        if($service==$row1["service_name"]){

                            $gid = "select * from guest
                                    where phone='{$phone}'";

                            $sid = "select * from service
                                    where service_name='{$service}'";

                            $g = mysqli_query($conn,$gid);

                            while($r1=mysqli_fetch_assoc($g)){
                                $x=$r1["guest_id"];
                            }

                            $s = mysqli_query($conn,$sid);

                            while($r2=mysqli_fetch_assoc($s)){
                                $y=$r2["service_id"];
                                $a=$r2["price"];
                            }

                            // FIXED LOGIC HERE
                            $verify = "select * from service_booking
                                       where guest_id={$x}
                                       and service_id={$y}";

                            $vr = mysqli_query($conn,$verify);

                            if(mysqli_num_rows($vr)>0){

                                $message = "Already Booked";
                                $done = true;

                            }else{

                                $book = "insert into service_booking(guest_id,service_id)
                                         values({$x},{$y})";

                                mysqli_query($conn,$book);

                                $sbid = "select * from service_booking
                                         where guest_id={$x}
                                         and service_id={$y}";

                                $sb = mysqli_query($conn,$sbid);

                                while($r3=mysqli_fetch_assoc($sb)){
                                    $z=$r3["s_booking_id"];
                                }

                                $method = $_POST["credit"];

                                $spay = "insert into service_payment(s_booking_id,method,s_amount)
                                         values({$z},'{$method}',{$a})";

                                mysqli_query($conn,$spay);

                                $message = "Service Booked";
                                $done = true;
                            }
                        }
                    }
                }
            }

            if(!$done){
                $message = "You did not register/Invalid Service";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Service</title>

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

        <h2>Book Your Service</h2>

        <form action="index6.php" method="post">

            <label for="gphone">Phone: </label>
            <input type="text" id="gphone" name="gphone">
            <br>

            <label for="sname">Service: </label>
            <input type="text" id="sname" name="sname">
            <br>

            <label for="pay">Payment Method: </label> <br>

            <input type="radio" name="credit" value="Visa">
            Visa <br>

            <input type="radio" name="credit" value="Master">
            Master <br>

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