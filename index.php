<?php
include 'includes/header.php';
?>

<!-- Hero Section -->
<section class="py-5 text-center bg-light rounded shadow-sm mb-4">
    <h1 class="display-4 fw-bold mb-3">Welcome to the Talent Show 2025!</h1>
    <p class="lead mb-4">Showcase your talent or enjoy an unforgettable evening of performances. Register now or book your tickets!</p>
    <a href="/Web/Talentenshow project/pages/registration.php" class="btn btn-primary btn-lg me-2">Register as Participant</a>
    <a href="/Web/Talentenshow project/pages/booking.php" class="btn btn-success btn-lg">Book Tickets</a>
</section>

<!-- About Section -->
<section class="mb-5">
    <div class="row align-items-center">
        <div class="col-md-6">
            <img src="./assets/img/main-image.jpg" class="img-fluid rounded shadow-sm" alt="Talent Show">
        </div>
        <div class="col-md-6">
            <h2>About the Event</h2>
            <p>
                The Talent Show 2025 brings together the most talented individuals from our community. Whether you sing, dance, perform magic, or have a unique act, this is your stage! Join us for an evening full of excitement, creativity, and inspiration.
            </p>
            <ul>
                <li><strong>Date:</strong> March 15, 2025</li>
                <li><strong>Location:</strong> City Auditorium</li>
                <li><strong>Time:</strong> 18:00 - 22:00</li>
            </ul>
        </div>
    </div>
</section>

<!-- Quick Links Section -->
<section class="mb-5">
    <div class="row text-center">
        <div class="col-md-4 mb-3">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Participants</h5>
                    <p class="card-text">See who is performing this year and get inspired by their talents!</p>
                    <a href="/Web/Talentenshow project/pages/participants.php" class="btn btn-outline-primary">View Participants</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Visitors</h5>
                    <p class="card-text">Find information for visitors, including directions and FAQs.</p>
                    <a href="/Web/Talentenshow project/pages/visitors.php" class="btn btn-outline-primary">Visitor Info</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Admin</h5>
                    <p class="card-text">Admin access for managing registrations and event details.</p>
                    <a href="/Web/Talentenshow project/admin/index.php" class="btn btn-outline-primary">Admin Panel</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Optional: Event Teaser or Schedule -->
<section class="mb-5 text-center">
    <h2>Event Schedule</h2>
    <p>Stay tuned for the full schedule of performances and special guests!</p>
</section>

<?php
include 'includes/footer.php';
?>