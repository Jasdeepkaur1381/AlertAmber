<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "amberalert";
$conn = mysqli_connect ($host, $dbusername, $dbpassword, $dbname);

if(!$conn)
{
    die (mysqli_error($conn));
}

?>