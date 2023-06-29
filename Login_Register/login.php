<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
    header('Location: /Assignment/index.php');
    exit();
}

if (!is_writable(session_save_path())) {
    echo 'Session path "'.session_save_path().'" is not writable for PHP!';
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email)) {
        echo "Enter the email";
    } else if (empty($password)) {
        echo "Enter the password";
    } else {
        $conn = new mysqli('localhost', 'root', '', 'uecs2094_website');
        if ($conn->connect_error) {
            die ("Connection failed : " . $conn->connect_error);
        }

        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = $result->fetch_assoc();
            if ($row['email'] === $email && $row['password'] === $password) {
                echo "Logging in...";
                $_SESSION['id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                header('Location: /Assignment/index.php');
                exit();
            } else {
                echo "Invalid Email or Password";
            }
        } else {
            echo "Email or Password has been entered incorrectly";
        }
    }
}
?>
