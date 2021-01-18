<?php

include('connection.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Banking System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header class="header">
            <div class="left">
                <h2 style="color: lightgoldenrodyellow;">Basic Banking System </h2>
            </div>
            <div class="right">
                <ul class="navbar">
                    <li><a href="index.php">Home </a></li>
                    <li><a href="customers.php">View All Customers </a></li>
                    <li><a href="history.php">Transaction History </a></li>
                </ul>
            </div>
        </header>
    <div class="container final center">

        <?php

            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $sender = $_POST['Sname'];
                $receiver = $_POST['Rname'];
                $amount = $_POST['amount'];
            }

            if( $sender != $receiver && $amount>0){
                $sender_query = "SELECT * FROM customers WHERE name ='$sender'";
                $sCon = mysqli_query($con,$sender_query);
                $sResult=mysqli_fetch_assoc($sCon);
                $sBalance=$sResult['current_balance'];

                if($amount<$sBalance){
                    $receiver_query = "SELECT * FROM customers WHERE name ='$receiver'";
                    $rCon = mysqli_query($con,$receiver_query);
                    $sResult = mysqli_fetch_array($rCon);
                    $rBalance = $sResult['current_balance'];

                    echo "<h1 class='success'>Transaction Successful!</h1>
                    <p>Rs $amount has been deducted from your account and successfully transfered to $receiver.</p> <br>";

                    $sBalance-=$amount;
                    $rBalance+=$amount;

                    $sUpdate = "UPDATE `customers` SET `amount` = '$sBalance' WHERE `customers`.`name` = '$sender';";
                    $senderLogUpdate=mysqli_query($con,$sUpdate);

                    $rUpdate = "UPDATE `customers` SET `balance` = '$rBalance' WHERE `customers`.`name` = '$receiver';";
                    $recevierLogUpdate=mysqli_query($con,$rUpdate);

                    $history_query = "INSERT INTO `history` (`sender`, `receiver`, `amount`, `time`) VALUES ('$sender', '$receiver', '$amount', current_timestamp())";
                    $history = mysqli_query($con,$history_query);

                }
                else echo "<h1 class='error'>Transaction Failed!</h1>
                <p>Insufficient balance. Please recharge your account to proceed furthur.</p>";
            }
            else if($sender == $receiver){
                echo "<h1 class='error'>Transaction Failed!</h1>
                <p>Sender and receiver cannot be same. Please select a different user.</p>";
            }
        ?>
        <a href='./transfer.php' class="btn">Back</a>
        <a href='./history.php' class="btn">Transaction History</a>
    </div>
</body>
</html> 