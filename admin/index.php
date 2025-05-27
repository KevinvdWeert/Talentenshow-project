<?php
session_start();
include '../includes/header.php';
include_once __DIR__ . '/../includes/db_connect.php';
include_once __DIR__ . '/../includes/functions.php';

// Admin dashboard content (no login form)
?>
<div class="container my-5">
    <h1 class="mb-4">Admin Dashboard</h1>
    <div class="row mb-4">
        <div class="col-md-6 col-lg-4 mb-3">
            <div class="card h-100 shadow-sm border-primary">
                <div class="card-body">
                    <h5 class="card-title">Participants Overview</h5>
                    <p class="card-text">View and manage all registered participants.</p>
                    <a href="/Web/Talentenshow project/pages/participants.php" class="btn btn-primary">Go to Participants</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-3">
            <div class="card h-100 shadow-sm border-success">
                <div class="card-body">
                    <h5 class="card-title">Visitors Overview</h5>
                    <p class="card-text">See all ticket bookings and visitor details.</p>
                    <a href="/Web/Talentenshow project/pages/visitors.php" class="btn btn-success">Go to Visitors</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-3">
            <div class="card h-100 shadow-sm border-info">
                <div class="card-body">
                    <h5 class="card-title">Manage Registrations</h5>
                    <p class="card-text">Approve, edit, or remove participant registrations.</p>
                    <a href="/Web/Talentenshow project/pages/registrations.php" class="btn btn-info text-white">Manage Registrations</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-3">
            <div class="card h-100 shadow-sm border-warning">
                <div class="card-body">
                    <h5 class="card-title">Manage Bookings</h5>
                    <p class="card-text">View and manage ticket bookings.</p>
                    <a href="/Web/Talentenshow project/pages/bookings.php" class="btn btn-warning text-white">Manage Bookings</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-3">
            <div class="card h-100 shadow-sm border-secondary">
                <div class="card-body">
                    <h5 class="card-title">Settings</h5>
                    <p class="card-text">Update event settings and admin options.</p>
                    <a href="/Web/Talentenshow project/pages/settings.php" class="btn btn-secondary">Settings</a>
                </div>
            </div>
        </div>
    </div>
    <div class="alert alert-info mt-4">
        <strong>Tip:</strong> Use the dashboard to manage all aspects of the Talent Show 2025. For security, make sure to log out when finished.
    </div>
</div>
<?php include '../includes/footer.php'; ?>