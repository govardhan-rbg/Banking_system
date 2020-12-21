<?php
$servername = "localhost";
$dBUsername = "root";
$dBPassword = "" ;


$conn = mysqli_connect($servername,$dBUsername,$dBPassword);

//Database Creation

$sql = "CREATE DATABASE BankOfParadise";
mysqli_query($conn, $sql);

mysqli_close($conn); 

$conn = mysqli_connect($servername,$dBUsername,$dBPassword,"BankOfParadise");

if (!$conn){
    die("Connection failed : ".mysqli_connect_error());
}


// sql to create table
$sql_users = "CREATE TABLE e_bankusers (
user_Acc_Num INT PRIMARY KEY AUTO_INCREMENT ,
username VARCHAR(30) NOT NULL,
Email_id VARCHAR(50) NOT NULL,
password VARCHAR(50) NOT NULL,
balance FLOAT 
)";
$conn->query($sql_users;

 

//Inserting values into the database

$sql1 = "INSERT INTO e_bankusers (user_Acc_Num,username,Email_id,password,balance) VALUES
(10001,'Ravi','ravi123@gmail.com','ravi@123',12300),
(10002,'Ram','ram123@gmail.com','ram@123',13200),
(10003,'Siva','siva123@gmail.com','siva@123',13500),
(10004,'Pravin','pravin123@gmail.com','pravin@123',12500),
(10005,'Ramesh','ramesh123@gmail.com','ramesh@123',12400),
(10006,'Suresh','suresh123@gmail.com','suresh@123',10000),
(10007,'Goku','gokusaiyan@gmail.com','gokusaiyan@123',11000),
(10008,'Satoru','satorujjsorcerer@gmail.com','satorujjsorcerer@123',13000),
(10009,'Nasa','nasatk123@gmail.com','nasatk@123',20000),
(10010,'Kaori','kaoriyla123@gmail.com','kaoriyla@123',15000)";

$conn->query($sql1);

//creating table 

$sql_transactions = "CREATE TABLE transactions (
    transaction_Id INT AUTO_INCREMENT PRIMARY KEY,
    sender VARCHAR(30) NOT NULL,
    receiver VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    amount FLOAT NOT NULL,
    date DATETIME
    )";
$conn->query($sql_transactions);
?>