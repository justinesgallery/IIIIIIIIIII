<?php
session_start();

if (isset($_SESSION['username']) && isset($_POST['newEmail'])) {
    require_once 'user_db_conn.php';

    $newEmail = mysqli_real_escape_string($conn, $_POST['newEmail']);
    $username = $_SESSION['username'];

    if (filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
        $query = "UPDATE iii_non_students SET email = '$newEmail' WHERE username = '$username'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $_SESSION["email"] = $newEmail;
            echo '<script>alert("Email updated successfully.");</script>';
            header("Location: profile_non_student.php?success=1");
            exit();
        } else {
            echo '<script>alert("Error updating email. Please try again.");</script>';
            header("Location: profile_non_student.php?error=1");
            exit();
        }
    } else {
        echo '<script>alert("Invalid email address. Please provide a valid email.");</script>';
        header("Location: profile_non_student.php?error=2");
        exit();
    }
} else {
    header("Location: main-login-screen.php");
    exit();
}
?>
