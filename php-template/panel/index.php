<?php
/**
 * Panel Dashboard
 * Redirects to login or shows dashboard based on session
 */
session_start();
require_once __DIR__ . '/../partials/head.php';

// Check for demo session
$isLoggedIn = isset($_SESSION['demo_user']);
$user = $isLoggedIn ? $_SESSION['demo_user'] : null;

if (!$isLoggedIn) {
    header('Location: ' . $BASE_URL . '/panel/login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo getHeadContent('Dashboard - Control Panel', 'Manage your hosting services'); ?>
    <link rel="stylesheet" href="<?php echo $BASE_URL; ?>/assets/css/panel.css">
</head>
<body>
    <div class="panel-layout">
        <?php include __DIR__ . '/partials/sidebar.php'; ?>
        
        <div class="panel-main">
            <?php include __DIR__ . '/partials/topbar.php'; ?>
            
            <main class="panel-content">
                <div class="panel-page" data-animate="fadeIn">
                    <h1 class="panel-title">Dashboard</h1>

                    <!-- Stats Grid -->
                    <div class="stats-grid">
                        <div class="stat-card" data-animate="fadeUp" data-delay="0">
                            <div class="stat-icon text-green">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"/></svg>
                            </div>
                            <div class="stat-info">
                                <p class="stat-value" id="stat-services">3</p>
                                <p class="stat-label">Active Services</p>
                            </div>
                        </div>
                        <div class="stat-card" data-animate="fadeUp" data-delay="100">
                            <div class="stat-icon text-yellow">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                            </div>
                            <div class="stat-info">
                                <p class="stat-value" id="stat-orders">1</p>
                                <p class="stat-label">Pending Orders</p>
                            </div>
                        </div>
                        <div class="stat-card" data-animate="fadeUp" data-delay="200">
                            <div class="stat-icon text-red">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            </div>
                            <div class="stat-info">
                                <p class="stat-value" id="stat-invoices">2</p>
                                <p class="stat-label">Unpaid Invoices</p>
                            </div>
                        </div>
                        <div class="stat-card" data-animate="fadeUp" data-delay="300">
                            <div class="stat-icon text-primary">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                            </div>
                            <div class="stat-info">
                                <p class="stat-value" id="stat-tickets">1</p>
                                <p class="stat-label">Open Tickets</p>
                            </div>
                        </div>
                    </div>

                    <div class="dashboard-grid">
                        <!-- Recent Services -->
                        <div class="glass-card p-5">
                            <div class="card-header">
                                <h2 class="card-title">Your Services</h2>
                                <a href="<?php echo $BASE_URL; ?>/panel/services.php" class="card-link">View all</a>
                            </div>
                            <div class="services-list" id="services-list">
                                <!-- Populated by JS -->
                            </div>
                        </div>

                        <!-- Recent Tickets -->
                        <div class="glass-card p-5">
                            <div class="card-header">
                                <h2 class="card-title">Recent Tickets</h2>
                                <a href="<?php echo $BASE_URL; ?>/panel/tickets.php" class="card-link">View all</a>
                            </div>
                            <div class="tickets-list" id="tickets-list">
                                <!-- Populated by JS -->
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="<?php echo $BASE_URL; ?>/assets/js/panel-api.js"></script>
    <script src="<?php echo $BASE_URL; ?>/assets/js/panel.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Load dashboard data
            loadDashboardData();
        });

        async function loadDashboardData() {
            try {
                const [services, tickets, invoices, orders] = await Promise.all([
                    PanelAPI.getServices(),
                    PanelAPI.getTickets(),
                    PanelAPI.getInvoices(),
                    PanelAPI.getOrders()
                ]);

                // Update stats
                document.getElementById('stat-services').textContent = services.filter(s => s.status === 'active').length;
                document.getElementById('stat-orders').textContent = orders.filter(o => o.status === 'pending').length;
                document.getElementById('stat-invoices').textContent = invoices.filter(i => i.status === 'unpaid' || i.status === 'overdue').length;
                document.getElementById('stat-tickets').textContent = tickets.filter(t => t.status === 'open' || t.status === 'customer-reply').length;

                // Render services
                const servicesList = document.getElementById('services-list');
                servicesList.innerHTML = services.slice(0, 3).map(service => `
                    <div class="list-item">
                        <div class="list-item-info">
                            <p class="list-item-title">${service.name}</p>
                            <p class="list-item-subtitle">Due: ${service.nextDue}</p>
                        </div>
                        <span class="badge badge-${service.status}">${service.status}</span>
                    </div>
                `).join('');

                // Render tickets
                const ticketsList = document.getElementById('tickets-list');
                ticketsList.innerHTML = tickets.slice(0, 3).map(ticket => `
                    <div class="list-item">
                        <div class="list-item-icon">
                            ${ticket.status === 'open' ? '<svg class="w-4 h-4 text-yellow" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>' : '<svg class="w-4 h-4 text-green" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>'}
                        </div>
                        <div class="list-item-info">
                            <p class="list-item-title">${ticket.subject}</p>
                            <p class="list-item-subtitle">${ticket.department}</p>
                        </div>
                        <span class="badge badge-${ticket.status}">${ticket.status.replace('-', ' ')}</span>
                    </div>
                `).join('');

            } catch (error) {
                console.error('Failed to load dashboard data:', error);
            }
        }
    </script>
</body>
</html>
