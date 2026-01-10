<?php
$pageTitle = 'Game Servers';
$pageDescription = 'Premium game server hosting for Minecraft, Rust, ARK, FiveM, CS2, and 50+ more titles. Instant setup, DDoS protection, and low-latency global network.';
$currentPage = 'game-servers';
require_once __DIR__.'/partials/head.php';
require_once __DIR__.'/partials/header.php';
?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-bg"></div>
    <div class="container">
        <div class="hero-content">
            <span class="hero-badge">🎮 Game Servers</span>
            <h1>Premium <span class="gradient-text">Game Server</span> Hosting</h1>
            <p class="hero-subtitle">Low-latency game servers with instant setup, mod support, and enterprise DDoS protection. Host your gaming community on the fastest network.</p>
            <div class="hero-buttons">
                <a href="#games" class="btn btn-primary btn-lg">Browse Games</a>
                <a href="pricing.php" class="btn btn-outline btn-lg">View Pricing</a>
            </div>
        </div>
    </div>
</section>

<!-- Trust Bar -->
<section class="trust-bar">
    <div class="container">
        <div class="trust-items">
            <div class="trust-item">
                <span class="trust-icon">🎮</span>
                <span>50+ Games</span>
            </div>
            <div class="trust-item">
                <span class="trust-icon">⚡</span>
                <span>Instant Setup</span>
            </div>
            <div class="trust-item">
                <span class="trust-icon">🛡️</span>
                <span>DDoS Protected</span>
            </div>
            <div class="trust-item">
                <span class="trust-icon">🌍</span>
                <span>Global Network</span>
            </div>
            <div class="trust-item">
                <span class="trust-icon">🔧</span>
                <span>Mod Support</span>
            </div>
        </div>
    </div>
</section>

<!-- Game Search & Filter -->
<section id="games" class="section">
    <div class="container">
        <div class="section-header">
            <h2>Choose Your <span class="gradient-text">Game</span></h2>
            <p>Select from our extensive library of supported games</p>
        </div>
        
        <!-- Search and Filters -->
        <div class="game-filters">
            <div class="search-box">
                <input type="text" id="gameSearch" placeholder="Search games..." class="search-input">
                <span class="search-icon">🔍</span>
            </div>
            <div class="filter-pills">
                <button class="filter-pill active" data-category="all">All Games</button>
                <button class="filter-pill" data-category="survival">Survival</button>
                <button class="filter-pill" data-category="fps">FPS</button>
                <button class="filter-pill" data-category="sandbox">Sandbox</button>
                <button class="filter-pill" data-category="roleplay">Roleplay</button>
            </div>
        </div>

        <!-- Games Grid -->
        <div class="games-grid" id="gamesGrid">
            <!-- Games will be loaded dynamically from games-data.js -->
        </div>
        
        <div class="no-results" id="noResults" style="display: none;">
            <p>No games found matching your search. <a href="#" onclick="clearFilters()">Clear filters</a></p>
        </div>
    </div>
</section>

<!-- Features Grid -->
<section class="section section-dark">
    <div class="container">
        <div class="section-header">
            <h2>Why Gamers <span class="gradient-text">Choose Us</span></h2>
            <p>Built by gamers, for gamers</p>
        </div>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">⚡</div>
                <h3>Instant Deployment</h3>
                <p>Your game server is online in under 60 seconds. Start playing immediately.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🛡️</div>
                <h3>DDoS Protection</h3>
                <p>Enterprise-grade protection keeps your server online during attacks.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🔧</div>
                <h3>Full Mod Support</h3>
                <p>Install mods with one click. Support for Steam Workshop, Curseforge, and more.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">📊</div>
                <h3>Custom Control Panel</h3>
                <p>Easy-to-use panel for managing your server, players, and settings.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🌍</div>
                <h3>Global Locations</h3>
                <p>Choose from 15+ locations worldwide for the lowest ping.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">💾</div>
                <h3>Automatic Backups</h3>
                <p>Your world is automatically backed up. Restore with one click.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content">
            <h2>Ready to Start Your Server?</h2>
            <p>Join thousands of gamers hosting on Hoxta's premium network.</p>
            <a href="#games" class="btn btn-primary btn-lg">Choose Your Game</a>
        </div>
    </div>
</section>

<script>
// Game catalog functionality
document.addEventListener('DOMContentLoaded', function() {
    const gamesGrid = document.getElementById('gamesGrid');
    const searchInput = document.getElementById('gameSearch');
    const filterPills = document.querySelectorAll('.filter-pill');
    const noResults = document.getElementById('noResults');
    
    let currentCategory = 'all';
    
    function renderGames() {
        const searchTerm = searchInput.value.toLowerCase();
        let filteredGames = window.gamesData.filter(game => {
            const matchesSearch = game.title.toLowerCase().includes(searchTerm) || 
                                  game.description.toLowerCase().includes(searchTerm);
            const matchesCategory = currentCategory === 'all' || game.category === currentCategory;
            return matchesSearch && matchesCategory;
        });
        
        if (filteredGames.length === 0) {
            gamesGrid.innerHTML = '';
            noResults.style.display = 'block';
            return;
        }
        
        noResults.style.display = 'none';
        gamesGrid.innerHTML = filteredGames.map(game => `
            <a href="game.php?game=${game.slug}" class="game-card">
                <div class="game-image">
                    <img src="${game.image}" alt="${game.title}" loading="lazy">
                    ${game.badge ? `<span class="game-badge">${game.badge}</span>` : ''}
                </div>
                <div class="game-info">
                    <h3>${game.title}</h3>
                    <p>${game.shortDescription}</p>
                    <div class="game-price">
                        <span class="from">from</span>
                        <span class="price">${game.startingPrice}</span>
                    </div>
                </div>
            </a>
        `).join('');
    }
    
    searchInput.addEventListener('input', renderGames);
    
    filterPills.forEach(pill => {
        pill.addEventListener('click', function() {
            filterPills.forEach(p => p.classList.remove('active'));
            this.classList.add('active');
            currentCategory = this.dataset.category;
            renderGames();
        });
    });
    
    // Initial render
    renderGames();
});

function clearFilters() {
    document.getElementById('gameSearch').value = '';
    document.querySelectorAll('.filter-pill').forEach(p => p.classList.remove('active'));
    document.querySelector('[data-category="all"]').classList.add('active');
    currentCategory = 'all';
    renderGames();
}
</script>

<?php
require_once __DIR__.'/partials/footer.php';
require_once __DIR__.'/partials/scripts.php';
?>
