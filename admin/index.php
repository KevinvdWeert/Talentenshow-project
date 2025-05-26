<?php
session_start();
include '../includes/header.php';
include_once __DIR__ . '/../includes/db_connect.php';
include_once __DIR__ . '/../includes/functions.php';

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
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="/Web/Talentenshow project/assets/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Admin Dashboard</h1>
        <?php if (!$loggedIn): ?>
            <?= $message ?>
            <form method="post" style="max-width:350px;">
                <label>Username</label>
                <input type="text" name="username" required>
                <label>Password</label>
                <input type="password" name="password" required>
                <input type="submit" value="Login">
            </form>
        <?php else: ?>
            <p>Welcome, <strong><?= htmlspecialchars($_SESSION['admin']) ?></strong>! <a href="?logout=1">Logout</a></p>
            <ul>
                <li><a href="/Web/Talentenshow project/pages/participants.php">Participants Overview</a></li>
                <li><a href="/Web/Talentenshow project/pages/visitors.php">Visitors Overview</a></li>
            </ul>
        <?php endif; ?>
    </div>
</body>
</html>