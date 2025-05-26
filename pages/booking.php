<?php
include '../includes/header.php';
include_once __DIR__ . '/../includes/db_connect.php';
include_once __DIR__ . '/../includes/functions.php';

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = sanitizeInput($_POST['name'] ?? '');
    $address = sanitizeInput($_POST['address'] ?? '');
    $email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
    $ticket_count = intval($_POST['ticket_count'] ?? 0);

    if (!$name || !$email || $ticket_count < 1) {
        $message = '<div class="error">Please fill in all required fields correctly.</div>';
    } else {
        $stmt = $pdo->prepare("INSERT INTO visitors (name, address, email, ticket_count) VALUES (?, ?, ?, ?)");
        if ($stmt->execute([$name, $address, $email, $ticket_count])) {
            $message = '<div class="success">Booking successful! You have reserved ' . $ticket_count . ' ticket(s).</div>';
        } else {
            $message = '<div class="error">Booking failed. Please try again.</div>';
        }
    }
}
?>
<section>
    <h2>Book Your Tickets</h2>
    <?php echo $message; ?>
    <form method="post" autocomplete="off">
        <label>Name*</label>
        <input type="text" name="name" required>
        <label>Address</label>
        <input type="text" name="address">
        <label>Email*</label>
        <input type="email" name="email" required>
        <label>Number of Tickets*</label>
        <input type="number" name="ticket_count" min="1" max="10" required>
        <input type="submit" value="Book Tickets">
    </form>
</section>
