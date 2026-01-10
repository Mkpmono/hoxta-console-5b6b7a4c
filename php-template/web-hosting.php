<?php
$pageTitle = 'Premium Web Hosting';
$pageDescription = 'Lightning-fast SSD web hosting with 99.9% uptime guarantee. cPanel included, free SSL, and 24/7 expert support.';
$currentPage = 'web-hosting';
require_once __DIR__.'/partials/head.php';
require_once __DIR__.'/partials/header.php';
?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-bg"></div>
    <div class="container">
        <div class="hero-content">
            <span class="hero-badge">🚀 Web Hosting</span>
            <h1>Premium <span class="gradient-text">Web Hosting</span></h1>
            <p class="hero-subtitle">Lightning-fast SSD hosting with cPanel, free SSL certificates, and enterprise-grade security. Perfect for websites of all sizes.</p>
            <div class="hero-buttons">
                <a href="https://api.hoxta.com/cart.php?a=add&pid=web" class="btn btn-primary btn-lg">Get Started</a>
                <a href="#plans" class="btn btn-outline btn-lg">View Plans</a>
            </div>
        </div>
    </div>
</section>

<!-- Trust Bar -->
<section class="trust-bar">
    <div class="container">
        <div class="trust-items">
            <div class="trust-item">
                <span class="trust-icon">⚡</span>
                <span>99.9% Uptime</span>
            </div>
            <div class="trust-item">
                <span class="trust-icon">🔒</span>
                <span>Free SSL</span>
            </div>
            <div class="trust-item">
                <span class="trust-icon">💾</span>
                <span>NVMe SSD</span>
            </div>
            <div class="trust-item">
                <span class="trust-icon">🛡️</span>
                <span>DDoS Protection</span>
            </div>
            <div class="trust-item">
                <span class="trust-icon">🎧</span>
                <span>24/7 Support</span>
            </div>
        </div>
    </div>
</section>

<!-- Pricing Plans -->
<section id="plans" class="section">
    <div class="container">
        <div class="section-header">
            <h2>Web Hosting <span class="gradient-text">Plans</span></h2>
            <p>Choose the perfect plan for your website</p>
        </div>
        <div class="pricing-grid">
            <div class="pricing-card">
                <div class="pricing-header">
                    <h3>Starter</h3>
                    <div class="price">
                        <span class="currency">$</span>
                        <span class="amount">2.99</span>
                        <span class="period">/mo</span>
                    </div>
                </div>
                <ul class="pricing-features">
                    <li><span class="check">✓</span> 10 GB NVMe Storage</li>
                    <li><span class="check">✓</span> 1 Website</li>
                    <li><span class="check">✓</span> Free SSL Certificate</li>
                    <li><span class="check">✓</span> 100 GB Bandwidth</li>
                    <li><span class="check">✓</span> 5 Email Accounts</li>
                    <li><span class="check">✓</span> cPanel Access</li>
                </ul>
                <a href="https://api.hoxta.com/cart.php?a=add&pid=web-starter" class="btn btn-outline btn-block">Order Now</a>
            </div>
            <div class="pricing-card popular">
                <div class="popular-badge">Most Popular</div>
                <div class="pricing-header">
                    <h3>Professional</h3>
                    <div class="price">
                        <span class="currency">$</span>
                        <span class="amount">7.99</span>
                        <span class="period">/mo</span>
                    </div>
                </div>
                <ul class="pricing-features">
                    <li><span class="check">✓</span> 50 GB NVMe Storage</li>
                    <li><span class="check">✓</span> Unlimited Websites</li>
                    <li><span class="check">✓</span> Free SSL Certificate</li>
                    <li><span class="check">✓</span> Unlimited Bandwidth</li>
                    <li><span class="check">✓</span> Unlimited Email</li>
                    <li><span class="check">✓</span> cPanel + Softaculous</li>
                    <li><span class="check">✓</span> Daily Backups</li>
                </ul>
                <a href="https://api.hoxta.com/cart.php?a=add&pid=web-pro" class="btn btn-primary btn-block">Order Now</a>
            </div>
            <div class="pricing-card">
                <div class="pricing-header">
                    <h3>Business</h3>
                    <div class="price">
                        <span class="currency">$</span>
                        <span class="amount">14.99</span>
                        <span class="period">/mo</span>
                    </div>
                </div>
                <ul class="pricing-features">
                    <li><span class="check">✓</span> 100 GB NVMe Storage</li>
                    <li><span class="check">✓</span> Unlimited Websites</li>
                    <li><span class="check">✓</span> Free SSL + Dedicated IP</li>
                    <li><span class="check">✓</span> Unlimited Everything</li>
                    <li><span class="check">✓</span> Priority Support</li>
                    <li><span class="check">✓</span> Staging Environment</li>
                    <li><span class="check">✓</span> Advanced Security</li>
                </ul>
                <a href="https://api.hoxta.com/cart.php?a=add&pid=web-business" class="btn btn-outline btn-block">Order Now</a>
            </div>
        </div>
    </div>
</section>

<!-- Features Grid -->
<section class="section section-dark">
    <div class="container">
        <div class="section-header">
            <h2>Why Choose <span class="gradient-text">Hoxta</span> Web Hosting?</h2>
            <p>Enterprise features at affordable prices</p>
        </div>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">⚡</div>
                <h3>Lightning Fast</h3>
                <p>NVMe SSD storage and LiteSpeed web servers deliver blazing-fast page loads.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🔒</div>
                <h3>Free SSL Certificates</h3>
                <p>Automatic Let's Encrypt SSL for all your domains. HTTPS made easy.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🛡️</div>
                <h3>DDoS Protection</h3>
                <p>Enterprise-grade protection keeps your site online during attacks.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">💾</div>
                <h3>Daily Backups</h3>
                <p>Automatic daily backups with one-click restore. Never lose your data.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🎛️</div>
                <h3>cPanel Control</h3>
                <p>Industry-standard control panel for easy website management.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🎧</div>
                <h3>24/7 Expert Support</h3>
                <p>Our hosting experts are available around the clock to help you.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content">
            <h2>Ready to Get Started?</h2>
            <p>Join thousands of satisfied customers with our premium web hosting.</p>
            <a href="https://api.hoxta.com/cart.php?a=add&pid=web" class="btn btn-primary btn-lg">Start Hosting Today</a>
        </div>
    </div>
</section>

<?php
require_once __DIR__.'/partials/footer.php';
require_once __DIR__.'/partials/scripts.php';
?>
