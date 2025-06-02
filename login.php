<?php
session_start();
include __DIR__ . '/includes/header.php';
include_once 'database/db-connection.php';
include_once __DIR__ . '/includes/functions.php';

$message = '';
$role = $_POST['role'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($role === 'admin') {
        $username = sanitizeInput($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && verifyPassword($password, $user['password'])) {
            $_SESSION['role'] = 'admin';
            $_SESSION['admin'] = $username;
            header("Location: dashboard/index.php");
            exit();
        } else {
            $message = '<div class="alert alert-danger">Invalid admin credentials.</div>';
        }
    } elseif ($role === 'visitor') {
        $email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
        $stmt = $pdo->prepare("SELECT * FROM visitors WHERE email = ?");
        $stmt->execute([$email]);
        $visitor = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($visitor) {
            $_SESSION['role'] = 'visitor';
            $_SESSION['visitor_email'] = $email;
            header("Location: pages/visitor_dashboard.php");
            exit();
        } else {
            $message = '<div class="alert alert-danger">No booking found for this email.</div>';
        }
    } elseif ($role === 'participant') {
        $code = strtoupper(trim($_POST['registration_code'] ?? ''));
        $stmt = $pdo->prepare("SELECT * FROM participants WHERE registration_code = ?");
        $stmt->execute([$code]);
        $participant = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($participant) {
            $_SESSION['role'] = 'participant';
            $_SESSION['registration_code'] = $code;
            header("Location: pages/participant_dashboard.php");
            exit();
        } else {
            $message = '<div class="alert alert-danger">Invalid registration code.</div>';
        }
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}
?>
<div class="container my-5" style="max-width:400px;">
    <h2 class="mb-4">Login</h2>
    <?= $message ?>
    <form method="post" class="bg-white p-4 rounded shadow-sm border">
        <div class="mb-3">
            <label class="form-label">Login as</label>
            <select name="role" class="form-select" required onchange="toggleLoginFields(this.value)">
                <option value="">-- Select --</option>
                <option value="admin">Admin</option>
                <option value="visitor">Visitor</option>
                <option value="participant">Participant</option>
            </select>
        </div>
        <div id="admin-fields" style="display:none;">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
        </div>
        <div id="visitor-fields" style="display:none;">
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control">
            </div>
        </div>
        <div id="participant-fields" style="display:none;">
            <div class="mb-3">
                <label class="form-label">Registration Code</label>
                <input type="text" name="registration_code" class="form-control">
            </div>
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
    <script>
    function toggleLoginFields(role) {
        document.getElementById('admin-fields').style.display = (role === 'admin') ? 'block' : 'none';
        document.getElementById('visitor-fields').style.display = (role === 'visitor') ? 'block' : 'none';
        document.getElementById('participant-fields').style.display = (role === 'participant') ? 'block' : 'none';
    }
    document.querySelector('select[name="role"]').addEventListener('change', function() {
        toggleLoginFields(this.value);
    });
    // On page load
    toggleLoginFields(document.querySelector('select[name="role"]').value);
    </script>
</div>
<?php include __DIR__ . '/includes/footer.php'; ?>
