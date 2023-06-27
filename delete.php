<?php
$name = filter_input(INPUT_POST, 'deleteuser');
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "amberalert";
$conn = mysqli_connect ($host, $dbusername, $dbpassword, $dbname);
$sql = "Delete from `queryform` where Name ='$name'";
if ($conn->query($sql))
{
    $delay = 1;

    // Set the redirect URL
    $redirectUrl = "index.html";
    
    // Generate the meta refresh header
    $refreshHeader = "refresh:" . $delay . ";url=" . $redirectUrl;
    
    // Output the header
    header($refreshHeader);
    exit();
}
$conn->close();
?>