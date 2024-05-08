<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["newProfilePic"])) {
    require_once 'user_db_conn.php';

    $targetDirectory = "profile/";
    $targetFile = $targetDirectory . basename($_FILES["newProfilePic"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["newProfilePic"]["tmp_name"]);
    if ($check === false) {
        echo "<script>alert('File is not an image!'); window.location='profile_non_student.php';</script>";
        $uploadOk = 0;
    }

    if ($_FILES["newProfilePic"]["size"] > 5000000) {
        echo "<script>alert('Your file is too large!'); window.location='profile_non_student.php';</script>";
        $uploadOk = 0;
    }

    if (!in_array($imageFileType, array("jpg", "png", "jpeg", "gif"))) {
        echo "<script>alert('Sorry only JPG, PNG, & GIF files are allowed!'); window.location='profile_non_student.php';</script>";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "<script>alert('Sorry your file was not uploaded!'); window.location='profile_non_student.php';</script>";
    } else {
        if (move_uploaded_file($_FILES["newProfilePic"]["tmp_name"], $targetFile)) {
            $username = $_SESSION['username'];
            $profilePicPath = mysqli_real_escape_string($conn, $targetFile);

            $updateQuery = "UPDATE iii_non_students SET profile_pic = '$profilePicPath' WHERE username = '$username'";
            if (mysqli_query($conn, $updateQuery)) {
                $_SESSION['profile_pic'] = $profilePicPath;
                echo "<script>alert('Profile picture updated successfully!'); window.location='profile_non_student.php';</script>";
                exit();
            } else {
                echo "<script>alert('Error updating profile picture!'); window.location='profile_non_student.php';</script>";
            }
        } else {
            echo "<script>alert('Sorry there was an error uploading your file!'); window.location='profile_non_student.php';</script>";
        }
    }
} else {
    echo "<script>alert('Invalid request!'); window.location='profile_non_student.php';</script>";
}
?>
