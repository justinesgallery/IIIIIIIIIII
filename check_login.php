<?php
@include 'user_db_conn.php';

session_start();

if(isset($_POST['submit'])){
   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $pass = ($_POST['pass']);

   // Check if the user is an admin
   $sql_admin = "SELECT * FROM iii_non_students WHERE username = '$username' AND pass = '$pass' AND role = 'admin'";
   $result_admin = mysqli_query($conn, $sql_admin);

   if($result_admin && mysqli_num_rows($result_admin) > 0){
       $row_admin = mysqli_fetch_assoc($result_admin);
       // Admin credentials match, log in the user as admin
       $_SESSION['username'] = $row_admin['username'];
       $_SESSION['profile_pic'] = $row_admin['profile_pic'];
       $_SESSION['name'] = $row_admin['name'];
       $_SESSION['role'] = $row_admin['role'];
       $_SESSION['email'] = $row_admin['email'];
       $_SESSION['mobile'] = $row_admin['mobile'];
       echo "<script>alert('Login Successful!'); window.location='dashboard_non_student_admin.php';</script>";
       exit();
   }

   // If not an admin, continue with regular login process
   $sql = "SELECT * FROM iii_non_students WHERE username = '$username' AND pass = '$pass'";
   
   $result = mysqli_query($conn, $sql);

   if($result && mysqli_num_rows($result) > 0){

     $row = mysqli_fetch_assoc($result);
     if ($row['pass'] == $pass) {
        $_SESSION['username'] = $row['username'];
        $_SESSION['profile_pic'] = $row['profile_pic'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['role'] = $row['role'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['mobile'] = $row['mobile'];

        echo "<script>alert('Login Successful!'); window.location='dashboard_non_student_admin.php';</script>";
        exit();
     } else {
         $error[] = 'Incorrect email or password!';
         echo "<script>alert('Incorrect email or password!'); window.location='non-student-admin-login-screen.php';</script>";
     }
   } else {
       $error[] = 'Incorrect email or password!';
       echo "<script>alert('Incorrect email or password!'); window.location='non-student-admin-login-screen.php';</script>";
   }
}

?>
