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
                if(isset($_POST['transfer_submit'])){
                    include_once 'dbConnection.php ';
                    $receiver = $_POST['receiver'];
                    $money = $_POST['money'];
                    $password = $_POST["password"];

                    if(empty($money) && empty($receiver) && empty($password)) {
                        header("Location:../transferMoney.php?error=emptyfields");
                    } elseif (empty($receiver)){
                        header("Location:../transferMoney.php?error=emptyfield&money=".$money);
                    } elseif (empty($money)) {
                          header("Location:../transferMoney.php?error=emptyfield&receiver=".$receiver);
                    }elseif (empty($password)){
                      header("Location:../transferMoney.php?error=emptypasswordfield&receiver=".$receiver."&money=".$money);
                    }else{
                          $res = $conn->query(" SELECT * FROM e_bankusers WHERE user_Acc_Num='$receiver';") ;
                          $res1 = $conn->query(" SELECT * FROM e_bankusers WHERE password = '$password' ;");
                          if ($res->num_rows == 1 && $res1->num_rows == 1)
                                {
                                  echo "<table  class = table border = '1'>
                                  <thead>
                                  <tr>
                                  <th>user_Acc_Num</th>
                                  <th>username</th>
                                  <th>email</th>
                                  <th>balance</th> 
                                  </tr>";
                                  echo "</thead>";
                                  echo "<tbody>";
                                  while ($row = $res->fetch_assoc())
                                  {
                                    $revBalance = $row['balance'] + $money;
                                    echo "<tr>";
                                    echo "<td>".$row['user_Acc_Num']."</td>";
                                    echo "<td>".$row['username']."</td>";
                                    echo "<td>".$row['Email_id']."</td>";
                                    echo "<td>".$revBalance."</td>";
                                    echo "</tr>";
                                    $set = $conn->query("UPDATE bankusers SET balance = '$revBalance' WHERE user_Acc_Num='".$receiver."';");
                                    while ($row1 = $res1->fetch_assoc())
                                    {
                                      $revBalance1 = $row1['balance'] - $money;
                                      echo "<tr>";
                                      echo "<td>".$row1['user_Acc_Num']."</td>";
                                      echo "<td>".$row1['username']."</td>";
                                      echo "<td>".$row1['Email_id']."</td>";
                                      echo "<td>".$revBalance1."</td>";
                                      echo "</tr>";
                                      $set = $conn->query("UPDATE e_bankusers SET balance = '$revBalance1' WHERE user_Acc_Num ='".$row1['user_Acc_Num']."';");
                                      
                                      //transaction table item
                                      
                                      $set1 = $conn->query("INSERT INTO transactions( sender, receiver, amount, date) VALUES ('".$row1['user_Acc_Num']."', '".$row['user_Acc_Num']."', '$money' , CURTIME());");
                                      echo"<div class = 'success'>
                                          <center><h1>Transaction Successfull</h1></center>
                                        </div>";
                                      
                                    }
                                    
                                  }
                                }else {
                                  echo "<center><h1 class = failure> <b> User  Not Found </b> </h1> </center>";
                                }
                            echo "</tbody>";
                        echo "</table>";
                      }
                    }else {
                    header("Location:../intern.php?error=navigationnotallowed");
                }
            ?>               
            </main>
            <footer class="footer">
                All rights reserved...
            </footer>
        </div>
</body>
</html>



