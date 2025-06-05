<?php
// Sanitize input for forms
function sanitizeInput($data) {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

// Password hashing for admin users
function hashPassword($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}

// Password verification for admin users
function verifyPassword($password, $hash) {
    // Accept both plain and hashed passwords for development/testing
    return password_verify($password, $hash) || $password === $hash;
}

// Check if user is logged in as admin
function isAdmin() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}

// Check if user is logged in as participant
function isParticipant() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'participant';
}

// Check if user is logged in as visitor
function isVisitor() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'visitor';
}

// Redirect helper
function redirect($url) {
    header("Location: $url");
    exit();
}

// Generate a unique registration code
function generateRegistrationCode() {
    return strtoupper(substr(md5(uniqid(rand(), true)), 0, 8));
}

// Get the total number of participants
function getTotalParticipants($pdo) {
    $stmt = $pdo->query("SELECT COUNT(*) FROM participants");
    return $stmt->fetchColumn();
}

// Get the total number of visitors
function getTotalVisitors($pdo) {
    $stmt = $pdo->query("SELECT COUNT(*) FROM visitors");
    return $stmt->fetchColumn();
}

// Get participants by category
// $category can be: singing, dancing, dj, band, comedy, magic, theater, other
function getParticipantsByCategory($pdo, $category) {
    $stmt = $pdo->prepare("SELECT name, age, email FROM participants WHERE category = ? ORDER BY age DESC");
    $stmt->execute([$category]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Get all visitors
function getAllVisitors($pdo) {
    $stmt = $pdo->query("SELECT name, email, ticket_count FROM visitors ORDER BY ordered_at DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
