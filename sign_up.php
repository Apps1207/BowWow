<?php
include 'db.php'; 



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Name = $_POST['Name'];
    $Location = $_POST['Location'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];

    if ($Name === "" || $Location === "" || $Email === "" || $Password === "") {
        echo "All fields are required";
        exit;
    }
    

    if (signupUser($Name, $Location, $Email, $Password)) {
        echo "User signed up successfully";
    } else {
        echo "User signup failed";
    }

    echo "HELOO"
}
?>
