<?php
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email');
$date = filter_input(INPUT_POST, 'date');
$time = filter_input(INPUT_POST, 'time');
$peto = filter_input(INPUT_POST, 'peto');
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "amberalert";
$conn = mysqli_connect ($host, $dbusername, $dbpassword, $dbname);
$sql = "INSERT INTO orderd(name ,email ,date, time,peto) values ('$name','$email', '$date' ,'$time','$peto')";
if ($conn->query($sql))
{
    ?>

    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PetLover - Pet Care Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&family=Nunito:wght@600;700;800&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Flaticon Font -->
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9c528e122c.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div
        class="w-1/2 m-auto h-56 border-4 shadow-3xl rounded-b-xl  ring ring-grey-600 ring-offset-4 ring-offset-grey-100 flex flex-col p-10">
        <h1 class="text-center text-4xl text-primary">Record is inserted successfully</h1>
        <h3 class="text-center text-xl text-grey p-4">You will shortly be redirected to home page</h3>
        <i class="fa-solid fa-circle-check fa-3x text-center" style="color: #57db1f;"></i>
    </div>

    <script src="js/main.js"></script>
</body>

</html>
<?php
// Set the delay in seconds
$delay = 3;

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
