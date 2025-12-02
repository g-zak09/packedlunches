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
        <title>View basket and checkout</title> 
    </head> 
    <h1>Basket contents</h1>
    <body> 
    </body>
</html>