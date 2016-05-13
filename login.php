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
            <h2>Login Page</h2>
            <a href="index.php">Click here to go back<br/><br/></a>
            
            <form class="form-horizontal" action="checklogin.php" method="post">
                <input class="form-control" type="text" name="username" required="required" placeholder="Username" /><br/>
                <input class="form-control" type="password" name="password" required="required" placeholder="Password" /></br>
                <input class="btn btn-primary" type="submit" value="LOGIN"/>
            </form>
        </div>
    </body>
</html>

