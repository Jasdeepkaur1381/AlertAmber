<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style3.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9c528e122c.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <h1 class="text-5xl text-primary font-bold text-center my-8">
        Orders
    </h1>
    <div class="w-5/6 mx-auto">
        <table id="customers">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Reservation date</th>
                <th>Time</th>
                <th>Pet order</th>
                <th>Delete</th>
                <th>Reply</th>  
            </tr>
<?php
include('./conn.php');
$sql = "select * from `orderd`";
$result = mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result))
{    
    $id=$row['id'];
    $name=$row['name'];
    $email=$row['email'];
    $date=$row['date'];
    $time=$row['time'];
    $peto=$row['peto'];
    ?>
    <tr>
    <td><?php  echo $name?></td>
    <td><?php  echo $email?></td>
    <td><?php  echo $date?></td>
    <td><?php  echo $time?></td>
    <td><?php  echo $peto?></td>
    <td>
        <form action="delete2.php" method="post" >
            <input style="display:none;" type="text" name="id" value= <?php echo $id ?>  >
            <button><i class="fa-solid fa-trash fa-lg" style="color: #ed6436;"></i></button>
        </form>
    </td>
    <td class="text-center"><button><i class="fa-solid fa-reply fa-lg" style="color: #28a745;"></i></button></td>
    </tr>
    <?php
}
?>

</table>
    </div>
    <div class="w-1/4 my-10 mx-auto">
    <div class="flex flex-row justify-evenly">
    <div class="flex flex-column">
        <h4 class="text-gray-400 text-lg">Total number of orders</h4>
        <div class="text-center text-gray-400 text-lg">
            <?php
             $sqlcount = "SELECT * from orderd";

             if ($resultcount = mysqli_query($conn, $sqlcount)) {
             
                 // Return the number of rows in result set
                 $rowcount = mysqli_num_rows( $resultcount );
                 
                 // Display result
                 printf("%d\n", $rowcount);
              }
            ?>
        </div>

    </div>
    <div>  <input class="p-3 text-md" type="submit" id='logout' name="logout" value="Log Out" />  </div>
</div>
</div>
</body>
<script type="module">
    // Import the functions you need from the SDKs you need
    import { initializeApp } from "https://www.gstatic.com/firebasejs/9.21.0/firebase-app.js";
    import { getDatabase, set, ref, update } from "https://www.gstatic.com/firebasejs/9.21.0/firebase-database.js";
    import { getAuth, createUserWithEmailAndPassword, signInWithEmailAndPassword, onAuthStateChanged, signOut } from "https://www.gstatic.com/firebasejs/9.21.0/firebase-auth.js";

    import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.21.0/firebase-analytics.js";
    // TODO: Add SDKs for Firebase products that you want to use
    // https://firebase.google.com/docs/web/setup#available-libraries

    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    const firebaseConfig = {
        apiKey: "AIzaSyBRKczmH1CNeDm4nHwt9qhsKxk_FoOsjow",
        authDomain: "animal-authenticaltion.firebaseapp.com",
        projectId: "animal-authenticaltion",
        storageBucket: "animal-authenticaltion.appspot.com",
        messagingSenderId: "342781388664",
        appId: "1:342781388664:web:d9497a3b3cc07f588f0a8d",
        measurementId: "G-QQCDVT7HEX"
    };

    // Initialize Firebase
    const app = initializeApp(firebaseConfig);
    const database = getDatabase(app);
    const analytics = getAnalytics(app);
    const auth = getAuth();
    // sighUp.addEventListener('click', (e) => {

    //     var email = document.getElementById('email').value;
    //     var password = document.getElementById('password').value;
    //     var username = document.getElementById('username').value;

    //     createUserWithEmailAndPassword(auth, email, password)
    //         .then((userCredential) => {
    //             // Signed in 
    //             const user = userCredential.user;

    //             set(ref(database, 'users/' + user.uid), {
    //                 username: username,
    //                 email: email
    //             })

    //             alert('user created!');
    //             // ...
    //         })
    //         .catch((error) => {
    //             const errorCode = error.code;
    //             const errorMessage = error.message;

    //             alert(errorMessage);
    //             // ..
    //         });

    // });

    // login.addEventListener('click', (e) => {
    //     var email = document.getElementById('email').value;
    //     var password = document.getElementById('password').value;

    //     signInWithEmailAndPassword(auth, email, password)
    //         .then((userCredential) => {
    //             // Signed in 
    //             // const user = userCredential.user;

    //             // const dt = new Date();
    //             // update(ref(database, 'users/' + user.uid), {
    //             //     last_login: dt,
    //             // })

    //             alert('User loged in!');
    //             location.href = "index.html";
    //             // ...
    //         })
    //         .catch((error) => {
    //             const errorCode = error.code;
    //             const errorMessage = error.message;

    //             alert(errorMessage);

    //         });

    // });

    // const user = auth.currentUser;
    // onAuthStateChanged(auth, (user) => {
    //     if (user) {
    //         // User is signed in, see docs for a list of available properties
    //         // https://firebase.google.com/docs/reference/js/firebase.User
    //         const uid = user.uid;
    //         //bla bla bla
    //         // ...
    //     } else {
    //         // User is signed out
    //         // ...
    //         //bla bla bla
    //     }
    // });

    logout.addEventListener('click', (e) => {

        signOut(auth).then(() => {
            // Sign-out successful.
            alert('user loged out');
            location.href = "authentication.html";
            
        }).catch((error) => {
            // An error happened.
            const errorCode = error.code;
            const errorMessage = error.message;
            
            alert(errorMessage);
        });

    });

</script>
</html>