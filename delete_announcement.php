<?php
// user_db_conn.php
// Include database connection or any necessary files
require 'user_db_conn.php';

// Check if announcement ID is provided
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $announcement_id = $_POST['id'];

    // Delete announcement from the database
    $delete_query = "DELETE FROM announcements WHERE id = $announcement_id";
    if (mysqli_query($conn, $delete_query)) {
        // Send success response
        echo "Announcement deleted successfully.";
    } else {
        // Send error response
        echo "Error deleting announcement: " . mysqli_error($conn);
    }
} else {
    // Send error response if announcement ID is not provided
    echo "Announcement ID not provided.";
}
?>
