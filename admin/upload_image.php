<?php
$images_dir = 'images/';

if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $tmp_name = $_FILES['image']['tmp_name'];
    $name = basename($_FILES['image']['name']);

    if (move_uploaded_file($tmp_name, $images_dir . $name)) {
        echo "images/" . $name;
    } else {
        http_response_code(500);
        echo "Error uploading file.";
    }
} else {
    http_response_code(400);
    echo "No file uploaded.";
}
?>
