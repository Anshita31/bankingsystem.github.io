<?php
session_start();
$sender=$_SESSION["name"];

include('connection.php');
//selecting data to show
$sql = "SELECT * FROM `customers`";
$result = mysqli_query($con, $sql);
$customers = mysqli_fetch_all($result, MYSQLI_ASSOC);

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
                    <li><a href="#">Transaction History </a></li>
                </ul>
            </div>
        </header>

    <section class="container transfer">
        <form action="transferComplete.php" method="POST">
            <label for="Sname">Sender:</label>
            <select name="Sname" id="Sname">
                <option value="<?php echo $sender;?>" selected><?php echo $sender;?>
                </option>
            </select><br><br>

            <label for="Rname">Select a user to start transaction</label>
            <select name="Rname" id="Rname">
                <option value="" disabled selected>Select reciever</option>
                <?php
                    $query = "SELECT * FROM `customers` ORDER BY `customers`.`name` ASC";
                    $query_run = mysqli_query($con, $query);

                    while ($row = mysqli_fetch_assoc($query_run)) {
                        echo "<option value='".$row['name']."'>".$row['name']."</option>";
                    }
                    mysqli_close($con);
                ?>
            </select> <br> <br>
            <label for="amount">Enter the amount to transfer :</label><br>
            <input type="number" name="amount" id="amount" placeholder="Amount(in Rs)"> <br>
            <div>
                <button type="submit" id="amount_value" style="margin-top: 25px;">Submit</button>
                <a href="selectuser.php" class="home" style="margin-left: 25px;">Back</a>
            </div>
        </form>
    </section>

</body>
</html>