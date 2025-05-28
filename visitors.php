<?php
include 'includes/header.php';
include_once __DIR__ . '/includes/db_connect.php';

$stmt = $pdo->query("SELECT name, email, ticket_count FROM visitors ORDER BY ordered_at DESC");
$visitors = $stmt->fetchAll(PDO::FETCH_ASSOC);
$total = $pdo->query("SELECT COUNT(*) FROM visitors")->fetchColumn();
?>
<link rel="stylesheet" href="/Web/Talentenshow-project/assets/css/style.css">
<script src="/Web/Talentenshow-project/assets/js/main.js"></script>
<section class="container my-5">
    <h2 class="mb-4">Visitors Overview</h2>
    <?php if (count($visitors) === 0): ?>
        <p>No bookings yet.</p>
    <?php else: ?>
        <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <tr><th>Name</th><th>Email</th><th>Tickets</th></tr>
            <?php foreach ($visitors as $v): ?>
                <tr>
                    <td><?= htmlspecialchars($v['name']) ?></td>
                    <td><?= htmlspecialchars($v['email']) ?></td>
                    <td><?= (int)$v['ticket_count'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        </div>
    <?php endif; ?>
    <p class="fw-bold">Total bookings: <?= $total ?></p>
</section>
<?php include 'includes/footer.php'; ?>
