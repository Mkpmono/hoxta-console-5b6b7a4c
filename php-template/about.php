<?php
$pageTitle = 'About Us';
$pageDescription = 'Learn about Hoxta - premium hosting infrastructure for gamers, developers, and businesses. Our mission, team, and values.';
$currentPage = 'about';
require_once __DIR__.'/partials/head.php';
require_once __DIR__.'/partials/header.php';
?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-bg"></div>
    <div class="container">
        <div class="hero-content">
            <span class="hero-badge">🏢 About Us</span>
            <h1>Building the <span class="gradient-text">Future of Hosting</span></h1>
            <p class="hero-subtitle">Hoxta provides premium hosting infrastructure for gamers, developers, and businesses worldwide.</p>
        </div>
    </div>
</section>

<!-- Our Story -->
<section class="section">
    <div class="container">
        <div class="content-grid">
            <div class="content-text">
                <h2>Our <span class="gradient-text">Story</span></h2>
                <p>Founded by gamers and developers who were frustrated with the limitations of traditional hosting providers, Hoxta was built to be different.</p>
                <p>We believe hosting should be fast, reliable, and simple. No hidden fees. No confusing control panels. No waiting days for support responses.</p>
                <p>Today, Hoxta powers thousands of game servers, websites, and applications across our global network of premium datacenters.</p>
            </div>
            <div class="content-stats">
                <div class="stat-box">
                    <span class="stat-number">50,000+</span>
                    <span class="stat-label">Active Servers</span>
                </div>
                <div class="stat-box">
                    <span class="stat-number">15+</span>
                    <span class="stat-label">Global Locations</span>
                </div>
                <div class="stat-box">
                    <span class="stat-number">99.99%</span>
                    <span class="stat-label">Average Uptime</span>
                </div>
                <div class="stat-box">
                    <span class="stat-number">24/7</span>
                    <span class="stat-label">Expert Support</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Values -->
<section class="section section-dark">
    <div class="container">
        <div class="section-header">
            <h2>Our <span class="gradient-text">Values</span></h2>
            <p>The principles that guide everything we do</p>
        </div>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">⚡</div>
                <h3>Performance First</h3>
                <p>We obsess over speed and reliability. Every decision is made with performance in mind.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🤝</div>
                <h3>Customer Success</h3>
                <p>Your success is our success. We go above and beyond to help you achieve your goals.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🔒</div>
                <h3>Security & Trust</h3>
                <p>We protect your data like it's our own. Enterprise security is standard, not premium.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">💡</div>
                <h3>Innovation</h3>
                <p>We constantly improve our infrastructure and services to stay ahead of the curve.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🌍</div>
                <h3>Global Reach</h3>
                <p>Premium infrastructure in strategic locations worldwide for the best possible experience.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">💬</div>
                <h3>Transparency</h3>
                <p>No hidden fees, no surprises. Clear pricing and honest communication always.</p>
            </div>
        </div>
    </div>
</section>

<!-- Infrastructure -->
<section class="section">
    <div class="container">
        <div class="section-header">
            <h2>Global <span class="gradient-text">Infrastructure</span></h2>
            <p>Tier III+ datacenters strategically located worldwide</p>
        </div>
        <div class="locations-grid">
            <div class="location-card">
                <span class="location-flag">🇺🇸</span>
                <h3>North America</h3>
                <p>New York, Los Angeles, Dallas, Chicago</p>
            </div>
            <div class="location-card">
                <span class="location-flag">🇪🇺</span>
                <h3>Europe</h3>
                <p>Frankfurt, London, Amsterdam, Paris</p>
            </div>
            <div class="location-card">
                <span class="location-flag">🌏</span>
                <h3>Asia Pacific</h3>
                <p>Singapore, Tokyo, Sydney, Mumbai</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content">
            <h2>Ready to Get Started?</h2>
            <p>Join thousands of customers who trust Hoxta for their hosting needs.</p>
            <div class="cta-buttons">
                <a href="pricing.php" class="btn btn-primary btn-lg">View Pricing</a>
                <a href="contact.php" class="btn btn-outline btn-lg">Contact Sales</a>
            </div>
        </div>
    </div>
</section>

<?php
require_once __DIR__.'/partials/footer.php';
require_once __DIR__.'/partials/scripts.php';
?>
