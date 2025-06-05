<?php
session_start();
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: ../login.php");
    exit();
}
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'visitor') {
    header("Location: ../login.php");
    exit();
}
include '../Includes/header.php';
include_once '../database/db-connection.php';

$email = $_SESSION['visitor_email'];
$stmt = $pdo->prepare("SELECT * FROM visitors WHERE email = ?");
$stmt->execute([$email]);
$visitor = $stmt->fetch(PDO::FETCH_ASSOC);

// Countdown calculation: event is always 7 days from now
$eventDate = (new DateTime())->modify('+7 days');
$now = new DateTime();
$interval = $now->diff($eventDate);
?>
<section class="container my-5" style="max-width:500px;">
    <h2 class="mb-4">Your Ticket Overview</h2>
    <div class="alert alert-info mb-3">
        <strong>Days left until the event:</strong> <?= $interval->days ?> days
    </div>
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">Booking Details</h5>
            <p><strong>Name:</strong> <?= htmlspecialchars($visitor['name']) ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($visitor['email']) ?></p>
            <p><strong>Tickets:</strong> <?= (int)$visitor['ticket_count'] ?></p>
            <p><strong>Order Date:</strong> <?= htmlspecialchars($visitor['ordered_at']) ?></p>
        </div>
    </div>
    <div class="alert alert-success">
        <strong>Transaction Document:</strong><br>
        Thank you for your booking! Please show this page or your confirmation email at the entrance.
    </div>
    <a href="../login.php?logout=1" class="btn btn-secondary w-100">Logout</a>
</section>
<?php include '../Includes/footer.php'; ?>
