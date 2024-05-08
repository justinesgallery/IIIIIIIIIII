<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Announcement</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .btn-primary {
            background-color: #02008a;
            border-color: #02008a;
        }

        .btn-primary:hover {
            background-color: #f09000;
            border-color: #f09000;
        }

        /* Add style for header text color */
        .modal-title {
            color: white;
        }
    </style>
</head>
<body>
    
    <!-- Edit Announcement Modal -->
  <div class="modal fade" id="editAnnouncementModal" tabindex="-1" role="dialog" aria-labelledby="editAnnouncementModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAnnouncementModalLabel" style="color:white;">Edit Announcement</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
