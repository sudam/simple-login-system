<!DOCTYPE html>
<html class="no-js">
    <head>
    <title>My first PHP Website</title>

<link href="css/styles.css" rel="stylesheet" type="text/css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    
    </head>
    <body ng-app="flat-login">
        <div ng-include='"templates/header.html"'></div>

        <div class="container text-center">
            <h2>Hello!</h2>
                <a class="btn btn-primary" href="login.php">LOGIN</a>
                <a class="btn btn-primary" href="register.php">REGISTER</a>
                
                </br>

                <h4>Public users</h4>
                
    <table class="table table-striped" border="1" width="100%">
        <tr>
            <th>id</th>
            <th>details</th>
            <th>post time</th>
            <th>edit time</th>
        </tr> 

        <?php
        
        mysql_connect("localhost","root","") or die(mysql_error());
        mysql_select_db("first_db") or die("cannot connect to db");
        $query = mysql_query("SELECT * FROM list WHERE public='yes'");
            while($row = mysql_fetch_array($query))
            {
                print "<tr>";
                    print '<td align="center">'. $row['id']."</td>";
                    print '<td align="center">'. $row['details']."</td>";
                    print '<td align="center">'. $row['time_posted']."</td>";
                    print '<td align="center">'. $row['time_edited']."</td>";
                print "</tr>";
            }
            
        ?>
    </table>
    </div>
    
    <!-- Vendor: Javascripts -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <!-- Vendor: Angular, followed by our custom Javascripts -->
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.18/angular.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.18/angular-route.min.js"></script>
    </body>
</html>