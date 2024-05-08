<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Login</title>
    <style>
        body{
            background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(255,119,0,1) 0%, rgba(0,48,255,1) 100%);
color: white;        
}
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <form class="border shadow p-3 rounded" action="check_login.php" style="width: 450px;" method="post" >
            <h1 class="text-center p-3">LOGIN</h1>
            <?php 
            if (isset($_GET['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= $_GET['error'] ?>
                </div>
            <?php } ?>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" name="pass" id="password">
                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                        <img src="view.png" alt="eye" style="height: 1.25rem;">
                    </button>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mb-3" name="submit">Submit</button>
            <p id="studentMessage" style="display: none;">A student account is provided by the admin</p>
            <p>Don't have an account? <a href="register.php">Register here</a></p>
        </form>
    </div>

    <script>

        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function () {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);

            const eyeImg = togglePassword.querySelector('img');
            if (type === 'password') {
                eyeImg.src = 'view.png';
            } else {
                eyeImg.src = 'hide.png';
            }
        });

        document.querySelector('form').addEventListener('submit', function(event) {
            // Form action will now be determined in the PHP script based on the logic there
            // No need for client-side role checking
        });

    </script>
</body>
</html>
