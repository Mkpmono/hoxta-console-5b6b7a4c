<?php
$pageTitle = 'Contact Us';
$pageDescription = 'Get in touch with Hoxta support and sales. 24/7 expert assistance for all your hosting needs.';
$currentPage = 'contact';
require_once __DIR__.'/partials/head.php';
require_once __DIR__.'/partials/header.php';
?>

<!-- Hero Section -->
<section class="hero-section hero-compact">
    <div class="hero-bg"></div>
    <div class="container">
        <div class="hero-content">
            <h1>Contact <span class="gradient-text">Us</span></h1>
            <p class="hero-subtitle">We're here to help. Reach out to our team 24/7.</p>
        </div>
    </div>
</section>

<!-- Contact Options -->
<section class="section">
    <div class="container">
        <div class="contact-grid">
            <div class="contact-card">
                <span class="contact-icon">🎫</span>
                <h3>Support Ticket</h3>
                <p>Technical issues? Open a ticket and our experts will help you.</p>
                <a href="https://api.hoxta.com/submitticket.php" class="btn btn-outline">Open Ticket</a>
            </div>
            <div class="contact-card">
                <span class="contact-icon">💬</span>
                <h3>Live Chat</h3>
                <p>Need quick help? Chat with our team in real-time.</p>
                <button class="btn btn-primary" onclick="openChat()">Start Chat</button>
            </div>
            <div class="contact-card">
                <span class="contact-icon">💼</span>
                <h3>Sales Inquiry</h3>
                <p>Custom solutions or enterprise pricing? Let's talk.</p>
                <a href="mailto:sales@hoxta.com" class="btn btn-outline">Email Sales</a>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form -->
<section class="section section-dark">
    <div class="container">
        <div class="contact-form-container">
            <div class="form-header">
                <h2>Send Us a <span class="gradient-text">Message</span></h2>
                <p>Fill out the form below and we'll get back to you within 24 hours.</p>
            </div>
            <form class="contact-form" action="https://api.hoxta.com/submitticket.php" method="POST">
                <div class="form-row">
                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <select id="subject" name="subject" required>
                        <option value="">Select a topic</option>
                        <option value="sales">Sales Inquiry</option>
                        <option value="support">Technical Support</option>
                        <option value="billing">Billing Question</option>
                        <option value="partnership">Partnership</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="6" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-lg">Send Message</button>
            </form>
        </div>
    </div>
</section>

<!-- Additional Info -->
<section class="section">
    <div class="container">
        <div class="info-grid">
            <div class="info-card">
                <h3>📧 Email</h3>
                <p>General: <a href="mailto:info@hoxta.com">info@hoxta.com</a></p>
                <p>Support: <a href="mailto:support@hoxta.com">support@hoxta.com</a></p>
                <p>Sales: <a href="mailto:sales@hoxta.com">sales@hoxta.com</a></p>
            </div>
            <div class="info-card">
                <h3>⏰ Support Hours</h3>
                <p>Technical Support: 24/7/365</p>
                <p>Sales: Mon-Fri 9AM-6PM EST</p>
                <p>Billing: Mon-Fri 9AM-6PM EST</p>
            </div>
            <div class="info-card">
                <h3>🌐 Connect</h3>
                <p><a href="#">Discord Community</a></p>
                <p><a href="#">Twitter / X</a></p>
                <p><a href="#">Status Page</a></p>
            </div>
        </div>
    </div>
</section>

<script>
function openChat() {
    // Placeholder for live chat integration
    alert('Live chat coming soon! Please use the support ticket system for now.');
}
</script>

<?php
require_once __DIR__.'/partials/footer.php';
require_once __DIR__.'/partials/scripts.php';
?>
