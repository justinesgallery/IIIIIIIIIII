<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="quick_link.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .centered-card {
            margin-top: 8%;
            margin-left: auto;
            margin-right: auto;
        }
        .card {
            max-width: 500px;
        }
        .accordion-container {
            margin-top: 30%;
        }
        .accordion {
            max-width: 500px;
        }
    </style>
</head>
<body>

<?php
include("user_db_conn.php");
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['role'])) {
    $username = $_SESSION['username'];
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $mobile = $_SESSION['mobile'];
?>

<div class="container">
    <div class="row">
        <div class="col-lg-6 centered-card">
            <?php if ($_SESSION['role'] == 'users') { ?>
            <div class="card">
                <img src="<?php echo $_SESSION['profile_pic']; ?>" class="card-img-top" alt="Picture is not supported">
                <div class="card-body">
                    <h5 class="card-title">Username: <?php echo $username;?></h5>
                    <a href="dashboard_non_student_admin.php" class="btn btn-primary">Return</a>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="col-lg-6">
            <div class="accordion-container">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Account Info
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Full Name: <?php echo $name;?><br>
                                Email Address: <?php echo $email;?><br>
                                Mobile Number: <?php echo $mobile;?>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Change Account Settings
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div>
                                    <h5>Change Username</h5>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#changeUsernameModal">Change</button>
                                </div>
                                <div>
                                    <h5>Change Password</h5>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#changePasswordModal">Change</button>
                                </div>
                                <div>
                                    <h5>Change Email</h5>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#changeEmailModal">Change</button>
                                </div>
                                <div>
                                    <h5>Update Profile Picture</h5>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateProfilePicModal">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
} else {
    header("Location: non-student-admin-login-screen.php");
    exit();
}
?>

 
<div class="modal fade" id="changeUsernameModal" tabindex="-1" aria-labelledby="changeUsernameModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changeUsernameModalLabel">Change Username</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="change_username_process.php" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="newUsername" class="form-label">New Username</label>
                        <input type="text" class="form-control" id="newUsername" name="newUsername" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
 
<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="change_password_process.php" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="currentPassword" class="form-label">Current Password</label>
                        <input type="password" class="form-control" id="currentPassword" name="currentPassword" required>
                    </div>
                    <div class="mb-3">
                        <label for="newPassword" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

 
<div class="modal fade" id="changeEmailModal" tabindex="-1" aria-labelledby="changeEmailModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changeEmailModalLabel">Change Email</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="change_email_process.php" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="newEmail" class="form-label">New Email</label>
                        <input type="email" class="form-control" id="newEmail" name="newEmail" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
 
<div class="modal fade" id="updateProfilePicModal" tabindex="-1" aria-labelledby="updateProfilePicModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateProfilePicModalLabel">Update Profile Picture</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="profile_picture_process.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="newProfilePic" class="form-label">Select Image</label>
                        <input type="file" class="form-control" id="newProfilePic" name="newProfilePic" accept="image/*" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-YWlJ3NUqjHZXgwA/i3I6BdEf3QiXSqUbjr4A7Ls+V6Bf8p3lFshlUtmjC7hO7I4p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
