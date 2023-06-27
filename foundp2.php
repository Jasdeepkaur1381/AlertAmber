<?php
// include ('./conn.php');
$name=filter_input(INPUT_POST,'name');
$email=filter_input(INPUT_POST,'email');
$contact=filter_input(INPUT_POST,'contact');
$petfound=filter_input(INPUT_POST,'petfound');
$country=filter_input(INPUT_POST,'country');
$region=filter_input(INPUT_POST,'region');
$city=filter_input(INPUT_POST,'city');
$image = $_FILES['image'];

// if(isset($_POST['submit'])){
//     $name = $_POST['name'];
//     $contact = $_POST['contact'];
//     $email = $_POST['email'];
//     $petfound = $_POST['petfound'];
//     $country = $_POST['country'];
//     $region = $_POST['region'];
//     $city = $_POST['city'];
//     $image = $_FILES['image'];
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "amberalert";

$imagefilename=$image['name'];
$imagefiletemp=$image['tmp_name'];
$filename_seperate=explode('.',$imagefilename);
$file_extension=strtolower(end($filename_seperate));
$extension=array('jpg','jpeg','png');
if(in_array($file_extension,$extension)){
    $upload_image='images/'.$imagefilename;
    move_uploaded_file($imagefiletemp,$upload_image);
}
$conn = mysqli_connect ($host, $dbusername, $dbpassword, $dbname);
$sql = "INSERT INTO founds (name,contact,email,petfound,country,region,city,photo) values ('$name','$contact','$email','$petfound','$country','$region','$city','$upload_image')";
 if ($conn->query($sql))
{
echo "New record is inserted sucessfully";
} 
$conn->close();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image entry</title>
</head>
<body>
    
</body>
</html>