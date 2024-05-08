<?php
session_start();

if (isset($_SESSION['username']) && isset($_POST['newUsername'])) {
    require_once 'user_db_conn.php';

    $newUsername = mysqli_real_escape_string($conn, $_POST['newUsername']);
    $oldUsername = $_SESSION['username'];

    if (!empty($newUsername)) {
        $query = "UPDATE iii_non_students SET username = '$newUsername' WHERE username = '$oldUsername'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $_SESSION['username'] = $newUsername;
            echo '<script>alert("Username changed succesfully!");</script>';
            header("Location: profile_non_student.php?success=1");
            exit();
        } else {
            echo '<script>alert("There is an error in the system, changing username failed");</script>';
            header("Location: profile_non_student.php?error=1");
            exit();
        }
    } else {
        echo '<script>alert("Username cant be empty");</script>';
        header("Location: profile_non_student.php?error=2");
        exit();
    }
} else {
    header("Location: main-login-screen.php");
    exit();
}
?>
