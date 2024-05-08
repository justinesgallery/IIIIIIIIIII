<?php
include("user_db_conn.php");
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['role'])) { 
    ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="dashboard_non_student.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>

                            <!-- NON-STUDENT-DASHBOARD -->

<?php if ($_SESSION['role'] == 'users') { ?>
  
    <nav class="navbar navbar-expand-lg py-3">
        <div class="container-fluid">
            <img class="logo" src="final_logo.png" alt="Logo" srcset="">
            <a class="navbar-brand" href="#" style="color: white">OAEC</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="background-color: #f1b24a"">
            <span class=" navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#home" style="color: white">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about" style="color: white">About</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="profile_non_student.php" style="color: white">Profile</a>
                    </li> -->
                    <li class="nav-item ml-auto" style=" border-radius:10px">
                        <a class="nav-link" href="logout.php" style="color: white; text-decoration:none;">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section id="home">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="dashboard">
                        <div class="options">
                            <div class="option-card">
                                <h2>Announcements</h2>
                                <p>Check out the latest announcements and updates.</p>
                                <button class="option-button" onclick="location.href='view_announcement.php'">View Announcements</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="dashboard">
                        <div class="options">
                            <div class="option-card">
                                <h2>Event Calendar</h2>
                                <p>Check out our upcoming events and important dates on the calendar.</p>
                              
                                <button class="option-button" onclick="location.href='calendar_view_for_non_student.php'">View Calendar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-md-6 mb-4"> 
                    <div class="dashboard">
                        <div class="options">
                            <div class="option-card">
                                <h2>Quick Links</h2>
                                <p>Access important resources quickly with our Quick Links section.</p>
                               
                                <button class="option-button" onclick="location.href='quick_links_non_student_admin.php'">View QuickLinks</button>
                            </div>
                        </div>
                    </div>
                </div> -->

            </div>
        </div>
        </div>
    </section>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>


    <section id="about">
        <h2 class="h2 d-flex justify-content-center align-items-center" style="color:#fff">About CARD-MRI Development Institute Inc.</h2>
        <div class="about_container content-padding">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <ul class="list-group">
                        <li class="list-group-item " style="background-color: white">
                            <div class="center">
                                <p>Welcome to CMDI! We are dedicated to providing a nurturing and stimulating environment for our students to learn and grow.</p>
                                <p>Our mission is to foster academic excellence, creativity, and personal development in every student. Through innovative teaching methods and a supportive community, we empower our students to reach their full potential.</p>
                                <p>At CMDI, we believe in the importance of diversity, inclusivity, and lifelong learning. Our dedicated team of educators is committed to cultivating a culture of respect, collaboration, and intellectual curiosity.</p>
                                <p>Join us on our journey of academic exploration and personal growth. Together, we can make a difference in the lives of our students and shape a brighter future.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <br>
    <br>
    <br>

    
    <footer>
        <p>CARD-MRI Development Institute Inc.</p>
        <p>Tranca, Bay, Laguna Laguna</p>
        <p>Phone: 099999999 | Email: [card_mriexapleemail@gmail.com]</p>

        <p>Copyright © 2024 CARD-MRI Development Institute Inc. All rights reserved.</p>
    </footer>


    <button class="back-to-dashboard" onclick="location.href='dashboard_non_student_admin.php'">Back to Home</button>

<?php } ?>


                            <!-- ADMIN-DASHBOARD -->

<?php if ($_SESSION['role'] == 'admin') { ?>
<nav class="navbar navbar-expand-lg py-3">
        <div class="container-fluid">
            <img class="logo" src="final_logo.png" alt="Logo" srcset="">
            <a class="navbar-brand" href="#" style="color: white">OAEC</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="background-color: #f1b24a"">
            <span class=" navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#home" style="color: white">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about" style="color: white">About</a>
                    </li>
                    <li class="nav-item ml-auto" style=" border-radius:10px">
                        <a class="nav-link" href="logout.php" style="color: white; text-decoration:none;">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section id="home">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-4"> 
                    <div class="dashboard">
                        <div class="options">
                            <div class="option-card">
                                <h2>Make Announcements</h2>
                                <p>Make announcements to let others know the latest events.</p>
                                <button class="option-button" onclick="location.href='make_announcement_form.php'">Make Announcements</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4"> 
                    <div class="dashboard">
                        <div class="options">
                            <div class="option-card">
                                <h2>View Announcements</h2>
                                <p>View announcements to see your Already made announcements.</p>
                                <button class="option-button" onclick="location.href='view_announcements_for_Admin.php'">View Announcements</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4"> 
                    <div class="dashboard">
                        <div class="options">
                            <div class="option-card">
                                <h2>Event Calendar</h2>
                                <p>Mark all the important dates here.</p>
                                
                                <button class="option-button" onclick="location.href='event_calendar.php'">Set Events</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-md-6 mb-4"> 
                    <div class="dashboard">
                        <div class="options">
                            <div class="option-card">
                                <h2>Quick Links</h2>
                                <p>Access important resources quickly with our Quick Links section.</p>
                                <button class="option-button" onclick="location.href='quick_links_non_student_admin.php'">View QuickLinks</button>
                            </div>
                        </div>
                    </div>
                </div> -->

            </div>
        </div>
        </div>
    </section>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>


    <section id="about">
        <h2 class="h2 d-flex justify-content-center align-items-center" style="color:#fff">About CARD-MRI Development Institute Inc.</h2>
        <div class="about_container content-padding">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <ul class="list-group">
                        <li class="list-group-item " style="background-color: white">
                            <div class="center">
                                <p>Welcome to CMDI! We are dedicated to providing a nurturing and stimulating environment for our students to learn and grow.</p>
                                <p>Our mission is to foster academic excellence, creativity, and personal development in every student. Through innovative teaching methods and a supportive community, we empower our students to reach their full potential.</p>
                                <p>At CMDI, we believe in the importance of diversity, inclusivity, and lifelong learning. Our dedicated team of educators is committed to cultivating a culture of respect, collaboration, and intellectual curiosity.</p>
                                <p>Join us on our journey of academic exploration and personal growth. Together, we can make a difference in the lives of our students and shape a brighter future.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <br>
    <br>
    <br>

    
    <footer>
        <p>CARD-MRI Development Institute Inc.</p>
        <p>Tranca, Bay, Laguna Laguna</p>
        <p>Phone: 099999999 | Email: [card_mriexapleemail@gmail.com]</p>

        <p>Copyright © 2024 CARD-MRI Development Institute Inc. All rights reserved.</p>
    </footer>


    <!-- Floating Button for Back to Dashboard -->
    <button class="back-to-dashboard" onclick="location.href='dashboard_non_student_admin.php'">Back to Home</button>

    <?php } ?>

    <script>
        window.addEventListener('scroll', () => {
            const aboutSection = document.getElementById('about');
            const sectionPosition = aboutSection.getBoundingClientRect().top;
            const screenPosition = window.innerHeight / 1.3;

            if (sectionPosition < screenPosition) {
                aboutSection.classList.add('active');
            }
        });
    </script>



</body>

</html>
<?php } else {
    header("Location: main-login-screen.php");
} ?>
