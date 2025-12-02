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
        <title>Packed lunch ordering system.</title> 
    </head> 
    <body> 
        <h1>Orders Page</h1>
        <?php
        session_start();
        include_once("connection.php");
        foreach ($_SESSION["lunchbasket"] as &$item){
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                print_r($_SESSION["Lunchbasket"]);
                echo("<br>"); 
        }
        }
        $stmt=$conn->prepare("SELECT * FROM tblfood ORDER BY Category, Name");
        $stmt->bindParam(":fid"),$item["foodid"];
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
            
        }
        print_r($_SESSION["Lunchbasket"]);
        echo("<br>");
        ?>
        Select category
        Show foods in that category
        <?php
        include_once("connection.php");
        $stmt=$conn->prepare("SELECT * FROM tblfood ORDER BY Category, Name");
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            echo('<form action="addtobasket.php" method="POST">');
            echo($row["Name"]." ".$row["Description"]." ".$row["Price"]);
            echo('<input type="hidden" name="foodid" value='.$row["FoodID"].'>');
            echo(' Quantity: <input type="number" name="qty" min="1" max="5" value="1">');
            echo('<input type="submit" value="Add Food">');
            echo("<br></form>");

        }
    ?>
    </body>
</html>