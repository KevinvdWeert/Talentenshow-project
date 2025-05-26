<?php
include '../includes/header.php';
include_once __DIR__ . '/../includes/db_connect.php';
include_once __DIR__ . '/../includes/functions.php';

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = sanitizeInput($_POST['name'] ?? '');
    $address = sanitizeInput($_POST['address'] ?? '');
    $email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
    $category = sanitizeInput($_POST['category'] ?? '');
    $age = intval($_POST['age'] ?? 0);

    if (!$name || !$email || !$category || !$age) {
        $message = '<div class="error">Please fill in all required fields correctly.</div>';
    } else {
        // Generate unique registration code
        $registration_code = strtoupper(substr(md5(uniqid(rand(), true)), 0, 8));
        $stmt = $pdo->prepare("INSERT INTO participants (registration_code, name, address, email, category, age) VALUES (?, ?, ?, ?, ?, ?)");
        if ($stmt->execute([$registration_code, $name, $address, $email, $category, $age])) {
            $message = '<div class="success">Registration successful! Your code: <strong>' . $registration_code . '</strong></div>';
        } else {
            $message = '<div class="error">Registration failed. Please try again.</div>';
        }
    }
}
?>
<section>
    <h2 class="mb-4">Participant Registration</h2>
    <?php if ($message) echo '<div class="mb-3">'.$message.'</div>'; ?>
    <form method="post" autocomplete="off" class="bg-white p-4 rounded shadow-sm">
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
                <option value="other">Other</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Age*</label>
            <input type="number" name="age" min="5" max="99" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</section>
<?php include '../includes/footer.php'; ?>
