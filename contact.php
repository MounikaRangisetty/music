
<?php

// Connect to the database
$host = "localhost";
$user = "root";
$password = "";
$dbname = "music";

$conn = mysqli_connect($host, $user, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create a new user
if (isset($_POST['submit'])) {
    $username = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $sub =  $_POST['sub'];
    $msg = $_POST['msg'];

    $sql = "INSERT INTO contact (name,email,mobile,subject,message) VALUES ('$username','$email','$mobile','$sub','$msg')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Thank you for contacting us');window.location.href = 'index.php';</script>";

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>