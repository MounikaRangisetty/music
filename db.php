
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
  <link rel="stylesheet" href="signin.css"></head>
</head>
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
    $password = $_POST['password'];
    $email = $_POST['email'];
    $mobile =$_POST['mobile'];
    $gender =$_POST['gender'];
    $education =$_POST['education'];
    $sub =implode(',', $_POST['sub']);


 
$query = "SELECT * FROM user WHERE email = '$email'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<script>alert('Email is already in use. Please choose a different email.');window.location.href = 'register.html';</script>";

}
else { 
    $sql = "INSERT INTO user (name,email,mobile,password,gender,education,sub) VALUES ('$username','$email','$mobile', '$password','$gender','$education','$sub' )";

    if (mysqli_query($conn, $sql)) {
        header("location:index.php");
     } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
}

// Update an existing user
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $username = $_POST['name'];
    $password = $_POST['password'];
   

    $sql = "UPDATE users SET  password='$password' WHERE name='$username'";

    if (mysqli_query($conn, $sql)) {
        header("location:index.php");
    } else {
        echo "Error updating user: " . mysqli_error($conn);
    }
}

if(isset($_POST['login'])) {
    $email = $_POST['mail'];
    $password = $_POST['password'];
    $sql = mysqli_query($conn,"SELECT * FROM user WHERE email='$email' AND password='$password'    ");
   
    $num = mysqli_num_rows($sql);
   
    if($num > 0) {
        session_start();
        $_SESSION["name"] = $customer["name"];
        $_SESSION["id"] = $customer["id"];
        $_SESSION["logged_in"] = true; 
       
        header("location:index.php");
          
      }else{
        
        setcookie("error", "wrong username or password", time()+3);
      }
    }



mysqli_close($conn);

?>


