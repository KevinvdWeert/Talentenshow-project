<?php
// Start session and include dependencies
session_start();
include 'Includes/header.php';
include_once 'database/db-connection.php';
include_once 'Includes/functions.php';

// Handle form submission for ticket booking
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = sanitizeInput($_POST['name'] ?? '');
    $address = sanitizeInput($_POST['address'] ?? '');
    $email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
    $ticket_count = intval($_POST['ticket_count'] ?? 0);

    // Validate input fields
    if (!$name || !$email || $ticket_count < 1) {
        $message = '<div class="alert alert-danger">Please fill in all required fields correctly.</div>';
    } else {
        // Insert booking into database
        $stmt = $pdo->prepare("INSERT INTO visitors (name, address, email, ticket_count) VALUES (?, ?, ?, ?)");
        if ($stmt->execute([$name, $address, $email, $ticket_count])) {
            $message = '<div class="alert alert-success">Booking successful! You have reserved ' . $ticket_count . ' ticket(s).</div>';
        } else {
            $message = '<div class="alert alert-danger">Booking failed. Please try again.</div>';
        }
    }
}
?>
<section class="container my-5">
    <!-- Ticket booking form -->
    <h2 class="mb-4">Book Your Tickets</h2>
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
            <label class="form-label">Number of Tickets*</label>
            <input type="number" name="ticket_count" min="1" max="10" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Book Tickets</button>
    </form>
</section>

<?php include 'Includes/footer.php'; ?>