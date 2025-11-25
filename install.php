<?php
$servername = "localhost";
$username = "root";
$password = "root";
$conn= new PDO("mysql:host=$servername",$username,$password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql="CREATE DATABASE IF NOT EXISTS packedlunches";
$conn->exec($sql);
$sql="USE packedlunches";
$conn->exec($sql);
echo("DB created successfully<br>");
// Create users table
$stmt=$conn->prepare("DROP TABLE IF EXISTS tblusers;
CREATE TABLE tblusers
(UserID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY  KEY,
Username VARCHAR(20) NOT NULL,
Surname VARCHAR(20) NOT NULL,
Forename VARCHAR(20) NOT NULL,
Password VARCHAR(200) NOT NULL,
Year INT(2) NOT NULL,
Balance DECIMAL (15,2) NOT NULL,
Role TINYINT(1)
);
");
$stmt->execute();
echo("tblusers created<br>");
//add in users
$username=$_POST["surname"].".".$_POST["forename"][0];
echo($username);
//$username="bob";
$hashedpassword=password_hash("password",PASSWORD_DEFAULT);
echo($hashedpassword);
$stmt=$conn->prepare("INSERT INTO tblusers
(UserID, Username, Surname, Forename, Password, Year, Balance, Role)
VALUES
(NULL,'zakrzewski.g', 'zakrzewski', 'gabriel', :Password, 12, 1000000,1)
");

$stmt->bindParam(":Password", $hashedpassword);
$stmt->execute();

$stmt=$conn->prepare("DROP TABLE IF EXISTS tblfood;
CREATE TABLE tblfood
(FoodID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY  KEY,
Name VARCHAR(20) NOT NULL,
Description VARCHAR(200) NOT NULL,
Category VARCHAR(20) NOT NULL,
Price DECIMAL (15,2) NOT NULL
);
");
$stmt->execute();
echo("tblfood created<br>");

$stmt=$conn->prepare("INSERT INTO tblfood 
    (FoodID,Name,Description,Category,Price)
    VALUES
    (NULL,'Coke','Fizzy drink',2,2.50),
    (NULL,'Donut','Jam donut',1,2.00)
    ");
    
    $stmt->execute();

$stmt=$conn->prepare("DROP TABLE IF EXISTS tblorder;
CREATE TABLE tblusers
(OrderID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY  KEY,
Status VARCHAR(20) NOT NULL,
UserID INT(4) NOT NULL,
Orderdate DATETIME
);
");
$stmt->execute();
echo("tblorder created<br>");


$stmt=$conn->prepare("DROP TABLE IF EXISTS tblbasket;
CREATE TABLE tblusers
(OrderID INT(4) NOT NULL,
Quantity INT(2) DEFAULT 1,
FoodID INT(4) NOT NULL,
PRIMARY KEY (OrderID, FoodID)
);
");
$stmt->execute();
echo("tblbasket made<br>");

?>

