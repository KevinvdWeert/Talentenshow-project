<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Talent Festival Dashboard | Welcome</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/Web/Talentenshow-project/assets/css/style.css">
    <link rel="icon" type="image/png" href="/Web/Talentenshow-project/assets/img/show-icon.jpg">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <header class="main-header mb-4">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark bg-success rounded shadow-sm">
                <div class="container-fluid">
                    <a class="navbar-brand fw-800" href="dashboard/index.php">
                        <span class="me-2">🌟</span>Talent Festival Dashboard
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="login.php?logout=1">Logout</a>
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
