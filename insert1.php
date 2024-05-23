<?php
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "prospect";

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $redirectUrl = $_POST['redirect'];

    // Insert data into the database
    $sql = "INSERT INTO register (username, password, email) VALUES ('$username', '$password', '$email')";
    if ($conn->query($sql) === TRUE) {
        // Redirect to the specified URL
        header('Location: ' . $redirectUrl);
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
