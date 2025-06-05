<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ...existing code... -->
</head>
<body>
    <header class="main-header mb-4">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark bg-success rounded shadow-sm">
                <div class="container-fluid">
                    <a class="navbar-brand fw-800" href="../dashboard/index.php">
                        <span class="me-2">🌟</span>Talent Festival Dashboard
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="../dashboard/index.php">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="?logout=1">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="alert alert-success mt-3 mb-0 text-center rounded-3 shadow-sm" role="alert">
                <strong>Welcome!</strong> You are logged in to the Talent Festival Dashboard.
            </div>
        </div>
    </header>
    <main class="container">