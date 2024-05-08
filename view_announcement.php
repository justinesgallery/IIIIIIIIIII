

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Announcements</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="view_announcement.css">
</head>
<body>

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
                        <a class="nav-link active" aria-current="page" href="dashboard_non_student_admin.php" style="color: white">Home</a>
                    </li>
                    <li class="nav-item ml-auto" style=" border-radius:10px">
                        <a class="nav-link" href="logout.php" style="color: white; text-decoration:none;">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>




  <div class="container">
    <h2 class="h2" style="color:white">Announcements</h2>
    <div id="announcements">
      <?php
      require 'user_db_conn.php';

      $query = "SELECT * FROM announcements";
      $result = mysqli_query($conn, $query);

      while ($row = mysqli_fetch_assoc($result)) {
          echo '<div class="announcement" data-toggle="modal" data-target="#announcementModal" data-id="' . $row['id'] . '">';
          echo '<h3>' . $row['announcement_title'] . '</h3>';
          echo '<p>'. $row['email'] . '<p>';
          echo '<p>' . $row['announcement_description'] . '</p>';
          echo '<p>Date: ' . $row['created_at'] . '</p>';
          echo '</div>';
      }
      ?>
    </div>
  </div>

  <!-- Modal for displaying announcement details -->
  <div class="modal" id="announcementModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Announcement Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal Body -->
        <div class="modal-body">
          <h5 id="modalTitle"></h5>
          <p id="modalFrom"></p>
          <p id="modalDescription"></p>
          <p id="modalDate"></p>
        </div>
        
        <!-- Modal Footer -->
        <div class="modal-footer">
          <button type="button" class="btn" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script>
    
    $(document).ready(function() {
      $('.announcement').click(function() {
        var id = $(this).data('id');
        fetch('fetch_announcements.php')
          .then(response => response.json())
          .then(announcements => {
            const announcement = announcements.find(announcement => announcement.id == id);
            $('#modalTitle').text(announcement.announcement_title);
            $('#modalFrom').text("From: " + announcement.email);
            $('#modalDescription').text(announcement.announcement_description);
            $('#modalDate').text("Date: " + announcement.created_at);
            console.log(announcements);
          })
          .catch(error => console.error('Error fetching announcements:', error));
      });
    });
  </script>
</body>
</html>
