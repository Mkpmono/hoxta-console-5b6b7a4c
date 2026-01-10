<?php
$pageTitle = 'Knowledge Base';
$pageDescription = 'Tutorials, guides, and documentation for all Hoxta hosting services. Learn how to set up and manage your hosting.';
$currentPage = 'knowledge-base';
require_once __DIR__.'/partials/head.php';
require_once __DIR__.'/partials/header.php';
?>

<!-- Hero Section -->
<section class="hero-section hero-compact">
    <div class="hero-bg"></div>
    <div class="container">
        <div class="hero-content">
            <h1>Knowledge <span class="gradient-text">Base</span></h1>
            <p class="hero-subtitle">Tutorials, guides, and documentation for all Hoxta services.</p>
            <div class="search-box-large">
                <input type="text" id="kbSearch" placeholder="Search for articles..." class="search-input-lg">
                <button class="btn btn-primary">Search</button>
            </div>
        </div>
    </div>
</section>

<!-- Categories -->
<section class="section">
    <div class="container">
        <div class="kb-categories">
            <a href="#getting-started" class="kb-category">
                <span class="kb-icon">🚀</span>
                <h3>Getting Started</h3>
                <p>New to Hoxta? Start here.</p>
                <span class="article-count">12 articles</span>
            </a>
            <a href="#web-hosting" class="kb-category">
                <span class="kb-icon">🌐</span>
                <h3>Web Hosting</h3>
                <p>cPanel, domains, email setup</p>
                <span class="article-count">24 articles</span>
            </a>
            <a href="#vps" class="kb-category">
                <span class="kb-icon">🖥️</span>
                <h3>VPS Hosting</h3>
                <p>Server management, OS setup</p>
                <span class="article-count">18 articles</span>
            </a>
            <a href="#game-servers" class="kb-category">
                <span class="kb-icon">🎮</span>
                <h3>Game Servers</h3>
                <p>Game setup, mods, plugins</p>
                <span class="article-count">45 articles</span>
            </a>
            <a href="#dedicated" class="kb-category">
                <span class="kb-icon">🖧</span>
                <h3>Dedicated Servers</h3>
                <p>Hardware, IPMI, networking</p>
                <span class="article-count">15 articles</span>
            </a>
            <a href="#security" class="kb-category">
                <span class="kb-icon">🛡️</span>
                <h3>Security</h3>
                <p>DDoS, SSL, firewall setup</p>
                <span class="article-count">20 articles</span>
            </a>
            <a href="#billing" class="kb-category">
                <span class="kb-icon">💳</span>
                <h3>Billing & Account</h3>
                <p>Payments, invoices, upgrades</p>
                <span class="article-count">10 articles</span>
            </a>
            <a href="#api" class="kb-category">
                <span class="kb-icon">🔧</span>
                <h3>API & Integration</h3>
                <p>API docs, webhooks, automation</p>
                <span class="article-count">8 articles</span>
            </a>
        </div>
    </div>
</section>

<!-- Popular Articles -->
<section class="section section-dark">
    <div class="container">
        <div class="section-header">
            <h2>Popular <span class="gradient-text">Articles</span></h2>
        </div>
        <div class="articles-grid">
            <a href="#" class="article-card">
                <span class="article-category">Getting Started</span>
                <h3>How to Set Up Your First Website</h3>
                <p>A step-by-step guide to creating and publishing your first website with Hoxta web hosting.</p>
            </a>
            <a href="#" class="article-card">
                <span class="article-category">Game Servers</span>
                <h3>Installing Mods on Your Minecraft Server</h3>
                <p>Learn how to install Forge, Fabric, and popular mods on your Minecraft server.</p>
            </a>
            <a href="#" class="article-card">
                <span class="article-category">VPS</span>
                <h3>Connecting to Your VPS via SSH</h3>
                <p>Guide to securely connecting to your VPS using SSH on Windows, Mac, and Linux.</p>
            </a>
            <a href="#" class="article-card">
                <span class="article-category">Security</span>
                <h3>Setting Up Free SSL Certificates</h3>
                <p>How to install and configure Let's Encrypt SSL certificates for your domains.</p>
            </a>
            <a href="#" class="article-card">
                <span class="article-category">Web Hosting</span>
                <h3>Managing Email Accounts in cPanel</h3>
                <p>Create, configure, and manage professional email accounts for your domain.</p>
            </a>
            <a href="#" class="article-card">
                <span class="article-category">Game Servers</span>
                <h3>Configuring Your Rust Server</h3>
                <p>Complete guide to server.cfg, plugins, and oxide setup for Rust servers.</p>
            </a>
        </div>
    </div>
</section>

<!-- Need Help CTA -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content">
            <h2>Can't Find What You're Looking For?</h2>
            <p>Our support team is available 24/7 to help you.</p>
            <div class="cta-buttons">
                <a href="contact.php" class="btn btn-primary btn-lg">Contact Support</a>
                <a href="https://api.hoxta.com/submitticket.php" class="btn btn-outline btn-lg">Open Ticket</a>
            </div>
        </div>
    </div>
</section>

<?php
require_once __DIR__.'/partials/footer.php';
require_once __DIR__.'/partials/scripts.php';
?>
