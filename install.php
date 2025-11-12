<?php
$servername = "localhost";
$username = "root";
$password = "WinterJordan67&";
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
Suranme VARCHAR(20) NOT NULL,
Forename VARCHAR(20) NOT NULL,
Password VARCHAR(200) NOT NULL,
Year INT(2) NOT NULL,
Balance DECIMAL (15,2) NOT NULL,
Role TINYINT(1));
");
$stmt->execute();
echo("tblusers created<br>");
?>
