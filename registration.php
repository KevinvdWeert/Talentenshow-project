<?php
// Include header, database connection, and utility functions
include './Includes/header.php';
include_once './database/db-connection.php';
include_once './Includes/functions.php';

// Handle participant registration form submission
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = sanitizeInput($_POST['name'] ?? '');
    $address = sanitizeInput($_POST['address'] ?? '');
    $email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
    $category = sanitizeInput($_POST['category'] ?? '');
    $age = intval($_POST['age'] ?? 0);

    // Validate required fields
    if (!$name || !$email || !$category || !$age) {
        $message = '<div class="alert alert-danger">Please fill in all required fields correctly.</div>';
    } else {
        // Generate registration code and insert participant
        $registration_code = strtoupper(substr(md5(uniqid(rand(), true)), 0, 8));
        $stmt = $pdo->prepare("INSERT INTO participants (registration_code, name, address, email, category, age) VALUES (?, ?, ?, ?, ?, ?)");
        if ($stmt->execute([$registration_code, $name, $address, $email, $category, $age])) {
            $message = '<div class="alert alert-success">Registration successful! Your code: <strong>' . $registration_code . '</strong></div>';
        } else {
            $message = '<div class="alert alert-danger">Registration failed. Please try again.</div>';
        }
    }
}
?>
<section class="container my-5">
    <!-- Participant registration form -->
    <h2 class="mb-4">Participant Registration</h2>
    <?php if ($message) echo '<div class="mb-3">'.$message.'</div>'; ?>
    <form method="post" autocomplete="off" class="bg-white p-4 rounded shadow-sm border" style="max-width:500px;margin:auto;">
        <div class="mb-3">
            <label class="form-label">Name*</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Address</label>
            <input type="text" name="address" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Email*</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Category*</label>
            <select name="category" class="form-select" required>
                <option value="">-- Select --</option>
                <option value="singing">Singing</option>
                <option value="dancing">Dancing</option>
                <option value="dj">DJ</option>
                <option value="band">Band</option>
                <option value="comedy">Comedy</option>
                <option value="magic">Magic</option>
                <option value="theater">Theater</option>
                <option value="other">Other</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Age*</label>
            <input type="number" name="age" min="5" max="99" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Register</button>
    </form>
</section>
<?php include './Includes/footer.php'; ?>
