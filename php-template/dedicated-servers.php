<?php
$pageTitle = 'Dedicated Servers';
$pageDescription = 'Bare metal dedicated servers with unmetered bandwidth, full hardware control, and 24/7 expert support. Enterprise-grade performance.';
$currentPage = 'dedicated-servers';
require_once __DIR__.'/partials/head.php';
require_once __DIR__.'/partials/header.php';
?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-bg"></div>
    <div class="container">
        <div class="hero-content">
            <span class="hero-badge">🖧 Dedicated Servers</span>
            <h1>Bare Metal <span class="gradient-text">Dedicated Servers</span></h1>
            <p class="hero-subtitle">Full hardware control with enterprise-grade processors, NVMe storage, and unmetered bandwidth. Maximum performance for demanding workloads.</p>
            <div class="hero-buttons">
                <a href="https://api.hoxta.com/cart.php?a=add&pid=dedicated" class="btn btn-primary btn-lg">Configure Server</a>
                <a href="#plans" class="btn btn-outline btn-lg">View Servers</a>
            </div>
        </div>
    </div>
</section>

<!-- Trust Bar -->
<section class="trust-bar">
    <div class="container">
        <div class="trust-items">
            <div class="trust-item">
                <span class="trust-icon">🖧</span>
                <span>Bare Metal</span>
            </div>
            <div class="trust-item">
                <span class="trust-icon">♾️</span>
                <span>Unmetered BW</span>
            </div>
            <div class="trust-item">
                <span class="trust-icon">💾</span>
                <span>NVMe RAID</span>
            </div>
            <div class="trust-item">
                <span class="trust-icon">🛡️</span>
                <span>DDoS Protected</span>
            </div>
            <div class="trust-item">
                <span class="trust-icon">⏱️</span>
                <span>99.99% SLA</span>
            </div>
        </div>
    </div>
</section>

<!-- Pricing Plans -->
<section id="plans" class="section">
    <div class="container">
        <div class="section-header">
            <h2>Dedicated <span class="gradient-text">Servers</span></h2>
            <p>Enterprise hardware for maximum performance</p>
        </div>
        <div class="pricing-grid">
            <div class="pricing-card">
                <div class="pricing-header">
                    <h3>Intel Xeon E-2136</h3>
                    <div class="price">
                        <span class="currency">$</span>
                        <span class="amount">99</span>
                        <span class="period">/mo</span>
                    </div>
                </div>
                <ul class="pricing-features">
                    <li><span class="check">✓</span> 6 Cores / 12 Threads</li>
                    <li><span class="check">✓</span> 32 GB DDR4 RAM</li>
                    <li><span class="check">✓</span> 2x 500GB NVMe</li>
                    <li><span class="check">✓</span> Unmetered @ 1Gbps</li>
                    <li><span class="check">✓</span> 5 IPv4 Addresses</li>
                    <li><span class="check">✓</span> IPMI Access</li>
                </ul>
                <a href="https://api.hoxta.com/cart.php?a=add&pid=dedi-e2136" class="btn btn-outline btn-block">Configure</a>
            </div>
            <div class="pricing-card popular">
                <div class="popular-badge">Best Seller</div>
                <div class="pricing-header">
                    <h3>AMD Ryzen 9 5950X</h3>
                    <div class="price">
                        <span class="currency">$</span>
                        <span class="amount">179</span>
                        <span class="period">/mo</span>
                    </div>
                </div>
                <ul class="pricing-features">
                    <li><span class="check">✓</span> 16 Cores / 32 Threads</li>
                    <li><span class="check">✓</span> 64 GB DDR4 RAM</li>
                    <li><span class="check">✓</span> 2x 1TB NVMe</li>
                    <li><span class="check">✓</span> Unmetered @ 1Gbps</li>
                    <li><span class="check">✓</span> 13 IPv4 Addresses</li>
                    <li><span class="check">✓</span> Hardware RAID</li>
                </ul>
                <a href="https://api.hoxta.com/cart.php?a=add&pid=dedi-5950x" class="btn btn-primary btn-block">Configure</a>
            </div>
            <div class="pricing-card">
                <div class="pricing-header">
                    <h3>Dual Xeon Gold 6248</h3>
                    <div class="price">
                        <span class="currency">$</span>
                        <span class="amount">399</span>
                        <span class="period">/mo</span>
                    </div>
                </div>
                <ul class="pricing-features">
                    <li><span class="check">✓</span> 40 Cores / 80 Threads</li>
                    <li><span class="check">✓</span> 256 GB DDR4 RAM</li>
                    <li><span class="check">✓</span> 4x 2TB NVMe</li>
                    <li><span class="check">✓</span> Unmetered @ 10Gbps</li>
                    <li><span class="check">✓</span> 29 IPv4 Addresses</li>
                    <li><span class="check">✓</span> Enterprise RAID</li>
                </ul>
                <a href="https://api.hoxta.com/cart.php?a=add&pid=dedi-gold" class="btn btn-outline btn-block">Configure</a>
            </div>
        </div>
    </div>
</section>

<!-- Managed Services Upsell -->
<section class="section">
    <div class="container">
        <div class="upsell-card">
            <div class="upsell-content">
                <span class="upsell-badge">🔧 Add-On</span>
                <h3>Managed Server Support</h3>
                <p>Let our experts handle server management, security updates, monitoring, and optimization. Focus on your business while we handle the infrastructure.</p>
                <ul class="upsell-features">
                    <li>✓ 24/7 Proactive Monitoring</li>
                    <li>✓ Security Hardening & Updates</li>
                    <li>✓ Performance Optimization</li>
                    <li>✓ Priority Support Queue</li>
                </ul>
            </div>
            <div class="upsell-price">
                <span class="from">from</span>
                <span class="amount">$49/mo</span>
                <a href="contact.php" class="btn btn-primary">Learn More</a>
            </div>
        </div>
    </div>
</section>

<!-- Features Grid -->
<section class="section section-dark">
    <div class="container">
        <div class="section-header">
            <h2>Enterprise <span class="gradient-text">Features</span></h2>
            <p>Datacenter-grade infrastructure for your business</p>
        </div>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">🖧</div>
                <h3>Bare Metal Power</h3>
                <p>No virtualization overhead. 100% of hardware resources dedicated to you.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">♾️</div>
                <h3>Unmetered Bandwidth</h3>
                <p>No traffic caps or overage fees. Scale without limits.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">💾</div>
                <h3>NVMe RAID Storage</h3>
                <p>Enterprise NVMe with hardware RAID for speed and redundancy.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🛡️</div>
                <h3>DDoS Protection</h3>
                <p>Enterprise-grade mitigation protects against volumetric attacks.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🔧</div>
                <h3>IPMI Access</h3>
                <p>Full out-of-band management for remote KVM and power control.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">⏱️</div>
                <h3>99.99% SLA</h3>
                <p>Enterprise SLA with guaranteed uptime and credits for any downtime.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content">
            <h2>Need a Custom Configuration?</h2>
            <p>Our sales team can build a server tailored to your exact requirements.</p>
            <a href="contact.php" class="btn btn-primary btn-lg">Contact Sales</a>
        </div>
    </div>
</section>

<?php
require_once __DIR__.'/partials/footer.php';
require_once __DIR__.'/partials/scripts.php';
?>
