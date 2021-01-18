<?php

 include('connection.php');

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
<section>
        <div>
            <table class="center">
                <tr>
                    <th>Sno.</th>
                    <th>Sender</th>
                    <th>Receiver</th>
                    <th>Amount</th>
                    <th>Time</th>
                </tr>
                <?php 
                 $sql = "SELECT * FROM `history`";
                 $result = mysqli_query($con, $sql);
                 $nums=mysqli_num_rows($result);
                    $sno = 0;
                    while($row=mysqli_fetch_array($result)){

                        $sno = $sno + 1;
                        echo "<tr>
                        <th scope='row'>". $sno . "</th>
                        <td>". $row['sender'] . "</td>
                        <td>". $row['receiver'] . "</td>
                        <td>". $row['amount'] . "</td>
                        <td>". $row['time'] . "</td>
                        </tr>";
                    }
                ?>


            </table>
        </div>
	</section>
</body>
</html> 