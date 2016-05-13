<?php
    session_start();
    
    $username = mysql_real_escape_string($_POST['username']);
    $password = mysql_real_escape_string($_POST['password']);

    mysql_connect("localhost","root","") or die(mysql_error()); //connect to server
    mysql_select_db("first_db") or die ("cannot connect to the database"); //connect to database

    $query = mysql_query("SELECT * FROM users WHERE username='$username'");
    $exists = mysql_num_rows($query); //checks if username exists

    $table_users = "";
    $table_password = "";

    if($exists > 0){
        while($row = mysql_fetch_assoc($query)){
            $table_users = $row["username"];
            $table_password = $row["password"];
        }
        if(($username == $table_users) && ($password = $table_password)){
            if($password == $table_password){
                $_SESSION['user'] = $username; // set the username in a session; global variable
                header("location: home.php"); // redirects to the authenticated home page
            }
        }
        else{
               print '<script>alert("incorrect password");</script>';
               print '<script>window.location.assign("login.php");</script>'; //redirects to login.php
        }
           
    }
    else{
        print '<script>alert("incorrect username");</script>';
        print '<script>window.location.assign("login.php");</script>'; //redirects to login.php
    }
?>