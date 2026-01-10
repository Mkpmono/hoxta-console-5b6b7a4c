<?php
$pageTitle = 'Discord Bot Hosting';
$pageDescription = 'Reliable Discord bot hosting with 24/7 uptime, instant deployment, and support for Node.js, Python, and Java bots.';
$currentPage = 'discord-bot';
require_once __DIR__.'/partials/head.php';
require_once __DIR__.'/partials/header.php';
?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-bg"></div>
    <div class="container">
        <div class="hero-content">
            <span class="hero-badge">🤖 Bot Hosting</span>
            <h1>Discord Bot <span class="gradient-text">Hosting</span></h1>
            <p class="hero-subtitle">Keep your Discord bot online 24/7 with reliable hosting. Support for Node.js, Python, Java, and more with instant deployment.</p>
            <div class="hero-buttons">
                <a href="https://api.hoxta.com/cart.php?a=add&pid=discord-bot" class="btn btn-primary btn-lg">Deploy Bot</a>
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
                <span class="trust-icon">🤖</span>
                <span>24/7 Uptime</span>
            </div>
            <div class="trust-item">
                <span class="trust-icon">⚡</span>
                <span>Instant Deploy</span>
            </div>
            <div class="trust-item">
                <span class="trust-icon">🐍</span>
                <span>Python Ready</span>
            </div>
            <div class="trust-item">
                <span class="trust-icon">💚</span>
                <span>Node.js Ready</span>
            </div>
            <div class="trust-item">
                <span class="trust-icon">☕</span>
                <span>Java Ready</span>
            </div>
        </div>
    </div>
</section>

<!-- Pricing Plans -->
<section id="plans" class="section">
    <div class="container">
        <div class="section-header">
            <h2>Bot Hosting <span class="gradient-text">Plans</span></h2>
            <p>Reliable hosting for bots of all sizes</p>
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
                    <li><span class="check">✓</span> 1 Bot Instance</li>
                    <li><span class="check">✓</span> 512 MB RAM</li>
                    <li><span class="check">✓</span> 1 vCPU Core</li>
                    <li><span class="check">✓</span> 5 GB Storage</li>
                    <li><span class="check">✓</span> 24/7 Uptime</li>
                    <li><span class="check">✓</span> Auto-Restart</li>
                </ul>
                <a href="https://api.hoxta.com/cart.php?a=add&pid=bot-starter" class="btn btn-outline btn-block">Deploy Now</a>
            </div>
            <div class="pricing-card popular">
                <div class="popular-badge">Popular</div>
                <div class="pricing-header">
                    <h3>Standard</h3>
                    <div class="price">
                        <span class="currency">$</span>
                        <span class="amount">5.99</span>
                        <span class="period">/mo</span>
                    </div>
                </div>
                <ul class="pricing-features">
                    <li><span class="check">✓</span> 2 Bot Instances</li>
                    <li><span class="check">✓</span> 1 GB RAM</li>
                    <li><span class="check">✓</span> 2 vCPU Cores</li>
                    <li><span class="check">✓</span> 10 GB Storage</li>
                    <li><span class="check">✓</span> Database Access</li>
                    <li><span class="check">✓</span> Priority Support</li>
                </ul>
                <a href="https://api.hoxta.com/cart.php?a=add&pid=bot-standard" class="btn btn-primary btn-block">Deploy Now</a>
            </div>
            <div class="pricing-card">
                <div class="pricing-header">
                    <h3>Premium</h3>
                    <div class="price">
                        <span class="currency">$</span>
                        <span class="amount">12.99</span>
                        <span class="period">/mo</span>
                    </div>
                </div>
                <ul class="pricing-features">
                    <li><span class="check">✓</span> 5 Bot Instances</li>
                    <li><span class="check">✓</span> 2 GB RAM</li>
                    <li><span class="check">✓</span> 4 vCPU Cores</li>
                    <li><span class="check">✓</span> 25 GB Storage</li>
                    <li><span class="check">✓</span> MySQL + MongoDB</li>
                    <li><span class="check">✓</span> Custom Domain</li>
                </ul>
                <a href="https://api.hoxta.com/cart.php?a=add&pid=bot-premium" class="btn btn-outline btn-block">Deploy Now</a>
            </div>
        </div>
    </div>
</section>

<!-- Supported Languages -->
<section class="section">
    <div class="container">
        <div class="section-header">
            <h2>Supported <span class="gradient-text">Languages</span></h2>
            <p>Deploy bots in your favorite programming language</p>
        </div>
        <div class="languages-grid">
            <div class="language-card">
                <span class="language-icon">💚</span>
                <h3>Node.js</h3>
                <p>Discord.js, Eris</p>
            </div>
            <div class="language-card">
                <span class="language-icon">🐍</span>
                <h3>Python</h3>
                <p>discord.py, Pycord</p>
            </div>
            <div class="language-card">
                <span class="language-icon">☕</span>
                <h3>Java</h3>
                <p>JDA, Discord4J</p>
            </div>
            <div class="language-card">
                <span class="language-icon">💎</span>
                <h3>Ruby</h3>
                <p>discordrb</p>
            </div>
            <div class="language-card">
                <span class="language-icon">🦀</span>
                <h3>Rust</h3>
                <p>Serenity</p>
            </div>
            <div class="language-card">
                <span class="language-icon">🐹</span>
                <h3>Go</h3>
                <p>DiscordGo</p>
            </div>
        </div>
    </div>
</section>

<!-- Features Grid -->
<section class="section section-dark">
    <div class="container">
        <div class="section-header">
            <h2>Hosting <span class="gradient-text">Features</span></h2>
            <p>Everything you need to run your bot</p>
        </div>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">🤖</div>
                <h3>24/7 Uptime</h3>
                <p>Your bot stays online around the clock with automatic monitoring.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🔄</div>
                <h3>Auto-Restart</h3>
                <p>Automatic crash recovery keeps your bot running smoothly.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">📊</div>
                <h3>Resource Monitoring</h3>
                <p>Real-time CPU, RAM, and network usage statistics.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">💾</div>
                <h3>Database Support</h3>
                <p>Built-in MySQL, PostgreSQL, and MongoDB databases.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🔧</div>
                <h3>Git Integration</h3>
                <p>Deploy directly from GitHub or GitLab repositories.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">📝</div>
                <h3>Console Access</h3>
                <p>Full console access for debugging and management.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content">
            <h2>Ready to Deploy Your Bot?</h2>
            <p>Get your Discord bot online in under 60 seconds.</p>
            <a href="https://api.hoxta.com/cart.php?a=add&pid=discord-bot" class="btn btn-primary btn-lg">Deploy Now</a>
        </div>
    </div>
</section>

<?php
require_once __DIR__.'/partials/footer.php';
require_once __DIR__.'/partials/scripts.php';
?>
