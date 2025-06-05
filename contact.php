<?php
include 'Includes/header.php';
?>

<section class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="mb-4 text-center">📬 Contact Us</h2>
            
            <!-- Contact Form -->
            <form action="contact.php" method="POST" class="p-4 border rounded bg-light shadow">
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" name="name" id="name" class="form-control" required placeholder="Your full name">
                </div>

                  <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" name="email" id="email" class="form-control" required placeholder="your@email.com">
                </div>

                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea name="message" id="message" rows="5" class="form-control" required placeholder="Type your message here..."></textarea>
                </div>

                <div class="d-grid">
                    <button type="submit" name="submit" class="btn btn-primary">Send Message</button>
                </div>
            </form>

            <!-- Optional PHP Form Handler -->
            <?php
            if (isset($_POST['submit'])) {
                $name = htmlspecialchars($_POST['name']);
                $email = htmlspecialchars($_POST['email']);
                $message = htmlspecialchars($_POST['message']);

                $to = 'your-email@example.com'; // Replace with your email address
                $subject = 'New Contact Form Submission';
                $body = "Name: $name\nEmail: $email\nMessage:\n$message";
                $headers = "From: $email\r\n";
                $headers .= "Reply-To: $email\r\n";

                if (mail($to, $subject, $body, $headers)) {
                    echo "<div class='alert alert-success mt-4'>Thanks, <strong>$name</strong>! We received your message.</div>";
                } else {
                    echo "<div class='alert alert-danger mt-4'>Sorry, there was an error sending your message. Please try again later.</div>";
                }
            }
            ?>
        </div>
    </div>
</section>

<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "ContactPage",
    "name": "Contact Talent Show 2025",
    "description": "Contact the Talent Show 2025 team for inquiries, registration, and ticket information.",
    "url": "https://yourdomain.com/contact.php",
    "potentialAction": {
        "@type": "CommunicateAction",
        "name": "Contact Us",
        "target": {
            "@type": "EntryPoint",
            "urlTemplate": "https://yourdomain.com/contact.php",
            "actionPlatform": [
                "http://schema.org/DesktopWebPlatform",
                "http://schema.org/MobileWebPlatform"
            ],
            "httpMethod": "POST"
        }
    }
}
</script>

<?php include 'Includes/footer.php'; ?>
