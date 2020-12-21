<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Bank Management System</title>
    <link rel="stylesheet" href="./index.css">
</head>
<body>
    <div className="grid-container">
            <header class="header">
                <h2>Bank of Paradise</h2>
                <a href = "index.php" name = "homepage_link"><h3>Home</h3></a>
                <a href = "includes/users.php" name = "usersList_link"><h3>Users</h3></a>
                <a href = "transferMoney.php" name = "transfermoney"><h3>Transfer Money</h3></a>
                <a href = "transactionsList.php" name = "transactionList"><h3>Transaction List</h3></a>
            </header>
            <main class = "main">

                <div class="form">
                    <form action = "includes/transactionsListAction.php" method = "POST">
                        <ul class="form-container">    
                            <li><label for="user" >Name of the User</label><br><input type = "text" name = "user" placeholder = "Enter user account number"><br></li>
                            <li><button type = "submit" class = "button" name = "get_User_transactions"><b>User Transactions<b></button></li>
                            <li><h3> Want To Get All transactions ???</h3><br></li>
                            <li><button type = "submit" class = "button" name = "get_All_transactions" ><b>Get All Transactions</b></button></li>    
                        </ul>
                    </form>
                </div>
            </main>
            <footer class="footer">
                All rights reserved...
            </footer>
        </div>
    </body>
</html>