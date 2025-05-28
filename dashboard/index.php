<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}
include __DIR__ . '/../includes/header.php';
include_once __DIR__ . '/../includes/db_connect.php';
include_once __DIR__ . '/../includes/functions.php';

// Admin dashboard content
?>
<section class="container my-5">
    <h2 class="mb-4">Admin Dashboard</h2>
    <p>Welcome to the admin panel. Here you can manage the talent show participants, visitors, and more.</p>
    <!-- Add more admin-specific content and controls here -->
</section>
<?php include __DIR__ . '/../includes/footer.php'; ?>