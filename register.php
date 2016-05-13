<html>
    <head>
        <title>My first PHP Website</title>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<link href="css/styles.css" rel="stylesheet">
    </head>
    <body>
        <div class="container text-center">
            <h2>Registration Page</h2>
            <a href="index.php">Click here to go back<br/><br/></a>
            
            <form class="form-horizontal" action="register.php" method="post">
            
                <input class="form-control" type="text" name="username" required="required" placeholder="USERNAME" /><br/>
                <input class="form-control" type="password" name="password" required="required" placeholder="PASSWORD" /></br>
                <input class="btn btn-primary" type="submit" value="Register"/>
            </form>
        </div>
    </body>
</html>

<?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = mysql_real_escape_string($_POST['username']);
        $password = mysql_real_escape_string($_POST['password']);
        
        $bool = true;
        
        mysql_connect("localhost","root","") or die(mysql_error()); //connect to server
        mysql_select_db("first_db") or die("cannot connect to DB"); //connect to DB
        $query = mysql_query("SELECT * FROM users"); //query user table
        while($row = mysql_fetch_array($query)){
            $table_users = $row['username']; //
            
            if($username == $table_users){
                $bool = false;
                print '<script>alert("username has been taken");</script>';
                print '<script>window.location.assign("register.php");</script>';
            }
        }
        
        if($bool){
            mysql_query("INSERT INTO users (username, password) VALUES ('$username','$password')");
            print '<script>alert("successfully registered!")</script>';
            print '<script>window.location.assign("register.php");</script>';
        }
    }
?>