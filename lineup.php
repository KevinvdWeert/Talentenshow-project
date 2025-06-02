<?php
include 'includes/header.php';
include_once 'database/db-connection.php';

// Check if the column 'performance_time' exists in the participants table
$columns = $pdo->query("SHOW COLUMNS FROM participants LIKE 'performance_time'")->fetch();
if (!$columns) {
    echo "<div class='alert alert-danger mt-4'>The column <b>performance_time</b> does not exist in the participants table. Please update your database schema.</div>";
    include 'includes/footer.php';
    exit;
}

// Fetch all participants ordered by performance_time
$stmt = $pdo->query("SELECT name, artist_display_name, age, performance_time FROM participants WHERE performance_time IS NOT NULL ORDER BY performance_time ASC");
$participants = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<link rel="stylesheet" href="/Web/Talentenshow-project/assets/css/style.css">
<script src="assets/js/script.js"></script>
<section class="container my-5">
    <h2 class="mb-4">Festival Line-up</h2>
    <?php if (empty($participants)): ?>
        <p>No artists scheduled yet.</p>
    <?php else: ?>
        <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Artist Name</th>
                    <th>Age</th>
                    <th>Performance Time</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($participants as $i => $row): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= htmlspecialchars($row['artist_display_name']) ?></td>
                    <td><?= (int)$row['age'] ?></td>
                    <td><?= date('H:i', strtotime($row['performance_time'])) ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        </div>
    <?php endif; ?>
</section>
<?php include 'includes/footer.php'; ?>
