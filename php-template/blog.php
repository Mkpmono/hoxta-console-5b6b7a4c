<?php
$pageTitle = 'Blog';
$pageDescription = 'Hoxta blog - Latest news, tutorials, and updates about hosting, gaming, and technology.';
$currentPage = 'blog';
require_once __DIR__.'/partials/head.php';
require_once __DIR__.'/partials/header.php';
?>

<!-- Hero Section -->
<section class="hero-section hero-compact">
    <div class="hero-bg"></div>
    <div class="container">
        <div class="hero-content">
            <h1>Hoxta <span class="gradient-text">Blog</span></h1>
            <p class="hero-subtitle">News, tutorials, and insights from the Hoxta team.</p>
        </div>
    </div>
</section>

<!-- Featured Post -->
<section class="section">
    <div class="container">
        <div class="featured-post">
            <div class="featured-image">
                <img src="assets/img/blog-featured.jpg" alt="Featured Post" onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 800 400%22%3E%3Crect fill=%22%231a1a2e%22 width=%22800%22 height=%22400%22/%3E%3Ctext fill=%22%2310b981%22 font-family=%22system-ui%22 font-size=%2224%22 x=%22400%22 y=%22200%22 text-anchor=%22middle%22%3EFeatured Article%3C/text%3E%3C/svg%3E'">
            </div>
            <div class="featured-content">
                <span class="post-category">Announcements</span>
                <h2>Introducing Our New Frankfurt Datacenter</h2>
                <p>We're excited to announce the opening of our new state-of-the-art datacenter in Frankfurt, Germany. This expansion brings ultra-low latency to our European customers.</p>
                <div class="post-meta">
                    <span class="post-date">January 5, 2026</span>
                    <span class="post-read">5 min read</span>
                </div>
                <a href="#" class="btn btn-primary">Read More</a>
            </div>
        </div>
    </div>
</section>

<!-- Blog Grid -->
<section class="section section-dark">
    <div class="container">
        <div class="section-header">
            <h2>Latest <span class="gradient-text">Articles</span></h2>
        </div>
        <div class="blog-grid">
            <article class="blog-card">
                <div class="blog-image">
                    <img src="assets/img/blog-1.jpg" alt="Blog Post" onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 400 250%22%3E%3Crect fill=%22%231a1a2e%22 width=%22400%22 height=%22250%22/%3E%3Ctext fill=%22%2310b981%22 font-family=%22system-ui%22 font-size=%2216%22 x=%22200%22 y=%22125%22 text-anchor=%22middle%22%3EBlog Image%3C/text%3E%3C/svg%3E'">
                </div>
                <div class="blog-content">
                    <span class="post-category">Tutorial</span>
                    <h3>How to Optimize Your Minecraft Server for 100+ Players</h3>
                    <p>Learn the best practices for running a high-performance Minecraft server with many concurrent players.</p>
                    <div class="post-meta">
                        <span class="post-date">January 3, 2026</span>
                    </div>
                </div>
            </article>
            <article class="blog-card">
                <div class="blog-image">
                    <img src="assets/img/blog-2.jpg" alt="Blog Post" onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 400 250%22%3E%3Crect fill=%22%231a1a2e%22 width=%22400%22 height=%22250%22/%3E%3Ctext fill=%22%2310b981%22 font-family=%22system-ui%22 font-size=%2216%22 x=%22200%22 y=%22125%22 text-anchor=%22middle%22%3EBlog Image%3C/text%3E%3C/svg%3E'">
                </div>
                <div class="blog-content">
                    <span class="post-category">Security</span>
                    <h3>Understanding DDoS Attacks and How We Protect You</h3>
                    <p>A deep dive into modern DDoS attack vectors and how Hoxta's protection keeps your services online.</p>
                    <div class="post-meta">
                        <span class="post-date">December 28, 2025</span>
                    </div>
                </div>
            </article>
            <article class="blog-card">
                <div class="blog-image">
                    <img src="assets/img/blog-3.jpg" alt="Blog Post" onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 400 250%22%3E%3Crect fill=%22%231a1a2e%22 width=%22400%22 height=%22250%22/%3E%3Ctext fill=%22%2310b981%22 font-family=%22system-ui%22 font-size=%2216%22 x=%22200%22 y=%22125%22 text-anchor=%22middle%22%3EBlog Image%3C/text%3E%3C/svg%3E'">
                </div>
                <div class="blog-content">
                    <span class="post-category">News</span>
                    <h3>Year in Review: Hoxta's 2025 Milestones</h3>
                    <p>Looking back at an incredible year of growth, new features, and community achievements.</p>
                    <div class="post-meta">
                        <span class="post-date">December 20, 2025</span>
                    </div>
                </div>
            </article>
            <article class="blog-card">
                <div class="blog-image">
                    <img src="assets/img/blog-4.jpg" alt="Blog Post" onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 400 250%22%3E%3Crect fill=%22%231a1a2e%22 width=%22400%22 height=%22250%22/%3E%3Ctext fill=%22%2310b981%22 font-family=%22system-ui%22 font-size=%2216%22 x=%22200%22 y=%22125%22 text-anchor=%22middle%22%3EBlog Image%3C/text%3E%3C/svg%3E'">
                </div>
                <div class="blog-content">
                    <span class="post-category">Guide</span>
                    <h3>Setting Up Your First VPS: A Beginner's Guide</h3>
                    <p>Step-by-step instructions for deploying and configuring your first virtual private server.</p>
                    <div class="post-meta">
                        <span class="post-date">December 15, 2025</span>
                    </div>
                </div>
            </article>
            <article class="blog-card">
                <div class="blog-image">
                    <img src="assets/img/blog-5.jpg" alt="Blog Post" onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 400 250%22%3E%3Crect fill=%22%231a1a2e%22 width=%22400%22 height=%22250%22/%3E%3Ctext fill=%22%2310b981%22 font-family=%22system-ui%22 font-size=%2216%22 x=%22200%22 y=%22125%22 text-anchor=%22middle%22%3EBlog Image%3C/text%3E%3C/svg%3E'">
                </div>
                <div class="blog-content">
                    <span class="post-category">Game Servers</span>
                    <h3>Top 10 Rust Server Plugins for 2026</h3>
                    <p>The must-have Oxide plugins to enhance your Rust server experience this year.</p>
                    <div class="post-meta">
                        <span class="post-date">December 10, 2025</span>
                    </div>
                </div>
            </article>
            <article class="blog-card">
                <div class="blog-image">
                    <img src="assets/img/blog-6.jpg" alt="Blog Post" onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 400 250%22%3E%3Crect fill=%22%231a1a2e%22 width=%22400%22 height=%22250%22/%3E%3Ctext fill=%22%2310b981%22 font-family=%22system-ui%22 font-size=%2216%22 x=%22200%22 y=%22125%22 text-anchor=%22middle%22%3EBlog Image%3C/text%3E%3C/svg%3E'">
                </div>
                <div class="blog-content">
                    <span class="post-category">Performance</span>
                    <h3>NVMe vs SSD: Why Storage Speed Matters</h3>
                    <p>Understanding the performance difference and why we use NVMe across all services.</p>
                    <div class="post-meta">
                        <span class="post-date">December 5, 2025</span>
                    </div>
                </div>
            </article>
        </div>
        
        <div class="pagination">
            <a href="#" class="page-link active">1</a>
            <a href="#" class="page-link">2</a>
            <a href="#" class="page-link">3</a>
            <a href="#" class="page-link">Next →</a>
        </div>
    </div>
</section>

<!-- Newsletter -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content">
            <h2>Stay Updated</h2>
            <p>Subscribe to our newsletter for the latest news and tutorials.</p>
            <div class="subscribe-form">
                <input type="email" placeholder="Enter your email" class="subscribe-input">
                <button class="btn btn-primary">Subscribe</button>
            </div>
        </div>
    </div>
</section>

<?php
require_once __DIR__.'/partials/footer.php';
require_once __DIR__.'/partials/scripts.php';
?>
