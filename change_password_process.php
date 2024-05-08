<?php
session_start();

if (isset($_SESSION['username']) && isset($_POST['currentPassword']) && isset($_POST['newPassword'])) {
    require_once 'user_db_conn.php';

    $currentPassword = mysqli_real_escape_string($conn, $_POST['currentPassword']);
    $newPassword = mysqli_real_escape_string($conn, $_POST['newPassword']);
    $username = $_SESSION['username'];

    $query = "SELECT pass FROM iii_non_students WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $storedPassword = $row['pass'];

        if ($currentPassword === $storedPassword) {
            $updateQuery = "UPDATE iii_non_students SET pass = '$newPassword' WHERE username = '$username'";
            $updateResult = mysqli_query($conn, $updateQuery);

            if ($updateResult) {
                echo '<script>alert("Password update successfully.");</script>';
                header("Location: profile_non_student.php?success=1");
                exit();
            } else {
                echo '<script>alert("An error occur, please try again.");</script>';
                header("Location: profile_non_student.php?error=2");
                exit();
            }
        } else {
            echo '<script>alert("Your current password doesnt match. Please try again.");</script>';
            header("Location: profile_non_student.php?error=3");
            exit();
        }
    } else {
        echo '<script>alert("Data not found. Please try again later.");</script>';
        header("Location: profile_non_student.php?error=4");
        exit();
    }
} else {
    header("Location: main-login-screen.php");
    exit();
}
?>
