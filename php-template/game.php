<?php
// Get game slug from URL
$gameSlug = isset($_GET['game']) ? htmlspecialchars($_GET['game']) : '';

// Default meta (will be overridden by JS)
$pageTitle = 'Game Server Hosting';
$pageDescription = 'Premium game server hosting with instant setup, DDoS protection, and 24/7 support.';
$currentPage = 'game-servers';
require_once __DIR__.'/partials/head.php';
require_once __DIR__.'/partials/header.php';
?>

<div id="gamePageContent">
    <!-- Loading State -->
    <section class="hero-section">
        <div class="hero-bg"></div>
        <div class="container">
            <div class="hero-content">
                <div class="loading-placeholder">
                    <div class="loading-spinner"></div>
                    <p>Loading game details...</p>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const gameSlug = '<?php echo $gameSlug; ?>';
    const gameData = window.gamesData.find(g => g.slug === gameSlug);
    
    if (!gameData) {
        // Game not found - redirect to catalog
        window.location.href = 'game-servers.php';
        return;
    }
    
    // Update page title
    document.title = gameData.title + ' Server Hosting | Hoxta';
    
    // Render game page
    document.getElementById('gamePageContent').innerHTML = `
        <!-- Hero Section -->
        <section class="hero-section game-hero" style="--game-image: url('${gameData.image}')">
            <div class="hero-bg"></div>
            <div class="container">
                <div class="hero-content">
                    <nav class="breadcrumb">
                        <a href="index.php">Home</a> / 
                        <a href="game-servers.php">Game Servers</a> / 
                        <span>${gameData.title}</span>
                    </nav>
                    <span class="hero-badge">🎮 ${gameData.category.charAt(0).toUpperCase() + gameData.category.slice(1)}</span>
                    <h1>${gameData.title} <span class="gradient-text">Server Hosting</span></h1>
                    <p class="hero-subtitle">${gameData.description}</p>
                    <div class="hero-buttons">
                        <a href="https://api.hoxta.com/cart.php?a=add&pid=game-${gameData.slug}" class="btn btn-primary btn-lg">Order Now</a>
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
                        <span>Instant Setup</span>
                    </div>
                    <div class="trust-item">
                        <span class="trust-icon">🛡️</span>
                        <span>DDoS Protected</span>
                    </div>
                    <div class="trust-item">
                        <span class="trust-icon">🔧</span>
                        <span>Mod Support</span>
                    </div>
                    <div class="trust-item">
                        <span class="trust-icon">💾</span>
                        <span>Auto Backups</span>
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
                    <h2>${gameData.title} <span class="gradient-text">Plans</span></h2>
                    <p>Choose the perfect server size for your community</p>
                </div>
                <div class="pricing-grid pricing-grid-4">
                    ${gameData.plans.map((plan, index) => `
                        <div class="pricing-card ${index === 1 ? 'popular' : ''}">
                            ${index === 1 ? '<div class="popular-badge">Popular</div>' : ''}
                            <div class="pricing-header">
                                <h3>${plan.name}</h3>
                                <div class="price">
                                    <span class="currency">$</span>
                                    <span class="amount">${plan.price.replace('$', '').replace('/mo', '')}</span>
                                    <span class="period">/mo</span>
                                </div>
                            </div>
                            <ul class="pricing-features">
                                ${plan.features.map(feature => `
                                    <li><span class="check">✓</span> ${feature}</li>
                                `).join('')}
                            </ul>
                            <a href="https://api.hoxta.com/cart.php?a=add&pid=game-${gameData.slug}-${plan.name.toLowerCase().replace(/\s+/g, '-')}" class="btn ${index === 1 ? 'btn-primary' : 'btn-outline'} btn-block">Order Now</a>
                        </div>
                    `).join('')}
                </div>
            </div>
        </section>

        <!-- Features Grid -->
        <section class="section section-dark">
            <div class="container">
                <div class="section-header">
                    <h2>${gameData.title} <span class="gradient-text">Features</span></h2>
                    <p>Everything you need for the ultimate gaming experience</p>
                </div>
                <div class="features-grid">
                    ${gameData.features.map(feature => `
                        <div class="feature-card">
                            <div class="feature-icon">${feature.icon}</div>
                            <h3>${feature.title}</h3>
                            <p>${feature.description}</p>
                        </div>
                    `).join('')}
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        ${gameData.faq ? `
        <section class="section">
            <div class="container">
                <div class="section-header">
                    <h2>Frequently Asked <span class="gradient-text">Questions</span></h2>
                </div>
                <div class="faq-list">
                    ${gameData.faq.map((item, index) => `
                        <div class="faq-item">
                            <button class="faq-question" onclick="toggleFaq(${index})">
                                <span>${item.question}</span>
                                <span class="faq-icon" id="faqIcon${index}">+</span>
                            </button>
                            <div class="faq-answer" id="faqAnswer${index}">
                                <p>${item.answer}</p>
                            </div>
                        </div>
                    `).join('')}
                </div>
            </div>
        </section>
        ` : ''}

        <!-- CTA Section -->
        <section class="cta-section">
            <div class="container">
                <div class="cta-content">
                    <h2>Ready to Start Your ${gameData.title} Server?</h2>
                    <p>Join thousands of players on Hoxta's premium network.</p>
                    <a href="https://api.hoxta.com/cart.php?a=add&pid=game-${gameData.slug}" class="btn btn-primary btn-lg">Get Started</a>
                </div>
            </div>
        </section>
    `;
});

function toggleFaq(index) {
    const answer = document.getElementById('faqAnswer' + index);
    const icon = document.getElementById('faqIcon' + index);
    
    if (answer.classList.contains('open')) {
        answer.classList.remove('open');
        icon.textContent = '+';
    } else {
        answer.classList.add('open');
        icon.textContent = '−';
    }
}
</script>

<?php
require_once __DIR__.'/partials/footer.php';
require_once __DIR__.'/partials/scripts.php';
?>
