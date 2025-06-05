<?php
// Start session and handle logout
session_start();
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}

// Restrict access to admin users only
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Include database connection and utility functions
include_once 'database/db-connection.php';
include_once 'Includes/functions.php';
include 'Includes/header.php';

// Get total tickets sold and total visitors
$totalTickets = $pdo->query("SELECT SUM(ticket_count) FROM visitors")->fetchColumn() ?? 0;
$totalVisitors = $pdo->query("SELECT COUNT(*) FROM visitors")->fetchColumn() ?? 0;

// Fetch all participants for the overview table
$participants = $pdo->query("SELECT name, email, registration_code, category, age FROM participants ORDER BY name ASC")->fetchAll(PDO::FETCH_ASSOC);

// Calculate countdown to event (7 days from now)
$eventDate = (new DateTime())->modify('+7 days');
$now = new DateTime();
$interval = $now->diff($eventDate);
?>
<section class="container my-5">
    <!-- Dashboard summary cards -->
    <h2 class="mb-4">Admin Dashboard</h2>
    <div class="row mb-4">
        <div class="col-md-4 mb-3">
            <div class="card border-success shadow-sm h-100">
                <div class="card-body text-center">
                    <h5 class="card-title text-success">Total Tickets Sold</h5>
                    <p class="display-5 fw-bold"><?= (int)$totalTickets ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card border-primary shadow-sm h-100">
                <div class="card-body text-center">
                    <h5 class="card-title text-primary">Total Visitors</h5>
                    <p class="display-5 fw-bold"><?= (int)$totalVisitors ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card border-warning shadow-sm h-100">
                <div class="card-body text-center">
                    <h5 class="card-title text-warning">Countdown to Festival</h5>
                    <p class="display-6 fw-bold mb-0"><?= $interval->days ?> days</p>
                    <small class="text-muted">until <?= $eventDate->format('F j, Y') ?></small>
                </div>
            </div>
        </div>
    </div>

    <!-- Participants overview table -->
    <h3 class="mt-5 mb-3">Participants Overview</h3>
    <?php if (empty($participants)): ?>
        <div class="alert alert-info">No participants registered yet.</div>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Category</th>
                        <th>Age</th>
                        <th>Registration Code</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($participants as $p): ?>
                    <tr>
                        <td><?= htmlspecialchars($p['name']) ?></td>
                        <td><?= htmlspecialchars($p['email']) ?></td>
                        <td><?= htmlspecialchars($p['category']) ?></td>
                        <td><?= (int)$p['age'] ?></td>
                        <td><code><?= htmlspecialchars($p['registration_code']) ?></code></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</section>
<?php include 'Includes/footer.php'; ?>