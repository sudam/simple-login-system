<?php
    session_start();
    if($_SESSION['user'])
    {
        
    }
    else
    {
        header("location: index.php");
    }
    
    if($_SERVER['REQUEST_METHOD'] = "POST")//added an if to keep the page secured
    {
        $details = mysql_real_escape_string($_POST['details']);
        $time = strftime("%X");
        $date = strftime("%B %d, %Y");
        $decision = "no";

        mysql_connect("localhost","root","") or die(mysql_error()); //connect to server
        mysql_select_db("first_db") or die("cannot connect to database"); //connect to database

        foreach($_POST['checkbox'] as $value)//gets the data from checkbox
        {
            if($value != null) //checks if the checkbox is selected
            {
                $decision = "yes"; //sets the check value
            }
        }

        mysql_query("INSERT INTO list (details,time_posted,date_posted,public) VALUES ('$details','$time','$date','$decision')"); //sql query
        header("location: home.php");
    }
    else
    {
        header("location: home.php");
    }
        
?>