<?php
include '../includes/header.php';
include_once __DIR__ . '/../includes/db_connect.php';

// Visitors overview page (Admin)
// Check if admin is logged in

$stmt = $pdo->query("SELECT name, email, ticket_count FROM visitors ORDER BY ordered_at DESC");
$visitors = $stmt->fetchAll(PDO::FETCH_ASSOC);
$total = $pdo->query("SELECT COUNT(*) FROM visitors")->fetchColumn();
?>
<section>
    <h2>Visitors Overview</h2>
    <?php if (count($visitors) === 0): ?>
        <p>No bookings yet.</p>
    <?php else: ?>
        <table>
            <tr><th>Name</th><th>Email</th><th>Tickets</th></tr>
            <?php foreach ($visitors as $v): ?>
                <tr>
                    <td><?= htmlspecialchars($v['name']) ?></td>
                    <td><?= htmlspecialchars($v['email']) ?></td>
                    <td><?= (int)$v['ticket_count'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    <p><strong>Total bookings:</strong> <?= $total ?></p>
</section>
