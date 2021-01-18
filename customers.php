<?php 

include('connection.php');

//selecting data to show
$sql = "SELECT * FROM `customers`";
$result = mysqli_query($con, $sql);
mysqli_close($con);

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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Current Balance(in Rs.)</th>
                </tr>
                <?php 
                    $sno = 0;
                    while($row = mysqli_fetch_assoc($result)){
                        $sno = $sno + 1;
                        echo "<tr>
                        <td scope='row'>". $sno . "</td>
                        <td>". $row['name'] . "</td>
                        <td>". $row['email'] . "</td>
                        <td>". $row['current_balance'] . "</td>
                        </tr>";
                    }
                ?>
            </table>
        </div>
        <div>
            <a href="./selectuser.php" class="btnn">Select User</a>
            <a href="./index.php" class="btnn">Home</a>

        </div>
	</section>
</body>
</html>