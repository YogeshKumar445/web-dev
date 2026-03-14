<?php
$conn = new mysqli("localhost", "root", "", "login_db");

if ($conn->connect_error) {
    die("Connection Failed");
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        echo "Login Successful";
    } else {
        echo "Invalid Password";
    }
} else {
    echo "User Not Found";
}

$conn->close();
?>
