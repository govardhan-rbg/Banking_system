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
                    if(isset($_POST['get_All_transactions'])){
                        require 'dbConnection.php ';
                        $array = $conn->query("select * from transactions ;");
                        if ($array->num_rows > 0)
                            {
                            echo "<table class = table border = '1'>
                            <thead>
                            <tr>
                            <th>Transaction_id</th>
                            <th>Sender</th>
                            <th>receiver</th>
                            <th>Amount</th>
                            <th>Date</th>
                            </tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while ($row = $array->fetch_assoc())
                                {
                                    echo "<tr>";
                                    echo "<td>".$row['transaction_Id']."</td>";
                                    echo "<td>".$row['sender']."</td>";
                                    echo "<td>".$row['receiver']."</td>";
                                    echo "<td>".$row['amount']."</td>";
                                    echo "<td>".$row['date']."</td>";
                                    echo "</tr>";
                                }
                            echo "</tbody>";
                            echo "</table>";
                        }
                    }
                    if (isset($_POST['get_User_transactions'])){
                        $user = $_POST['user'] ;
                        if(empty($user)) {
                            header("Location:../transactionsList.php?error=emptyuserfield");
                        }else{
                           include_once 'dbConnection.php ';
                            $user = $_POST['user'] ;
                            $check = $conn->query("SELECt * from e_bankusers WHERE user_Acc_Num = '$user' ;");
                            if($check->num_rows > 0){
                            $array = $conn->query("SELECt * from transactions WHERE sender = '$user' OR receiver = '$user';");
                            if ($array->num_rows > 0)
                                {
                                    echo "<table class=table border = '1'>
                                    <thead>
                                    <tr>
                                    <th>Transaction_id</th>
                                    <th>Sender</th>
                                    <th>receiver</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    </tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while ($row = $array->fetch_assoc())
                                        {
                                            echo "<tr>";
                                            echo "<td>".$row['transaction_Id']."</td>";
                                            echo "<td>".$row['sender']."</td>";
                                            echo "<td>".$row['receiver']."</td>";
                                            echo "<td>".$row['amount']."</td>"; 
                                            echo "<td>".$row['date']."</td>";
                                            echo "</tr>";
                                        }
                                    echo "</tbody>";
                                    echo "</table>";
                                }else{
                                    echo "<center><h1 class = failure> <b> No Transaction  Found </b> </h1> </center>";
                                }
                            }else{
                                    header("Location:../transactionsList.php?error=userNotFound");
                                    echo "<center><h1 class = failure> <b> User  Not Found </b> </h1> </center>";
                                }
                            }
                                
                    }
                ?>     
            </main>
            <footer class="footer">
                All rights reserved...
            </footer>
        </div>
</body>
</html>








