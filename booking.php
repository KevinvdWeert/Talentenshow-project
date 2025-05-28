<?php
session_start();
include 'includes/header.php';
include_once __DIR__ . '/includes/db_connect.php';
include_once __DIR__ . '/includes/functions.php';

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = sanitizeInput($_POST['name'] ?? '');
    $address = sanitizeInput($_POST['address'] ?? '');
    $email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
    $ticket_count = intval($_POST['ticket_count'] ?? 0);

    if (!$name || !$email || $ticket_count < 1) {
        $message = '<div class="alert alert-danger">Please fill in all required fields correctly.</div>';
    } else {
        $stmt = $pdo->prepare("INSERT INTO visitors (name, address, email, ticket_count) VALUES (?, ?, ?, ?)");
        if ($stmt->execute([$name, $address, $email, $ticket_count])) {
            $message = '<div class="alert alert-success">Booking successful! You have reserved ' . $ticket_count . ' ticket(s).</div>';
        } else {
            $message = '<div class="alert alert-danger">Booking failed. Please try again.</div>';
        }
    }
}
?>
<link rel="stylesheet" href="/Web/Talentenshow-project/assets/css/style.css">
<script src="/Web/Talentenshow-project/assets/js/main.js"></script>

<!-- Hero Section -->
<section class="py-5 text-center bg-dark text-white" style="background: url('assets/img/main-image.jpg') center/cover no-repeat;">
    <div class="container py-5" style="background: rgba(0,0,0,0.6); border-radius: 1rem;">
        <h1 class="display-3 fw-bold mb-3">🎉 Talent Festival 2025 🎶</h1>
        <p class="lead mb-4 fs-4">
            Experience the ultimate night of music, dance, and creativity!<br>
            Join as an <span class="fw-bold text-warning">Artist</span>, <span class="fw-bold text-info">DJ</span>, or enjoy as a <span class="fw-bold text-success">Visitor</span>!
        </p>
        <div class="d-flex flex-column flex-md-row justify-content-center gap-3">
            <a href="booking.php" class="btn btn-success btn-lg px-4 shadow">🎟️ Buy Tickets</a>
            <a href="registration.php" class="btn btn-warning btn-lg px-4 shadow">🌟 Register as Artist/DJ</a>
        </div>
    </div>
</section>

<!-- Festival Info Section -->
<section class="container my-5">
    <div class="row align-items-center">
        <div class="col-md-6 mb-4 mb-md-0">
            <h2 class="fw-bold mb-3">About the Festival</h2>
            <ul class="list-group mb-3">
                <li class="list-group-item"><strong>Date:</strong> June 5, 2025</li>
                <li class="list-group-item"><strong>Time:</strong> 19:00 - 02:00</li>
                <li class="list-group-item"><strong>Location:</strong> City Park Festival Grounds, Main Street 123, YourTown</li>
            </ul>
            <p>
                Get ready for an unforgettable evening packed with live performances, DJ sets, food trucks, and a vibrant festival atmosphere. Whether you want to showcase your talent or just party with friends, this is the event you can't miss!
            </p>
        </div>
        <div class="col-md-6 text-center">
            <img src="assets/img/main-image.jpg" alt="Festival Crowd" class="img-fluid rounded shadow-lg" style="max-height:350px;object-fit:cover;">
        </div>
    </div>
</section>

<!-- Call to Action Cards -->
<section class="container mb-5">
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card h-100 border-success shadow">
                <div class="card-body text-center">
                    <h5 class="card-title text-success">Buy Tickets</h5>
                    <p class="card-text">Secure your spot and join the crowd for a night of music, dance, and fun. Limited tickets available!</p>
                    <a href="booking.php" class="btn btn-success">Get Tickets</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 border-warning shadow">
                <div class="card-body text-center">
                    <h5 class="card-title text-warning">Register as Artist/DJ</h5>
                    <p class="card-text">Showcase your talent on stage! Singers, bands, dancers, DJs, and all performers welcome.</p>
                    <a href="registration.php" class="btn btn-warning text-white">Register Now</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 border-primary shadow">
                <div class="card-body text-center">
                    <h5 class="card-title text-primary">Line-up & Info</h5>
                    <p class="card-text">Curious who's performing? Check out the line-up and get all the info you need for the festival.</p>
                    <a href="participants.php" class="btn btn-primary">View Line-up</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Festival Features -->
<section class="container mb-5">
    <div class="row text-center">
        <div class="col-md-3 mb-3">
            <div class="p-4 bg-light rounded shadow-sm h-100">
                <span class="fs-1 text-warning">🎤</span>
                <h6 class="mt-2">Live Performances</h6>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="p-4 bg-light rounded shadow-sm h-100">
                <span class="fs-1 text-info">🎧</span>
                <h6 class="mt-2">DJ Sets</h6>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="p-4 bg-light rounded shadow-sm h-100">
                <span class="fs-1 text-success">🍔</span>
                <h6 class="mt-2">Food Trucks</h6>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="p-4 bg-light rounded shadow-sm h-100">
                <span class="fs-1 text-danger">🎆</span>
                <h6 class="mt-2">Afterparty</h6>
            </div>
        </div>
    </div>
</section>

<!-- Booking Section -->
<section class="container my-5">
    <h2 class="mb-4">Book Your Tickets</h2>
    <?php if ($message) echo '<div class="mb-3">'.$message.'</div>'; ?>
    <form method="post" autocomplete="off" class="bg-white p-4 rounded shadow-sm border" style="max-width:500px;margin:auto;">
        <div class="mb-3">
            <label class="form-label">Name*</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Address</label>
            <input type="text" name="address" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Email*</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Number of Tickets*</label>
            <input type="number" name="ticket_count" min="1" max="10" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Book Tickets</button>
    </form>
</section>

<?php include 'includes/footer.php'; ?>