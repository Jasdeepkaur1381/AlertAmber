<?php
$id = filter_input(INPUT_POST, 'id');
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "amberalert";
$conn = mysqli_connect ($host, $dbusername, $dbpassword, $dbname);
$sql = "Delete from `orderd` where id ='$id'";
if ($conn->query($sql))
{
    $delay = 1;

    // Set the redirect URL
    $redirectUrl = "orderAdmin.php";
    
    // Generate the meta refresh header
    $refreshHeader = "refresh:" . $delay . ";url=" . $redirectUrl;
    
    // Output the header
    header($refreshHeader);
    exit();
}
$conn->close();
?>