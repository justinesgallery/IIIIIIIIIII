<?php

require_once 'user_db_conn.php';


$query = "SELECT * FROM announcements";
$result = mysqli_query($conn, $query);


$announcements = array();


if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $announcements[] = array(
            'id' => $row['id'],
            'announcement_title' => $row['announcement_title'],
            'email' => $row['email'],
            'announcement_description' => $row['announcement_description'],
            'created_at' => $row['created_at']
        );
    }
}

mysqli_close($conn);


header('Content-Type: application/json');
echo json_encode($announcements);
?>
