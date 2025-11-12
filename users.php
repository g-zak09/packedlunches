<!DOCTYPE HTML> 
<html> 
    <head> 
        <title>PHP info</title> 
    </head> 
    <body>
        <form action="addpupil.php" method="post">
            Surname:<input type="text" name="surname"><br>
            Forename:<input type="text" name="forename"><br>
            Password:<input type="password" name="password"><br>
            Year:<input type="number" name="year"><br>
            Initial Balance:<input type="number" name="balance"><br>
            Role:<br>
            <input type="radio" name="role" value="pupil" checked> Pupil<br>
            <input type="radio" name="role" value="admin"> Administrator<br>
            <input type="submit" value="Add User"><br>
        </form>
    </body>
</html>