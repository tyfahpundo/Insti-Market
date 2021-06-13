<?php
//rnfunctions.php
//Development Connection
// $dbhost='localhost';
// $dbname='mammy';
// $dbuser='root';
// $dbpass='';
// $appname="xell";

//Remote Connection
$dbhost='remotemysql.com';
$dbname='XbYnQmnYLA';
$dbuser='XbYnQmnYLA';
$dbpass='Ao1Kakb9JP';
$appname="insti-market";

$con=mysqli_connect("$dbhost","$dbuser","$dbpass","$dbname");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


function destroySession()
    {
    $_SESSION=array();
    if (session_id() !="" || isset($_COOKIE[session_name()]))
        setcookie(session_name(),'',time()-259000, '/');
    session_destroy();
    }
//

?>