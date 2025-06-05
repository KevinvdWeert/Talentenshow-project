<?php
include 'Includes/header.php';
?>
<section class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="mb-4 text-center">📬 Contact Us</h2>
            
            <!-- Contact Form (Formspree) -->
            <form
                action="https://formspree.io/f/mdkzkyjl"
                method="POST"
                class="p-4 border rounded bg-light shadow"
            >
                <div class="mb-3">
                    <label for="email" class="form-label">Your Email</label>
                    <input type="email" name="email" id="email" class="form-control" required placeholder="your@email.com">
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Your Message</label>
                    <textarea name="message" id="message" rows="5" class="form-control" required placeholder="Type your message here..."></textarea>
                </div>
                <!-- You can add other form fields here if needed -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </form>
            <!-- End Formspree Form -->

            <!-- Removed PHP form handler, as Formspree handles submissions -->
        </div>
    </div>
</section>
<?php include 'Includes/footer.php'; ?>