<?php
session_start();
include 'Includes/header.php';
include_once 'Includes/db_connect.php';
include_once 'Includes/functions.php';

$loggedIn = isset($_SESSION['admin']);
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$loggedIn) {
    $username = sanitizeInput($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user && verifyPassword($password, $user['password'])) {
        $_SESSION['admin'] = $username;
        $loggedIn = true;
    } else {
        $message = '<div class="error">Invalid credentials.</div>';
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}
?>
<div class="container my-5">
    <h1 class="mb-4">Login Dashboard</h1>
    <?php if (!$loggedIn): ?>
        <?= $message ?>
        <form method="post" class="bg-white p-4 rounded shadow-sm" style="max-width:350px;">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    <?php else: ?>
        <p>Welcome, <strong><?= htmlspecialchars($_SESSION['admin']) ?></strong>! <a href="?logout=1" class="btn btn-link">Logout</a></p>
        <ul class="list-group mb-4" style="max-width:400px;">
            <li class="list-group-item"><a href="/Web/Talentenshow project/pages/participants.php">Participants Overview</a></li>
            <li class="list-group-item"><a href="/Web/Talentenshow project/pages/visitors.php">Visitors Overview</a></li>
        </ul>
    <?php endif; ?>
</div>
<?php include 'Includes/footer.php'; ?>