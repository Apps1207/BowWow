<?php
include 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $location = $_POST['location'];
    
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        $imageUrl = $targetFile;

        if (uploadAnimalImage($imageUrl, $location)) {
            echo "Animal image uploaded successfully";
        } else {
            echo "Animal image upload failed";
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
