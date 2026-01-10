<?php
$pageTitle = 'VPS Hosting';
$pageDescription = 'High-performance VPS hosting with full root access, NVMe storage, and instant deployment. Scale from 2GB to 32GB RAM.';
$currentPage = 'vps-hosting';
require_once __DIR__.'/partials/head.php';
require_once __DIR__.'/partials/header.php';
?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-bg"></div>
    <div class="container">
        <div class="hero-content">
            <span class="hero-badge">🖥️ VPS Hosting</span>
            <h1>Cloud <span class="gradient-text">VPS Hosting</span></h1>
            <p class="hero-subtitle">Enterprise-grade virtual private servers with dedicated resources, full root access, and instant deployment. Perfect for developers and businesses.</p>
            <div class="hero-buttons">
                <a href="https://api.hoxta.com/cart.php?a=add&pid=vps" class="btn btn-primary btn-lg">Deploy VPS</a>
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
                <span>Instant Deploy</span>
            </div>
            <div class="trust-item">
                <span class="trust-icon">💾</span>
                <span>NVMe SSD</span>
            </div>
            <div class="trust-item">
                <span class="trust-icon">🔐</span>
                <span>Full Root Access</span>
            </div>
            <div class="trust-item">
                <span class="trust-icon">🛡️</span>
                <span>DDoS Protected</span>
            </div>
            <div class="trust-item">
                <span class="trust-icon">🌍</span>
                <span>Global Locations</span>
            </div>
        </div>
    </div>
</section>

<!-- Pricing Plans -->
<section id="plans" class="section">
    <div class="container">
        <div class="section-header">
            <h2>VPS <span class="gradient-text">Plans</span></h2>
            <p>Dedicated resources for demanding applications</p>
        </div>
        <div class="pricing-grid pricing-grid-4">
            <div class="pricing-card">
                <div class="pricing-header">
                    <h3>VPS 2G</h3>
                    <div class="price">
                        <span class="currency">$</span>
                        <span class="amount">9.99</span>
                        <span class="period">/mo</span>
                    </div>
                </div>
                <ul class="pricing-features">
                    <li><span class="check">✓</span> 2 vCPU Cores</li>
                    <li><span class="check">✓</span> 2 GB RAM</li>
                    <li><span class="check">✓</span> 40 GB NVMe</li>
                    <li><span class="check">✓</span> 2 TB Bandwidth</li>
                    <li><span class="check">✓</span> 1 IPv4 Address</li>
                    <li><span class="check">✓</span> Full Root Access</li>
                </ul>
                <a href="https://api.hoxta.com/cart.php?a=add&pid=vps-2g" class="btn btn-outline btn-block">Deploy Now</a>
            </div>
            <div class="pricing-card">
                <div class="pricing-header">
                    <h3>VPS 4G</h3>
                    <div class="price">
                        <span class="currency">$</span>
                        <span class="amount">19.99</span>
                        <span class="period">/mo</span>
                    </div>
                </div>
                <ul class="pricing-features">
                    <li><span class="check">✓</span> 4 vCPU Cores</li>
                    <li><span class="check">✓</span> 4 GB RAM</li>
                    <li><span class="check">✓</span> 80 GB NVMe</li>
                    <li><span class="check">✓</span> 4 TB Bandwidth</li>
                    <li><span class="check">✓</span> 1 IPv4 Address</li>
                    <li><span class="check">✓</span> Full Root Access</li>
                </ul>
                <a href="https://api.hoxta.com/cart.php?a=add&pid=vps-4g" class="btn btn-outline btn-block">Deploy Now</a>
            </div>
            <div class="pricing-card popular">
                <div class="popular-badge">Popular</div>
                <div class="pricing-header">
                    <h3>VPS 8G</h3>
                    <div class="price">
                        <span class="currency">$</span>
                        <span class="amount">39.99</span>
                        <span class="period">/mo</span>
                    </div>
                </div>
                <ul class="pricing-features">
                    <li><span class="check">✓</span> 6 vCPU Cores</li>
                    <li><span class="check">✓</span> 8 GB RAM</li>
                    <li><span class="check">✓</span> 160 GB NVMe</li>
                    <li><span class="check">✓</span> 6 TB Bandwidth</li>
                    <li><span class="check">✓</span> 1 IPv4 Address</li>
                    <li><span class="check">✓</span> Snapshot Backups</li>
                </ul>
                <a href="https://api.hoxta.com/cart.php?a=add&pid=vps-8g" class="btn btn-primary btn-block">Deploy Now</a>
            </div>
            <div class="pricing-card">
                <div class="pricing-header">
                    <h3>VPS 16G</h3>
                    <div class="price">
                        <span class="currency">$</span>
                        <span class="amount">79.99</span>
                        <span class="period">/mo</span>
                    </div>
                </div>
                <ul class="pricing-features">
                    <li><span class="check">✓</span> 8 vCPU Cores</li>
                    <li><span class="check">✓</span> 16 GB RAM</li>
                    <li><span class="check">✓</span> 320 GB NVMe</li>
                    <li><span class="check">✓</span> 10 TB Bandwidth</li>
                    <li><span class="check">✓</span> 2 IPv4 Addresses</li>
                    <li><span class="check">✓</span> Priority Support</li>
                </ul>
                <a href="https://api.hoxta.com/cart.php?a=add&pid=vps-16g" class="btn btn-outline btn-block">Deploy Now</a>
            </div>
        </div>
    </div>
</section>

<!-- Features Grid -->
<section class="section section-dark">
    <div class="container">
        <div class="section-header">
            <h2>VPS <span class="gradient-text">Features</span></h2>
            <p>Enterprise infrastructure at your fingertips</p>
        </div>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">⚡</div>
                <h3>Instant Deployment</h3>
                <p>Your VPS is ready in under 60 seconds. Choose from 20+ OS templates.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">💾</div>
                <h3>NVMe SSD Storage</h3>
                <p>Enterprise-grade NVMe drives for maximum I/O performance.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🔐</div>
                <h3>Full Root Access</h3>
                <p>Complete control over your server. Install anything you need.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🛡️</div>
                <h3>DDoS Protection</h3>
                <p>Free enterprise DDoS protection on all VPS plans.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">📸</div>
                <h3>Snapshot Backups</h3>
                <p>Create instant snapshots and restore with one click.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🌍</div>
                <h3>Global Locations</h3>
                <p>Deploy in US, EU, or Asia for optimal latency.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content">
            <h2>Deploy Your VPS in 60 Seconds</h2>
            <p>Enterprise-grade infrastructure with instant provisioning.</p>
            <a href="https://api.hoxta.com/cart.php?a=add&pid=vps" class="btn btn-primary btn-lg">Deploy Now</a>
        </div>
    </div>
</section>

<?php
require_once __DIR__.'/partials/footer.php';
require_once __DIR__.'/partials/scripts.php';
?>
