<?php
if ($_SERVER['request_method'] == 'POST') {
    $name = trim($_POST['name']);
    $gender = trim($_POST['gender']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $type = trim($_POST['enquirytype']);
    $message = trim($_POST['message']);
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $posted = date("Y-m-d, G:i:s"); ;

    if (empty($name))
        echo "Enter your name";

    else if (empty($gender))
        echo "Enter your gender";

    else if (empty($email))
        echo "Enter your email";

    else if (empty($phone))
        echo "Enter your phone number";

    else if (empty($enquirytype))
        echo "Select the type of enquiry";

    else if (empty($message))
        echo "Enter enquiry message";

    else {

        $conn = new mysqli ('localhost', 'root', '', 'uecs2094_website');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO enquiry VALUES ('0', '$name', '$gender', '$email', '$phone', '$type', '$message', '$posted')";

        if ($conn->query($sql) === TRUE) {
            echo "Thank you for your enquiries. We will get back to you as soon as possible.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }

}
?>