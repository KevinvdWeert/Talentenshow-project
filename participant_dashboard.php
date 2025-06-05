<?php
// Start session and handle logout
session_start();
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}

// Restrict access to participants only
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'participant') {
    header("Location: login.php");
    exit();
}

// Include database connection
include_once 'database/db-connection.php';

// Fetch participant data by registration code
$code = $_SESSION['registration_code'];
$stmt = $pdo->prepare("SELECT * FROM participants WHERE registration_code = ?");
$stmt->execute([$code]);
$participant = $stmt->fetch(PDO::FETCH_ASSOC);

// Include header
include 'Includes/header.php';
?>
<section class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
    <div class="w-100" style="max-width:600px;">
        <!-- Participant info card -->
        <h2 class="mb-4 text-center">Participant Information</h2>
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h5 class="card-title mb-3">Welcome, <?= htmlspecialchars($participant['name']) ?>!</h5>
                <div class="row mb-2">
                    <div class="col-5 text-muted">Category:</div>
                    <div class="col-7"><?= htmlspecialchars($participant['category']) ?></div>
                </div>
                <div class="row mb-2">
                    <div class="col-5 text-muted">Age:</div>
                    <div class="col-7"><?= (int)$participant['age'] ?></div>
                </div>
                <div class="row mb-2">
                    <div class="col-5 text-muted">Email:</div>
                    <div class="col-7"><?= htmlspecialchars($participant['email']) ?></div>
                </div>
            </div>
        </div>
        <!-- Event instructions and requirements -->
        <div class="alert alert-info mb-4">
            <strong>What to bring:</strong>
            <ul class="mb-2">
                <li>Your registration code: <b><?= htmlspecialchars($participant['registration_code']) ?></b></li>
                <li>Any props or instruments needed for your act</li>
                <li>Comfortable clothing and shoes</li>
                <li>Water bottle</li>
                <li>Parental permission (if under 18)</li>
            </ul>
            <strong>Requirements:</strong>
            <ul class="mb-0">
                <li>Arrive at least 30 minutes before the event</li>
                <li>Check in at the registration desk</li>
                <li>Follow the event schedule and instructions from staff</li>
            </ul>
        </div>
        <a href="login.php?logout=1" class="btn btn-secondary w-100">Logout</a>
    </div>
</section>
<?php include 'Includes/footer.php'; ?>
