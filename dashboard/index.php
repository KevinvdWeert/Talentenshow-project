<?php
session_start();
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: ../login.php");
    exit();
}
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}
include '../includes/headerloggedin.php';
include_once '../database/db-connection.php';
include_once __DIR__ . '/../includes/functions.php';

// Get total tickets and visitors
$totalTickets = $pdo->query("SELECT SUM(ticket_count) FROM visitors")->fetchColumn() ?? 0;
$totalVisitors = $pdo->query("SELECT COUNT(*) FROM visitors")->fetchColumn() ?? 0;

// Get all participants with credentials
$participants = $pdo->query("SELECT name, email, registration_code, category, age FROM participants ORDER BY name ASC")->fetchAll(PDO::FETCH_ASSOC);

// Countdown calculation
$eventDate = new DateTime('2025-06-05 19:00:00');
$now = new DateTime();
$interval = $now->diff($eventDate);
?>
<section class="container my-5">
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
                    <small class="text-muted">until June 5, 2025</small>
                </div>
            </div>
        </div>
    </div>

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
<?php include __DIR__ . '/../includes/footer.php'; ?>