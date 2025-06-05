<?php
// Include header and database connection
include './Includes/header.php';
include_once './database/db-connection.php';

// Check if the column 'performance_time' exists in the participants table
$columns = $pdo->query("SHOW COLUMNS FROM participants LIKE 'performance_time'")->fetch();
if (!$columns) {
    echo "<div class='alert alert-danger mt-4'>The column <b>performance_time</b> does not exist in the participants table. Please update your database schema.</div>";
    include './Includes/footer.php';
    exit;
}

// Fetch all participants, order by performance_time if set, else by name
$stmt = $pdo->query("SELECT name, category, age, performance_time FROM participants ORDER BY 
    CASE WHEN performance_time IS NULL THEN 1 ELSE 0 END, performance_time ASC, name ASC");
$participants = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<section class="container my-5">
    <!-- Festival line-up table -->
    <h2 class="mb-4">Festival Line-up</h2>
    <?php if (empty($participants)): ?>
        <p>No artists registered yet.</p>
    <?php else: ?>
        <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Age</th>
                    <th>Performance Time</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($participants as $i => $row): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= htmlspecialchars($row['category']) ?></td>
                    <td><?= (int)$row['age'] ?></td>
                    <td>
                        <?php
                        if ($row['performance_time']) {
                            echo date('H:i', strtotime($row['performance_time']));
                        } else {
                            echo '<span class="text-muted">TBA</span>';
                        }
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        </div>
    <?php endif; ?>
</section>
<?php include './Includes/footer.php'; ?>
