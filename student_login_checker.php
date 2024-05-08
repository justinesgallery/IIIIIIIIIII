<?php
@include 'user_db_conn.php';

if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = $_POST['pass'];
    $student_number = mysqli_real_escape_string($conn, $_POST['student_number']);
    $error = "";

    if(empty($username) || empty($pass) || empty($student_number)) {
        $error = 'Username, password, and student number are required!';
        echo "<script>alert('All fields are required!'); window.location='student_login_screen.php';</script>";
    } else {
       
        $select = "SELECT * FROM iii_students WHERE username = '$username'";
        $result = mysqli_query($conn, $select);
        if(mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
        
            if($pass == $row['password']) {
                
                if($student_number == $row['students_number']) {
                   
                    if($row['role'] == 'student') {
                        
                        session_start();
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['name'] = $row['name'];
                        $_SESSION['student_number'] = $row['students_number'];
                        $_SESSION['role'] = $row['role'];
                        
                        header('location: dashboard_student.php');
                    } else {
                        $error = 'You are not authorized to access student dashboard!';
                        echo "<script>alert('You are not authorized to access student dashboard!'); window.location='student_login_screen.php';</script>";
                    }
                } else {
                    $error = 'Student number does not match!';
                    echo "<script>alert('Student number does not match!'); window.location='student_login_screen.php';</script>";
                }
            } else {
                $error = 'Incorrect password!';
                echo "<script>alert('Incorrect password!'); window.location='student_login_screen.php';</script>";
            }
        } else {
            $error = 'Username not found!';
            echo "<script>alert('Username not found!'); window.location='student_login_screen.php';</script>";
        }
    }

    if(!empty($error)) {
        echo '<p>' . $error . '</p>';
    }
}
?>