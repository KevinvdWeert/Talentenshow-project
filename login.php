<?php
// Enable error reporting for debugging (remove or comment out in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Start session and include dependencies
session_start();
include_once './database/db-connection.php';
include_once './Includes/functions.php';

// Initialize message and get selected role
$message = '';
$role = $_POST['role'] ?? '';

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($role === 'admin') {
        // Admin login logic
        $username = sanitizeInput($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && verifyPassword($password, $user['password'])) {
            $_SESSION['role'] = 'admin';
            $_SESSION['admin'] = $username;
            header("Location: admin_dashboard.php");
            exit();
        } else {
            $message = '<div class="alert alert-danger">Invalid admin credentials.</div>';
        }
    } elseif ($role === 'visitor') {
        // Visitor login logic
        $email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
        $stmt = $pdo->prepare("SELECT * FROM visitors WHERE email = ?");
        $stmt->execute([$email]);
        $visitor = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($visitor) {
            $_SESSION['role'] = 'visitor';
            $_SESSION['visitor_email'] = $email;
            header("Location: visitor_dashboard.php");
            exit();
        } else {
            $message = '<div class="alert alert-danger">No booking found for this email.</div>';
        }
    } elseif ($role === 'participant') {
        // Participant login logic
        $code = strtoupper(trim($_POST['registration_code'] ?? ''));
        $stmt = $pdo->prepare("SELECT * FROM participants WHERE registration_code = ?");
        $stmt->execute([$code]);
        $participant = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($participant) {
            $_SESSION['role'] = 'participant';
            $_SESSION['registration_code'] = $code;
            header("Location: participant_dashboard.php");
            exit();
        } else {
            $message = '<div class="alert alert-danger">Invalid registration code.</div>';
        }
    }
}

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}

// Include header after all header() calls
include './Includes/header.php';
?>
<div class="container my-5" style="max-width:400px;">
    <!-- Login form for admin, visitor, and participant -->
    <h2 class="mb-4 text-primary">Login</h2>
    <?= $message ?>
    <form method="post" class="bg-white p-4 rounded shadow-sm border">
        <div class="mb-3">
            <label class="form-label text-primary">Login as</label>
            <select name="role" class="form-select text-primary border-primary" required onchange="toggleLoginFields(this.value)">
                <option value="">-- Select --</option>
                <option value="admin">Admin</option>
                <option value="visitor">Visitor</option>
                <option value="participant">Participant</option>
            </select>
        </div>
        <div id="admin-fields" style="display:none;">
            <div class="mb-3">
                <label class="form-label text-primary">Username</label>
                <input type="text" name="username" class="form-control text-primary border-primary">
            </div>
            <div class="mb-3">
                <label class="form-label text-primary">Password</label>
                <input type="password" name="password" class="form-control text-primary border-primary">
            </div>
        </div>
        <div id="visitor-fields" style="display:none;">
            <div class="mb-3">
                <label class="form-label text-primary">Email</label>
                <input type="email" name="email" class="form-control text-primary border-primary">
            </div>
        </div>
        <div id="participant-fields" style="display:none;">
            <div class="mb-3">
                <label class="form-label text-primary">Registration Code</label>
                <input type="text" name="registration_code" class="form-control text-primary border-primary">
            </div>
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
    <script>
    // Toggle login fields based on selected role
    function toggleLoginFields(role) {
        document.getElementById('admin-fields').style.display = (role === 'admin') ? 'block' : 'none';
        document.getElementById('visitor-fields').style.display = (role === 'visitor') ? 'block' : 'none';
        document.getElementById('participant-fields').style.display = (role === 'participant') ? 'block' : 'none';
    }
    document.querySelector('select[name="role"]').addEventListener('change', function() {
        toggleLoginFields(this.value);
    });
    // On page load, show correct fields
    toggleLoginFields(document.querySelector('select[name="role"]').value);
    </script>
</div>
<?php include './Includes/footer.php'; ?>
