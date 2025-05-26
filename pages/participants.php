<?php
include '../includes/header.php';
include_once __DIR__ . '/../includes/db_connect.php';

function getParticipantsByCategory($pdo, $category) {
    $stmt = $pdo->prepare("SELECT name, age, email FROM participants WHERE category = ? ORDER BY age DESC");
    $stmt->execute([$category]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$categories = ['singing', 'dancing', 'other'];
?>
<section>
    <h2>Participants Overview</h2>
    <?php
    foreach ($categories as $cat) {
        $list = getParticipantsByCategory($pdo, $cat);
        echo "<h3>" . ucfirst($cat) . "</h3>";
        if (count($list) === 0) {
            echo "<p>No participants yet.</p>";
        } else {
            echo "<table><tr><th>Name</th><th>Age</th><th>Email</th></tr>";
            foreach ($list as $row) {
                $minor = ($row['age'] < 18) ? ' style="background:#ffe5e5;"' : '';
                echo "<tr$minor><td>{$row['name']}</td><td>{$row['age']}</td><td>{$row['email']}</td></tr>";
            }
            echo "</table>";
        }
    }
    $total = $pdo->query("SELECT COUNT(*) FROM participants")->fetchColumn();
    echo "<p><strong>Total participants:</strong> $total</p>";
    ?>
</section>
