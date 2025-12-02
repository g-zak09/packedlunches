<?php
    session_start();
    if(isset($_SESSION["loggedinuser"])){
        echo("Hello ".$_SESSION["firstname"]);
    }
    else{
        echo("Not logged in");
    }
?>
<!DOCTYPE HTML> 
<html> 
    <head> 
        <title>Packed lunch order history</title> 
    </head> 
    <body> 
        <h1>Order history</h1>
<?php
    $stmt=$conn->prepare("SELECT * FROM tblorder WHERE UserID=:userid ORDER BY Orderdate DESC");
            $stmt->bindParam(":userid",$_SESSION["loggedinuser"]);
            $stmt->execute();
            while($row=$stmt->fetch(PDO::FETCH_ASSOC))
            {
                print_r($row["Orderdate"]);
                echo("<br>");
            }  

?>
    </body>
</html>