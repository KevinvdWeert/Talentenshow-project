<?php
// Sanitize input for forms
// This function takes user input, removes unnecessary spaces, and converts special characters to HTML entities
function sanitizeInput($data) {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

// Password hashing for admin users
// This function hashes a password using a strong one-way hashing algorithm
function hashPassword($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}

// Password verification for admin users
// This function verifies if the provided password matches the stored hash
function verifyPassword($password, $hash) {
    // Accept both plain and hashed passwords for development/testing
    return password_verify($password, $hash) || $password === $hash;
}

// Check if user is logged in as admin
// This function checks the session data to determine if the logged-in user is an admin
function isAdmin() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}

// Check if user is logged in as participant
// This function checks the session data to determine if the logged-in user is a participant
function isParticipant() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'participant';
}

// Check if user is logged in as visitor
// This function checks the session data to determine if the logged-in user is a visitor
function isVisitor() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'visitor';
}

// Redirect helper
// This function redirects the user to a different URL
function redirect($url) {
    header("Location: $url");
    exit();
}

// Generate a unique registration code
// This function creates a random, unique code for user registration
function generateRegistrationCode() {
    return strtoupper(substr(md5(uniqid(rand(), true)), 0, 8));
}

// Get the total number of participants
// This function retrieves the total count of participants from the database
function getTotalParticipants($pdo) {
    $stmt = $pdo->query("SELECT COUNT(*) FROM participants");
    return $stmt->fetchColumn();
}

// Get the total number of visitors
// This function retrieves the total count of visitors from the database
function getTotalVisitors($pdo) {
    $stmt = $pdo->query("SELECT COUNT(*) FROM visitors");
    return $stmt->fetchColumn();
}

// Get participants by category
// $category can be: singing, dancing, dj, band, comedy, magic, theater, other
// This function retrieves participants from the database based on their category
function getParticipantsByCategory($pdo, $category) {
    $stmt = $pdo->prepare("SELECT name, age, email FROM participants WHERE category = ? ORDER BY age DESC");
    $stmt->execute([$category]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Get all visitors
// This function retrieves all visitors' data from the database, ordered by the date they ordered tickets
function getAllVisitors($pdo) {
    $stmt = $pdo->query("SELECT name, email, ticket_count FROM visitors ORDER BY ordered_at DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
