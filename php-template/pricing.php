<?php
$pageTitle = 'Pricing';
$pageDescription = 'Transparent pricing for all Hoxta hosting services. Web hosting from $2.99/mo, VPS from $9.99/mo, game servers from $4.99/mo.';
$currentPage = 'pricing';
require_once __DIR__.'/partials/head.php';
require_once __DIR__.'/partials/header.php';
?>

<!-- Hero Section -->
<section class="hero-section hero-compact">
    <div class="hero-bg"></div>
    <div class="container">
        <div class="hero-content">
            <h1>Simple, <span class="gradient-text">Transparent Pricing</span></h1>
            <p class="hero-subtitle">No hidden fees. No surprises. Just powerful hosting at fair prices.</p>
        </div>
    </div>
</section>

<!-- Web Hosting Pricing -->
<section id="web" class="section">
    <div class="container">
        <div class="section-header">
            <h2>🌐 Web <span class="gradient-text">Hosting</span></h2>
            <p>Perfect for websites and web applications</p>
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
                    <li><span class="check">✓</span> 10 GB NVMe</li>
                    <li><span class="check">✓</span> 1 Website</li>
                    <li><span class="check">✓</span> Free SSL</li>
                </ul>
                <a href="web-hosting.php" class="btn btn-outline btn-block">View Details</a>
            </div>
            <div class="pricing-card popular">
                <div class="popular-badge">Popular</div>
                <div class="pricing-header">
                    <h3>Professional</h3>
                    <div class="price">
                        <span class="currency">$</span>
                        <span class="amount">7.99</span>
                        <span class="period">/mo</span>
                    </div>
                </div>
                <ul class="pricing-features">
                    <li><span class="check">✓</span> 50 GB NVMe</li>
                    <li><span class="check">✓</span> Unlimited Sites</li>
                    <li><span class="check">✓</span> Daily Backups</li>
                </ul>
                <a href="web-hosting.php" class="btn btn-primary btn-block">View Details</a>
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
                    <li><span class="check">✓</span> 100 GB NVMe</li>
                    <li><span class="check">✓</span> Dedicated IP</li>
                    <li><span class="check">✓</span> Priority Support</li>
                </ul>
                <a href="web-hosting.php" class="btn btn-outline btn-block">View Details</a>
            </div>
        </div>
    </div>
</section>

<!-- VPS Pricing -->
<section id="vps" class="section section-dark">
    <div class="container">
        <div class="section-header">
            <h2>🖥️ VPS <span class="gradient-text">Hosting</span></h2>
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
                    <li>2 vCPU / 2 GB RAM</li>
                    <li>40 GB NVMe</li>
                </ul>
                <a href="vps-hosting.php" class="btn btn-outline btn-block">View Details</a>
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
                    <li>4 vCPU / 4 GB RAM</li>
                    <li>80 GB NVMe</li>
                </ul>
                <a href="vps-hosting.php" class="btn btn-outline btn-block">View Details</a>
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
                    <li>6 vCPU / 8 GB RAM</li>
                    <li>160 GB NVMe</li>
                </ul>
                <a href="vps-hosting.php" class="btn btn-primary btn-block">View Details</a>
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
                    <li>8 vCPU / 16 GB RAM</li>
                    <li>320 GB NVMe</li>
                </ul>
                <a href="vps-hosting.php" class="btn btn-outline btn-block">View Details</a>
            </div>
        </div>
    </div>
</section>

<!-- Game Servers Pricing -->
<section id="games" class="section">
    <div class="container">
        <div class="section-header">
            <h2>🎮 Game <span class="gradient-text">Servers</span></h2>
            <p>Popular games with instant setup</p>
        </div>
        <div class="pricing-grid pricing-grid-4">
            <div class="pricing-card">
                <div class="pricing-header">
                    <h3>Minecraft</h3>
                    <div class="price">
                        <span class="from">from</span>
                        <span class="currency">$</span>
                        <span class="amount">4.99</span>
                        <span class="period">/mo</span>
                    </div>
                </div>
                <a href="game.php?game=minecraft" class="btn btn-outline btn-block">View Plans</a>
            </div>
            <div class="pricing-card">
                <div class="pricing-header">
                    <h3>Rust</h3>
                    <div class="price">
                        <span class="from">from</span>
                        <span class="currency">$</span>
                        <span class="amount">14.99</span>
                        <span class="period">/mo</span>
                    </div>
                </div>
                <a href="game.php?game=rust" class="btn btn-outline btn-block">View Plans</a>
            </div>
            <div class="pricing-card">
                <div class="pricing-header">
                    <h3>FiveM</h3>
                    <div class="price">
                        <span class="from">from</span>
                        <span class="currency">$</span>
                        <span class="amount">19.99</span>
                        <span class="period">/mo</span>
                    </div>
                </div>
                <a href="game.php?game=fivem" class="btn btn-outline btn-block">View Plans</a>
            </div>
            <div class="pricing-card">
                <div class="pricing-header">
                    <h3>ARK</h3>
                    <div class="price">
                        <span class="from">from</span>
                        <span class="currency">$</span>
                        <span class="amount">14.99</span>
                        <span class="period">/mo</span>
                    </div>
                </div>
                <a href="game.php?game=ark" class="btn btn-outline btn-block">View Plans</a>
            </div>
        </div>
        <div class="text-center" style="margin-top: 2rem;">
            <a href="game-servers.php" class="btn btn-primary">Browse All Games →</a>
        </div>
    </div>
</section>

<!-- Dedicated Servers -->
<section id="dedicated" class="section section-dark">
    <div class="container">
        <div class="section-header">
            <h2>🖧 Dedicated <span class="gradient-text">Servers</span></h2>
            <p>Bare metal power for maximum performance</p>
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
                    <li>6c/12t / 32 GB RAM</li>
                    <li>2x 500GB NVMe</li>
                </ul>
                <a href="dedicated-servers.php" class="btn btn-outline btn-block">Configure</a>
            </div>
            <div class="pricing-card popular">
                <div class="popular-badge">Best Seller</div>
                <div class="pricing-header">
                    <h3>Ryzen 9 5950X</h3>
                    <div class="price">
                        <span class="currency">$</span>
                        <span class="amount">179</span>
                        <span class="period">/mo</span>
                    </div>
                </div>
                <ul class="pricing-features">
                    <li>16c/32t / 64 GB RAM</li>
                    <li>2x 1TB NVMe</li>
                </ul>
                <a href="dedicated-servers.php" class="btn btn-primary btn-block">Configure</a>
            </div>
            <div class="pricing-card">
                <div class="pricing-header">
                    <h3>Dual Xeon Gold</h3>
                    <div class="price">
                        <span class="currency">$</span>
                        <span class="amount">399</span>
                        <span class="period">/mo</span>
                    </div>
                </div>
                <ul class="pricing-features">
                    <li>40c/80t / 256 GB RAM</li>
                    <li>4x 2TB NVMe</li>
                </ul>
                <a href="dedicated-servers.php" class="btn btn-outline btn-block">Configure</a>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content">
            <h2>Need a Custom Solution?</h2>
            <p>Our sales team can build a package tailored to your exact requirements.</p>
            <a href="contact.php" class="btn btn-primary btn-lg">Contact Sales</a>
        </div>
    </div>
</section>

<?php
require_once __DIR__.'/partials/footer.php';
require_once __DIR__.'/partials/scripts.php';
?>
