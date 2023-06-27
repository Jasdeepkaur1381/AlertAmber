<?php
include ('./conn.php');
if(isset($_POST['submit'])){
    $productname = $_POST['productname'];
    $description=$_POST['description'];
    $image = $_FILES['image'];
    echo $productname;
    echo "<br>";

    $imagefilename=$image['name'];
    $imagefiletemp=$image['tmp_name'];
    $filename_seperate=explode('.',$imagefilename);
    $file_extension=strtolower(end($filename_seperate));
    $extension=array('jpg','jpeg','png');
    if(in_array($file_extension,$extension)){
        $upload_image='images/'.$imagefilename;
        move_uploaded_file($imagefiletemp,$upload_image);
        $sql="insert into `products` (name , description , image) values('$productname','$description','$upload_image')";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            echo "data entered successfully";
        }
        else
        {
            die (mysqli_error($conn));
        }
    }
}
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