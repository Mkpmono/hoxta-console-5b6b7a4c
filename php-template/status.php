<?php
$pageTitle = 'Service Status';
$pageDescription = 'Real-time status of Hoxta hosting infrastructure. View uptime, incidents, and maintenance schedules.';
$currentPage = 'status';
require_once __DIR__.'/partials/head.php';
require_once __DIR__.'/partials/header.php';
?>

<!-- Hero Section -->
<section class="hero-section hero-compact">
    <div class="hero-bg"></div>
    <div class="container">
        <div class="hero-content">
            <h1>Service <span class="gradient-text">Status</span></h1>
            <p class="hero-subtitle">Real-time status of all Hoxta infrastructure and services.</p>
        </div>
    </div>
</section>

<!-- Overall Status -->
<section class="section">
    <div class="container">
        <div class="status-overview">
            <div class="status-banner status-operational">
                <span class="status-icon">✓</span>
                <div class="status-text">
                    <h2>All Systems Operational</h2>
                    <p>Last updated: <span id="lastUpdate"></span></p>
                </div>
            </div>
        </div>

        <!-- Services Status -->
        <div class="status-grid">
            <div class="status-card">
                <div class="status-header">
                    <h3>🌐 Web Hosting</h3>
                    <span class="status-badge operational">Operational</span>
                </div>
                <div class="status-uptime">
                    <span class="uptime-value">99.99%</span>
                    <span class="uptime-label">30-day uptime</span>
                </div>
            </div>
            <div class="status-card">
                <div class="status-header">
                    <h3>🖥️ VPS Servers</h3>
                    <span class="status-badge operational">Operational</span>
                </div>
                <div class="status-uptime">
                    <span class="uptime-value">99.99%</span>
                    <span class="uptime-label">30-day uptime</span>
                </div>
            </div>
            <div class="status-card">
                <div class="status-header">
                    <h3>🖧 Dedicated Servers</h3>
                    <span class="status-badge operational">Operational</span>
                </div>
                <div class="status-uptime">
                    <span class="uptime-value">99.99%</span>
                    <span class="uptime-label">30-day uptime</span>
                </div>
            </div>
            <div class="status-card">
                <div class="status-header">
                    <h3>🎮 Game Servers</h3>
                    <span class="status-badge operational">Operational</span>
                </div>
                <div class="status-uptime">
                    <span class="uptime-value">99.98%</span>
                    <span class="uptime-label">30-day uptime</span>
                </div>
            </div>
            <div class="status-card">
                <div class="status-header">
                    <h3>🛡️ DDoS Protection</h3>
                    <span class="status-badge operational">Operational</span>
                </div>
                <div class="status-uptime">
                    <span class="uptime-value">100%</span>
                    <span class="uptime-label">30-day uptime</span>
                </div>
            </div>
            <div class="status-card">
                <div class="status-header">
                    <h3>🎫 Support Systems</h3>
                    <span class="status-badge operational">Operational</span>
                </div>
                <div class="status-uptime">
                    <span class="uptime-value">99.99%</span>
                    <span class="uptime-label">30-day uptime</span>
                </div>
            </div>
        </div>

        <!-- Locations -->
        <div class="section-header" style="margin-top: 4rem;">
            <h2>Datacenter <span class="gradient-text">Locations</span></h2>
        </div>
        <div class="status-grid">
            <div class="status-card">
                <div class="status-header">
                    <h3>🇺🇸 US East (New York)</h3>
                    <span class="status-badge operational">Operational</span>
                </div>
            </div>
            <div class="status-card">
                <div class="status-header">
                    <h3>🇺🇸 US West (Los Angeles)</h3>
                    <span class="status-badge operational">Operational</span>
                </div>
            </div>
            <div class="status-card">
                <div class="status-header">
                    <h3>🇩🇪 EU Central (Frankfurt)</h3>
                    <span class="status-badge operational">Operational</span>
                </div>
            </div>
            <div class="status-card">
                <div class="status-header">
                    <h3>🇬🇧 EU West (London)</h3>
                    <span class="status-badge operational">Operational</span>
                </div>
            </div>
            <div class="status-card">
                <div class="status-header">
                    <h3>🇸🇬 Asia (Singapore)</h3>
                    <span class="status-badge operational">Operational</span>
                </div>
            </div>
            <div class="status-card">
                <div class="status-header">
                    <h3>🇦🇺 Oceania (Sydney)</h3>
                    <span class="status-badge operational">Operational</span>
                </div>
            </div>
        </div>

        <!-- Recent Incidents -->
        <div class="section-header" style="margin-top: 4rem;">
            <h2>Recent <span class="gradient-text">Incidents</span></h2>
        </div>
        <div class="incidents-list">
            <div class="incident-card resolved">
                <div class="incident-header">
                    <span class="incident-status">✓ Resolved</span>
                    <span class="incident-date">January 8, 2026</span>
                </div>
                <h3>Scheduled Maintenance - US East</h3>
                <p>Network equipment upgrade completed successfully. No impact to services.</p>
            </div>
            <div class="incident-card resolved">
                <div class="incident-header">
                    <span class="incident-status">✓ Resolved</span>
                    <span class="incident-date">January 3, 2026</span>
                </div>
                <h3>DDoS Attack Mitigated - Game Servers</h3>
                <p>Large-scale DDoS attack automatically mitigated. No customer impact.</p>
            </div>
        </div>
    </div>
</section>

<!-- Subscribe to Updates -->
<section class="section section-dark">
    <div class="container">
        <div class="cta-content text-center">
            <h2>Get Status Updates</h2>
            <p>Subscribe to receive notifications about incidents and maintenance.</p>
            <div class="subscribe-form">
                <input type="email" placeholder="Enter your email" class="subscribe-input">
                <button class="btn btn-primary">Subscribe</button>
            </div>
        </div>
    </div>
</section>

<script>
document.getElementById('lastUpdate').textContent = new Date().toLocaleString();
</script>

<?php
require_once __DIR__.'/partials/footer.php';
require_once __DIR__.'/partials/scripts.php';
?>
