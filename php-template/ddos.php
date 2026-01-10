<?php
$pageTitle = 'DDoS Protection';
$pageDescription = 'Enterprise-grade DDoS protection with 10+ Tbps mitigation capacity. Protect your servers from volumetric and application-layer attacks.';
$currentPage = 'ddos';
require_once __DIR__.'/partials/head.php';
require_once __DIR__.'/partials/header.php';
?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-bg"></div>
    <div class="container">
        <div class="hero-content">
            <span class="hero-badge">🛡️ Security</span>
            <h1>Enterprise <span class="gradient-text">DDoS Protection</span></h1>
            <p class="hero-subtitle">Protect your infrastructure from the most sophisticated attacks with our 10+ Tbps global mitigation network.</p>
            <div class="hero-buttons">
                <a href="contact.php" class="btn btn-primary btn-lg">Get Protected</a>
                <a href="#features" class="btn btn-outline btn-lg">Learn More</a>
            </div>
        </div>
    </div>
</section>

<!-- Stats Bar -->
<section class="stats-bar">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item">
                <span class="stat-value">10+ Tbps</span>
                <span class="stat-label">Mitigation Capacity</span>
            </div>
            <div class="stat-item">
                <span class="stat-value">&lt;10ms</span>
                <span class="stat-label">Time to Mitigate</span>
            </div>
            <div class="stat-item">
                <span class="stat-value">24/7</span>
                <span class="stat-label">SOC Monitoring</span>
            </div>
            <div class="stat-item">
                <span class="stat-value">100%</span>
                <span class="stat-label">Uptime SLA</span>
            </div>
        </div>
    </div>
</section>

<!-- Protection Tiers -->
<section id="plans" class="section">
    <div class="container">
        <div class="section-header">
            <h2>Protection <span class="gradient-text">Tiers</span></h2>
            <p>Scalable protection for any infrastructure</p>
        </div>
        <div class="pricing-grid">
            <div class="pricing-card">
                <div class="pricing-header">
                    <h3>Standard</h3>
                    <div class="price">
                        <span class="amount">Included</span>
                    </div>
                </div>
                <ul class="pricing-features">
                    <li><span class="check">✓</span> Layer 3/4 Protection</li>
                    <li><span class="check">✓</span> Up to 1 Tbps Mitigation</li>
                    <li><span class="check">✓</span> Always-On Protection</li>
                    <li><span class="check">✓</span> Basic Traffic Analytics</li>
                    <li><span class="check">✓</span> Included with All Services</li>
                </ul>
                <span class="btn btn-outline btn-block disabled">Included Free</span>
            </div>
            <div class="pricing-card popular">
                <div class="popular-badge">Recommended</div>
                <div class="pricing-header">
                    <h3>Advanced</h3>
                    <div class="price">
                        <span class="currency">$</span>
                        <span class="amount">99</span>
                        <span class="period">/mo</span>
                    </div>
                </div>
                <ul class="pricing-features">
                    <li><span class="check">✓</span> Layer 3/4/7 Protection</li>
                    <li><span class="check">✓</span> Up to 5 Tbps Mitigation</li>
                    <li><span class="check">✓</span> GRE Tunnel Available</li>
                    <li><span class="check">✓</span> Advanced Analytics</li>
                    <li><span class="check">✓</span> Custom Firewall Rules</li>
                    <li><span class="check">✓</span> Priority Support</li>
                </ul>
                <a href="contact.php" class="btn btn-primary btn-block">Contact Sales</a>
            </div>
            <div class="pricing-card">
                <div class="pricing-header">
                    <h3>Enterprise</h3>
                    <div class="price">
                        <span class="amount">Custom</span>
                    </div>
                </div>
                <ul class="pricing-features">
                    <li><span class="check">✓</span> Full-Stack Protection</li>
                    <li><span class="check">✓</span> 10+ Tbps Capacity</li>
                    <li><span class="check">✓</span> Dedicated Scrubbing</li>
                    <li><span class="check">✓</span> Real-Time API</li>
                    <li><span class="check">✓</span> Custom Mitigation</li>
                    <li><span class="check">✓</span> Dedicated SOC Team</li>
                </ul>
                <a href="contact.php" class="btn btn-outline btn-block">Contact Sales</a>
            </div>
        </div>
    </div>
</section>

<!-- Features Grid -->
<section id="features" class="section section-dark">
    <div class="container">
        <div class="section-header">
            <h2>Protection <span class="gradient-text">Features</span></h2>
            <p>Multi-layer defense against modern threats</p>
        </div>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">🛡️</div>
                <h3>Volumetric Protection</h3>
                <p>Mitigate massive UDP, ICMP, and TCP flood attacks at the edge.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🔒</div>
                <h3>Protocol Attacks</h3>
                <p>Stop SYN floods, fragmented packets, and Smurf attacks.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🌐</div>
                <h3>Application Layer</h3>
                <p>Protect against HTTP floods, Slowloris, and API abuse.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">⚡</div>
                <h3>Instant Mitigation</h3>
                <p>Attacks detected and mitigated in under 10 milliseconds.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">📊</div>
                <h3>Real-Time Analytics</h3>
                <p>Detailed attack metrics and traffic analysis dashboard.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🎛️</div>
                <h3>Custom Rules</h3>
                <p>Define custom firewall rules and rate limiting policies.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content">
            <h2>Protect Your Infrastructure Today</h2>
            <p>Don't wait for an attack. Get enterprise-grade protection now.</p>
            <a href="contact.php" class="btn btn-primary btn-lg">Contact Sales</a>
        </div>
    </div>
</section>

<?php
require_once __DIR__.'/partials/footer.php';
require_once __DIR__.'/partials/scripts.php';
?>
