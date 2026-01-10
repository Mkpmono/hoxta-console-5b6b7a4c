<?php
$pageTitle = 'Colocation Services';
$pageDescription = 'Enterprise colocation in Tier III+ datacenters. Secure rack space with redundant power, cooling, and network connectivity.';
$currentPage = 'colocation';
require_once __DIR__.'/partials/head.php';
require_once __DIR__.'/partials/header.php';
?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-bg"></div>
    <div class="container">
        <div class="hero-content">
            <span class="hero-badge">🏢 Colocation</span>
            <h1>Enterprise <span class="gradient-text">Colocation</span></h1>
            <p class="hero-subtitle">Secure rack space in Tier III+ datacenters with redundant power, advanced cooling, and premium network connectivity.</p>
            <div class="hero-buttons">
                <a href="contact.php" class="btn btn-primary btn-lg">Get a Quote</a>
                <a href="#plans" class="btn btn-outline btn-lg">View Options</a>
            </div>
        </div>
    </div>
</section>

<!-- Trust Bar -->
<section class="trust-bar">
    <div class="container">
        <div class="trust-items">
            <div class="trust-item">
                <span class="trust-icon">🏢</span>
                <span>Tier III+</span>
            </div>
            <div class="trust-item">
                <span class="trust-icon">⚡</span>
                <span>Redundant Power</span>
            </div>
            <div class="trust-item">
                <span class="trust-icon">❄️</span>
                <span>N+1 Cooling</span>
            </div>
            <div class="trust-item">
                <span class="trust-icon">🔒</span>
                <span>24/7 Security</span>
            </div>
            <div class="trust-item">
                <span class="trust-icon">🌐</span>
                <span>Multi-Carrier</span>
            </div>
        </div>
    </div>
</section>

<!-- Pricing Plans -->
<section id="plans" class="section">
    <div class="container">
        <div class="section-header">
            <h2>Colocation <span class="gradient-text">Options</span></h2>
            <p>Flexible solutions from 1U to full cabinets</p>
        </div>
        <div class="pricing-grid">
            <div class="pricing-card">
                <div class="pricing-header">
                    <h3>1U Space</h3>
                    <div class="price">
                        <span class="currency">$</span>
                        <span class="amount">49</span>
                        <span class="period">/mo</span>
                    </div>
                </div>
                <ul class="pricing-features">
                    <li><span class="check">✓</span> 1U Rack Space</li>
                    <li><span class="check">✓</span> 1 Amp Power (120V)</li>
                    <li><span class="check">✓</span> 100 Mbps Bandwidth</li>
                    <li><span class="check">✓</span> 1 IPv4 Address</li>
                    <li><span class="check">✓</span> Remote Hands (1 hr/mo)</li>
                    <li><span class="check">✓</span> 24/7 NOC Support</li>
                </ul>
                <a href="contact.php" class="btn btn-outline btn-block">Get Quote</a>
            </div>
            <div class="pricing-card popular">
                <div class="popular-badge">Popular</div>
                <div class="pricing-header">
                    <h3>Quarter Rack</h3>
                    <div class="price">
                        <span class="currency">$</span>
                        <span class="amount">299</span>
                        <span class="period">/mo</span>
                    </div>
                </div>
                <ul class="pricing-features">
                    <li><span class="check">✓</span> 10U Rack Space</li>
                    <li><span class="check">✓</span> 5 Amp Power (208V)</li>
                    <li><span class="check">✓</span> 1 Gbps Bandwidth</li>
                    <li><span class="check">✓</span> 5 IPv4 Addresses</li>
                    <li><span class="check">✓</span> Remote Hands (4 hr/mo)</li>
                    <li><span class="check">✓</span> Private VLAN</li>
                </ul>
                <a href="contact.php" class="btn btn-primary btn-block">Get Quote</a>
            </div>
            <div class="pricing-card">
                <div class="pricing-header">
                    <h3>Full Cabinet</h3>
                    <div class="price">
                        <span class="currency">$</span>
                        <span class="amount">899</span>
                        <span class="period">/mo</span>
                    </div>
                </div>
                <ul class="pricing-features">
                    <li><span class="check">✓</span> 42U Full Cabinet</li>
                    <li><span class="check">✓</span> 20 Amp Power (208V)</li>
                    <li><span class="check">✓</span> 10 Gbps Bandwidth</li>
                    <li><span class="check">✓</span> /28 IP Block</li>
                    <li><span class="check">✓</span> Unlimited Remote Hands</li>
                    <li><span class="check">✓</span> Dedicated Account Manager</li>
                </ul>
                <a href="contact.php" class="btn btn-outline btn-block">Get Quote</a>
            </div>
        </div>
    </div>
</section>

<!-- Features Grid -->
<section class="section section-dark">
    <div class="container">
        <div class="section-header">
            <h2>Datacenter <span class="gradient-text">Features</span></h2>
            <p>Enterprise infrastructure for your hardware</p>
        </div>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">⚡</div>
                <h3>Redundant Power</h3>
                <p>Dual utility feeds, UPS, and diesel generators ensure 100% uptime.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">❄️</div>
                <h3>N+1 Cooling</h3>
                <p>Precision cooling with N+1 redundancy maintains optimal temperature.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🔒</div>
                <h3>Physical Security</h3>
                <p>Biometric access, CCTV, and 24/7 on-site security personnel.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🌐</div>
                <h3>Premium Network</h3>
                <p>Multi-carrier BGP with tier-1 transit and peering exchanges.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🔧</div>
                <h3>Remote Hands</h3>
                <p>Expert technicians available 24/7 for hardware support.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">📊</div>
                <h3>Monitoring</h3>
                <p>Real-time power, temperature, and network monitoring dashboards.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content">
            <h2>Ready to Colocate?</h2>
            <p>Contact our sales team for a custom quote tailored to your needs.</p>
            <a href="contact.php" class="btn btn-primary btn-lg">Contact Sales</a>
        </div>
    </div>
</section>

<?php
require_once __DIR__.'/partials/footer.php';
require_once __DIR__.'/partials/scripts.php';
?>
