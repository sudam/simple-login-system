<html>
<head>
    
    <?php
        session_start();
    if($_SESSION['user']){
        
    }
    else
    {
        header("location: index.php");
    }
    $user = $_SESSION['user'];
    $id_exists = false;
    ?>
    
    <body>
    <h2>Home page</h2>
        <p>Hello <?php Print "$user"?></p>
        <a href="logout.php">Logout</a>
        <a href="home.php">Home</a>
        <h2 align="center">Currently selected</h2>
        
        <table width="100%" border="1px">
            <tr>
                <th>Id</th>
                <th>Details</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>Public</th>
            </tr>
            
            <?php
                if(!empty($_GET['id'])){
                    $id = $_GET['id'];
                    $_SESSION['id'] = $id;
                    $id_exists = true;
                    
                    mysql_connect("localhost","root","") or die(mysql_error());
                    mysql_select_db("first_db") or die("cannot connect to DB");
                    $query = mysql_query("SELECT * FROM list WHERE id='$id'");
                    $count = mysql_num_rows($query);
                    if($count>0)
                    {
                        while($row = mysql_fetch_array($query))
                        {
                            print "<tr>";
                                print '<td align="center">'.$row['id']."</td>";
                                print '<td align="center">'.$row['details']."</td>";
                                print '<td align="center">'.$row['date_posted']."</td>";
                                print '<td align="center">'.$row['public']."</td>";
                            print "</tr>";
                        }
                    }
                    else
                    {
                        $id_exists = false;
                    }
                }
            ?>
        </table>
        </br>
    <?php
        if($id_exists)
        {
            print '
                <form action="edit.php" method="POST">
                    Enter new values: <input type="text" name="details"/><br/>
                    Public post: <input type="checkbox" name="public[]" value="yes"/><br/>
                    <input type="submit" value="update list"/>
                </form>
            ';
        }
    else
    {
        print '<h2 align="center">there are no data to edit</h2>';
    }
    ?>
    </body>
    </head>
</html>

<?php
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        mysql_connect("localhost","root","") or die(mysql_error());
        mysql_select_db("first_db") or die("cannot connect to db");
        $details = mysql_real_escape_string($_POST['details']);
        $id = $_SESSION['id'];
        $public = "no";
        $time = strftime("%X");
        $date = strftime("%B %d, %Y");
        
        foreach($_POST['public'] as $list)
        {
            if($list != null)
            {
                $public = "yes";
            }
        }
        mysql_query("UPDATE list SET details='$details', public='$public', date_edited='$date', time_edited='$time' WHERE id='$id'");
        header("location: home.php");
    }
?>

