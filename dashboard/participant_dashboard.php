<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'participant') {
    header("Location: ../login.php");
    exit();
}
include '../includes/header.php';
include_once __DIR__ . '/../includes/db_connect.php';

$code = $_SESSION['registration_code'];
$stmt = $pdo->prepare("SELECT * FROM participants WHERE registration_code = ?");
$stmt->execute([$code]);
$participant = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<section class="container my-5" style="max-width:600px;">
    <h2 class="mb-4">Participant Information</h2>
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">Welcome, <?= htmlspecialchars($participant['name']) ?>!</h5>
            <p><strong>Category:</strong> <?= htmlspecialchars($participant['category']) ?></p>
            <p><strong>Age:</strong> <?= (int)$participant['age'] ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($participant['email']) ?></p>
        </div>
    </div>
    <div class="alert alert-info">
        <strong>What to bring:</strong>
        <ul>
            <li>Your registration code: <b><?= htmlspecialchars($participant['registration_code']) ?></b></li>
            <li>Any props or instruments needed for your act</li>
            <li>Comfortable clothing and shoes</li>
            <li>Water bottle</li>
            <li>Parental permission (if under 18)</li>
        </ul>
        <strong>Requirements:</strong>
        <ul>
            <li>Arrive at least 30 minutes before the event</li>
            <li>Check in at the registration desk</li>
            <li>Follow the event schedule and instructions from staff</li>
        </ul>
    </div>
    <a href="../login.php?logout=1" class="btn btn-secondary w-100">Logout</a>
<?php include '../includes/footer.php'; ?>
