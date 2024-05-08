<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="view_announcement.css">
    <title>View Announcements</title>
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
        echo '<div class="announcement" data-id="' . $row['id'] . '">';
        echo '<h3>' . $row['announcement_title'] . '</h3>';
        echo '<p>'. $row['email'] . '<p>';
        echo '<p>' . $row['announcement_description'] . '</p>';
        echo '<p>Date: ' . $row['created_at'] . '</p>';
        // Edit and delete buttons
        echo '<button class="btn btn-primary edit-btn" data-toggle="modal" data-target="#editAnnouncementModal" data-title="' . $row['announcement_title'] . '" data-email="' . $row['email'] . '" data-description="' . $row['announcement_description'] . '">Edit</button>';
        echo '<button class="btn btn-danger delete-btn">Delete</button>';
        echo '</div>';
    }
    ?>
  </div>
</div>

<!-- Edit Announcement Modal -->
<div class="modal fade" id="editAnnouncementModal" tabindex="-1" role="dialog" aria-labelledby="editAnnouncementModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAnnouncementModalLabel" style="color:white;">Edit Announcement</h5>
            </div>
            <form method="POST" action="edit_announcement.php">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="edit-title">Title:</label>
                        <input type="text" class="form-control" id="edit-title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="edit-email">Email:</label>
                        <input type="email" class="form-control" id="edit-email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="edit-description">Description:</label>
                        <textarea class="form-control" id="edit-description" name="description"></textarea>
                    </div>
                    <input type="hidden" id="edit-id" name="id">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript code remains unchanged -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
  $(document).ready(function() {
    $('.announcement').click(function() {
      // Existing code for displaying announcement details
    });

    // Edit button click handler
    $('.edit-btn').click(function() {
      var title = $(this).data('title');
      var email = $(this).data('email');
      var description = $(this).data('description');
      var id = $(this).parent().data('id');
      $('#edit-title').val(title);
      $('#edit-email').val(email);
      $('#edit-description').val(description);
      $('#edit-id').val(id);
    });

    // Delete button click handler
    $('.delete-btn').click(function() {
      var id = $(this).parent().data('id');
      // Make an AJAX request to delete announcement
      $.ajax({
        url: 'delete_announcement.php',
        method: 'POST',
        data: { id: id },
        success: function(response) {
          // Remove the announcement from the UI if deletion is successful
          $('[data-id="' + id + '"]').remove();
          // Show a success message
          alert(response);
        },
        error: function(xhr, status, error) {
          console.error('Error deleting announcement:', error);
          // Show an error message
          alert('Error deleting announcement: ' + error);
        }
      });
    });
  });
</script>

</body>
</html>
