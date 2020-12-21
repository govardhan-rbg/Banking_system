<?php 
    require 'dbConnection.php ';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Bank Management System</title>
    <link rel="stylesheet" href="../index.css">
</head>
<body>
    <div className="grid-container">
        <header class="header">
            <h2>Bank of Paradise</h2>
            <a href = "../index.php" name = "homepage_link"><h3>Home</h3></a>
            <a href = "users.php" name = "usersList_link"><h3>Users</h3></a>
            <a href = "../transferMoney.php" name = "transfermoney"><h3>Transfer Money</h3></a>
            <a href = "../transactionsList.php" name = "transactionList"><h3>Transaction List</h3></a>
        </header>
        <main class = "main">
        <?php
            if (!isset($_POST["usersList_link"])){
                include 'dbConnection.php ';
                $array = $conn->query("select * from e_bankusers ;");
                echo "<table class = table border = '1' >
                      <center><h2>List of users<h2></center><br>
                      <thead>
                        <tr>
                        <th >user_Acc_Num</th>
                        <th >username</th>
                        <th >email</th> 
                        <th >balance</th>
                        </tr>";
                echo "</thead>";
                echo "<tbody>";
                if ($array->num_rows > 0)
                { 
                  while ($row = $array->fetch_assoc())
                    {
                      echo "<tr>";
                      echo "<td>".$row['user_Acc_Num']."</td>";
                      echo "<td>".$row['username']."</td>";
                      echo "<td>".$row['Email_id']."</td>";
                      echo "<td>".$row['balance']."</td>";
                      echo "</tr>";
                    }
                }      
                echo "</tbody>";
                echo "</table>";
              } else {
                  echo "hiiiiii";
              }
              ?>
        </main>
        <footer class="footer">
            All rights reserved...
        </footer>
        
    </div>
</body>
</html>