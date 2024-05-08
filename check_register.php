<?php
@include 'user_db_conn.php';

if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = ($_POST['pass']);
    $cpass = ($_POST['cpassword']);
    $role = $_POST['role'];
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $profilePicDir = "profile/";
    $profilePicPath = $profilePicDir . basename($_FILES['profile_pic']['name']);
    $error = array();

    if(empty($name) || empty($username) || empty($mobile) || empty($pass) || empty($cpass)) {
        $error[] = 'All fields are required!';
        echo "<script>alert('All fields are required!'); window.location='register.php';</script>";
    }

    if(strlen($pass) < 8) {
        $error[] = 'Password must be at least 8 characters long!';
        echo "<script>alert('Password must be at least 8 characters long!'); window.location='register.php';</script>";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = 'Invalid email format!';
        echo "<script>alert('Invalid email format!'); window.location='register.php';</script>";
    }


    $select = "SELECT * FROM iii_non_students WHERE email = '$email'";
    $result = mysqli_query($conn, $select);
    if(mysqli_num_rows($result) > 0) {
        $error[] = 'Email already exists!';
        echo "<script>alert('Email already exists!'); window.location='register.php';</script>";
    }

    if(empty($error)) {
 
        $select = "SELECT * FROM iii_non_students WHERE username = '$username'";
        $result = mysqli_query($conn, $select);
        if(mysqli_num_rows($result) > 0) {
            $error[] = 'Username already exists!';
            echo "<script>alert('Username already exists!'); window.location='register.php';</script>";
        } else {
            if($pass != $cpass) {
                $error[] = 'Passwords do not match!';
                echo "<script>alert('Passwords do not match!'); window.location='register.php';</script>";
            } else {
                if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], $profilePicPath)) {
                    echo "Profile picture uploaded successfully.";
                } else {
                    echo "Failed to upload profile picture.";
                    echo "<script>alert('Failed to upload profile picture.'); window.location='register.php';</script>";
                }
                //  $hashedPass = password_hash($pass, PASSWORD_DEFAULT);
                $insert = "INSERT INTO iii_non_students(name, username, pass, role, email, mobile, profile_pic) VALUES('$name','$username','$pass','$role','$email', '$mobile', '$profilePicPath')"; 
                mysqli_query($conn, $insert);
                header('location: non-student-admin-login-screen.php');
            }
        }
    }

    if(!empty($error)) {
        foreach($error as $err) {
            echo '<p>' . $err . '</p>';
        }
    }
}
?>