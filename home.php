<html>
    <head>
        <title>Home Page</title>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<link href="css/styles.css" rel="stylesheet">
    </head>
    <?php
        session_start(); //start the session
        if( $_SESSION['user']){ // checks if user is logged in 
        
    }else{
            header("location: index.php"); //redirects if user is not logged in
        }
    $user = $_SESSION['user']; //assigns user value
    ?>
    <body>
        <div class="container text-center">
            <h2>Home Page</h2>
            <p>Hello <?php print "$user" ?>!</p> <!-- displays the username --> 
            <a href="logout.php">Click here to log out</a><br/><br/>
            <form action="add.php" method="POST">
                <input class="form-control" type="text" name="details" placeholder="ADD MORE" />
                <div class="checkbox"><lable><input class="checkbox" type="checkbox" name="checkbox[]" value="yes"/>Public?</lable></div>
                <input class="btn btn-primary" type="submit" value="Add to list"/>            
            </form>
            
            <h2 align="center">My list</h2>
            <table class="table table-striped" border="1px" width="100%">
                <tr>
                    <th>Id</th>
                    <th>Details</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Public post</th>
                </tr>
                
                <?php
                    mysql_connect("localhost","root","") or die(mysql_error());
                    mysql_select_db("first_db") or die("cannot connect to database");
                    $query = mysql_query("SELECT * FROM list");
                    
                    while($row = mysql_fetch_array($query))
                    {
                        print "<tr>";
                            print '<td align="center">' . $row['id'] . "</td>";
                            print '<td align="center">' . $row['details'] . "</td>";
                            print '<td align="center"><a href="edit.php?id='.$row['id'].'">Edit</a></td>';
                            print '<td align="center"><a href="#" onclick="myFunction('.$row['id'].')">Delete</a></td>';
                            print '<td align="center">' . $row['public'] . "</td>";
                        print "</tr>";
                    }
                ?>
            
            </table>
        </div>
        
        <script>
            function myFunction(id)
            {
                var r = confirm("Are you sure?");
                if(r == true)
                    {
                        window.location.assign("delete.php?id=" + id);
                    }
            }
        </script>
        
    </body>
</html>