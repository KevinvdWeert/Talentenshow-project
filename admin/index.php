<?php
include_once __DIR__ . '/../includes/db_connect.php';

// Include necessary files (e.g., authentication)

// Check if the user is logged in, otherwise redirect to login page

// Admin dashboard content goes here
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles/admin.css">
</head>
<body>
    <?php
    // TODO: Add authentication check
    echo "<h1>Admin Dashboard</h1>";
    ?>
    <!-- Add admin functionalities here (e.g., manage participants, view bookings) -->
    <script src="scripts/admin.js"></script>
</body>
</html>