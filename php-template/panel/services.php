<?php
session_start();
require_once __DIR__ . '/../partials/head.php';

if (!isset($_SESSION['demo_user'])) {
    header('Location: ' . $BASE_URL . '/panel/login.php');
    exit;
}
$user = $_SESSION['demo_user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo getHeadContent('My Services - Control Panel', 'View and manage your services'); ?>
    <link rel="stylesheet" href="<?php echo $BASE_URL; ?>/assets/css/panel.css">
</head>
<body>
    <div class="panel-layout">
        <?php include __DIR__ . '/partials/sidebar.php'; ?>
        
        <div class="panel-main">
            <?php include __DIR__ . '/partials/topbar.php'; ?>
            
            <main class="panel-content">
                <div class="panel-page" data-animate="fadeIn">
                    <!-- Mock Mode Banner -->
                    <div class="mock-banner">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span><strong>Demo Mode</strong> - Showing mock data. Connect WHMCS for real data.</span>
                    </div>

                    <h1 class="panel-title">My Services</h1>
                    
                    <div class="services-grid" id="services-grid">
                        <!-- Loading skeleton -->
                        <div class="service-card skeleton-card">
                            <div class="skeleton skeleton-text w-3/4"></div>
                            <div class="skeleton skeleton-text w-1/2 mt-2"></div>
                        </div>
                        <div class="service-card skeleton-card">
                            <div class="skeleton skeleton-text w-3/4"></div>
                            <div class="skeleton skeleton-text w-1/2 mt-2"></div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="<?php echo $BASE_URL; ?>/assets/js/panel-api.js"></script>
    <script src="<?php echo $BASE_URL; ?>/assets/js/panel.js"></script>
    <script>
        const BASE_URL = '<?php echo $BASE_URL; ?>';
        
        document.addEventListener('DOMContentLoaded', async function() {
            try {
                const services = await PanelAPI.getServices();
                renderServices(services);
            } catch (error) {
                console.error('Failed to load services:', error);
            }
        });

        function renderServices(services) {
            const grid = document.getElementById('services-grid');
            if (services.length === 0) {
                grid.innerHTML = '<div class="glass-card p-12 text-center text-muted">No services found</div>';
                return;
            }

            grid.innerHTML = services.map(service => `
                <div class="service-card glass-card">
                    <div class="service-card-content">
                        <div class="service-info">
                            <div class="service-icon">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"/></svg>
                            </div>
                            <div>
                                <h3 class="service-name">${service.name}</h3>
                                <p class="service-ip">${service.ip || 'No IP assigned'}</p>
                                <div class="service-meta">
                                    <span>ID: ${service.id}</span>
                                    <span>Due: ${service.nextDue}</span>
                                    <span>$${service.price.toFixed(2)}/mo</span>
                                </div>
                            </div>
                        </div>
                        <div class="service-actions">
                            <span class="badge badge-${service.status}">${service.status}</span>
                            <a href="${BASE_URL}/panel/service.php?id=${service.id}" class="action-btn" title="Manage">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </a>
                            <button class="action-btn primary" title="Control Panel">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                            </button>
                        </div>
                    </div>
                </div>
            `).join('');
        }
    </script>
</body>
</html>
