<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Talent Show 2025 | The Ultimate Talent Competition Event</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/Web/Talentenshow-project/assets/css/style.css">
    <link rel="icon" type="image/png" href="/Web/Talentenshow-project/assets/img/show-icon.jpg">
</head>
<body>
    <header class="main-header mb-4">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary rounded shadow-sm">
                <div class="container-fluid">
                    <a class="navbar-brand fw-bold" href="index.php">
                        <span class="me-2">🎤</span>Talent Show 2025
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="registration.php">Register</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="booking.php">Tickets</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="participants.php">Participants</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="visitors.php">Visitors</a>
                            </li>
                            <?php if (isset($_SESSION['role'])): ?>
                                <?php if ($_SESSION['role'] === 'admin'): ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="dashboard/index.php">Dashboard</a>
                                    </li>
                                <?php elseif ($_SESSION['role'] === 'visitor'): ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="dashboard/visitor_dashboard.php">Dashboard</a>
                                    </li>
                                <?php elseif ($_SESSION['role'] === 'participant'): ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="dashboard/participant_dashboard.php">Dashboard</a>
                                    </li>
                                <?php endif; ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="login.php?logout=1">Logout</a>
                                </li>
                            <?php else: ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="login.php">Login</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="alert alert-info mt-3 mb-0 text-center rounded-3 shadow-sm" role="alert">
                <strong>🎉 Tickets now available!</strong> Register as a participant or book your seats for the Talent Show 2025.
            </div>
        </div>
    </header>
    <main class="container">
