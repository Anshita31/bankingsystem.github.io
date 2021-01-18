<?php

include('connection.php');

//selecting data to show
$sql = "SELECT * FROM `customers`";
$result = mysqli_query($con, $sql);
// mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banking System</title>
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

    <div class="container">
        <?php
        session_start();
            if($_SERVER['REQUEST_METHOD']=="POST"){
                $sender = $_POST['name'];
                $_SESSION["name"] = $sender;
                $query = "SELECT * FROM customers WHERE name ='$sender'";
			    $result = mysqli_query($con,$query);
			    $customer = mysqli_fetch_assoc($result);
                echo "<h1>Sender's Details</h1>
                <h2> Name: " .$sender. "</h2>
                <h2> Email: " .$customer['email']. "</h2>
                <h2> Current Balance(in Rs.) : " .$customer['current_balance']. "</h2><br>";
            }
        ?>

        <div>
		<a href="transfer.php" class="btn">Transfer to &rarr;</a>
		<a href="selectUser.php" class="waves-effect waves-light btn black z-depth-2">Back</a>
	<div>

    </div>
</body>
</html> 