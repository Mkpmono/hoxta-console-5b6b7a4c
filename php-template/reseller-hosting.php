<?php
$pageTitle = 'Reseller Hosting';
$pageDescription = 'Start your own hosting business with Hoxta reseller hosting. White-label solutions with WHM, WHMCS integration, and premium support.';
$currentPage = 'reseller-hosting';
require_once __DIR__.'/partials/head.php';
require_once __DIR__.'/partials/header.php';
?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-bg"></div>
    <div class="container">
        <div class="hero-content">
            <span class="hero-badge">💼 Reseller Hosting</span>
            <h1>Start Your <span class="gradient-text">Hosting Business</span></h1>
            <p class="hero-subtitle">White-label reseller hosting with WHM control panel, WHMCS compatibility, and the infrastructure to build your hosting empire.</p>
            <div class="hero-buttons">
                <a href="https://api.hoxta.com/cart.php?a=add&pid=reseller" class="btn btn-primary btn-lg">Become a Reseller</a>
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
                <span class="trust-icon">🏷️</span>
                <span>White Label</span>
            </div>
            <div class="trust-item">
                <span class="trust-icon">🎛️</span>
                <span>WHM Included</span>
            </div>
            <div class="trust-item">
                <span class="trust-icon">💰</span>
                <span>Keep 100% Profit</span>
            </div>
            <div class="trust-item">
                <span class="trust-icon">🔧</span>
                <span>WHMCS Ready</span>
            </div>
            <div class="trust-item">
                <span class="trust-icon">🎧</span>
                <span>Partner Support</span>
            </div>
        </div>
    </div>
</section>

<!-- Pricing Plans -->
<section id="plans" class="section">
    <div class="container">
        <div class="section-header">
            <h2>Reseller <span class="gradient-text">Plans</span></h2>
            <p>Choose the plan that fits your business goals</p>
        </div>
        <div class="pricing-grid">
            <div class="pricing-card">
                <div class="pricing-header">
                    <h3>Starter</h3>
                    <div class="price">
                        <span class="currency">$</span>
                        <span class="amount">19.99</span>
                        <span class="period">/mo</span>
                    </div>
                </div>
                <ul class="pricing-features">
                    <li><span class="check">✓</span> 50 GB NVMe Storage</li>
                    <li><span class="check">✓</span> 25 cPanel Accounts</li>
                    <li><span class="check">✓</span> WHM Control Panel</li>
                    <li><span class="check">✓</span> 500 GB Bandwidth</li>
                    <li><span class="check">✓</span> White Label DNS</li>
                    <li><span class="check">✓</span> Free SSL Certificates</li>
                </ul>
                <a href="https://api.hoxta.com/cart.php?a=add&pid=reseller-starter" class="btn btn-outline btn-block">Order Now</a>
            </div>
            <div class="pricing-card popular">
                <div class="popular-badge">Best Value</div>
                <div class="pricing-header">
                    <h3>Professional</h3>
                    <div class="price">
                        <span class="currency">$</span>
                        <span class="amount">39.99</span>
                        <span class="period">/mo</span>
                    </div>
                </div>
                <ul class="pricing-features">
                    <li><span class="check">✓</span> 150 GB NVMe Storage</li>
                    <li><span class="check">✓</span> 75 cPanel Accounts</li>
                    <li><span class="check">✓</span> WHM Control Panel</li>
                    <li><span class="check">✓</span> Unlimited Bandwidth</li>
                    <li><span class="check">✓</span> White Label Everything</li>
                    <li><span class="check">✓</span> Priority Support</li>
                    <li><span class="check">✓</span> Free WHMCS License</li>
                </ul>
                <a href="https://api.hoxta.com/cart.php?a=add&pid=reseller-pro" class="btn btn-primary btn-block">Order Now</a>
            </div>
            <div class="pricing-card">
                <div class="pricing-header">
                    <h3>Enterprise</h3>
                    <div class="price">
                        <span class="currency">$</span>
                        <span class="amount">79.99</span>
                        <span class="period">/mo</span>
                    </div>
                </div>
                <ul class="pricing-features">
                    <li><span class="check">✓</span> 300 GB NVMe Storage</li>
                    <li><span class="check">✓</span> Unlimited Accounts</li>
                    <li><span class="check">✓</span> WHM Control Panel</li>
                    <li><span class="check">✓</span> Unlimited Everything</li>
                    <li><span class="check">✓</span> Dedicated Resources</li>
                    <li><span class="check">✓</span> Account Manager</li>
                    <li><span class="check">✓</span> Custom Branding</li>
                </ul>
                <a href="https://api.hoxta.com/cart.php?a=add&pid=reseller-enterprise" class="btn btn-outline btn-block">Order Now</a>
            </div>
        </div>
    </div>
</section>

<!-- Features Grid -->
<section class="section section-dark">
    <div class="container">
        <div class="section-header">
            <h2>Build Your <span class="gradient-text">Hosting Empire</span></h2>
            <p>Everything you need to succeed as a hosting provider</p>
        </div>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">🏷️</div>
                <h3>100% White Label</h3>
                <p>Your brand, your business. Customers never see Hoxta branding.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🎛️</div>
                <h3>WHM Control Panel</h3>
                <p>Full WHM access to create and manage unlimited cPanel accounts.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">💰</div>
                <h3>Set Your Own Prices</h3>
                <p>Keep 100% of your profits. No revenue sharing with Hoxta.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🔧</div>
                <h3>WHMCS Integration</h3>
                <p>Seamless automation with WHMCS for billing and provisioning.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">📈</div>
                <h3>Scalable Infrastructure</h3>
                <p>Start small and grow. Upgrade your plan as your business expands.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🎧</div>
                <h3>Partner Support</h3>
                <p>Dedicated reseller support team to help you succeed.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content">
            <h2>Ready to Start Your Hosting Business?</h2>
            <p>Join our reseller program and start earning today.</p>
            <a href="https://api.hoxta.com/cart.php?a=add&pid=reseller" class="btn btn-primary btn-lg">Become a Reseller</a>
        </div>
    </div>
</section>

<?php
require_once __DIR__.'/partials/footer.php';
require_once __DIR__.'/partials/scripts.php';
?>
