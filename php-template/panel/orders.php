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
    <?php echo getHeadContent('Orders - Control Panel', 'View your orders'); ?>
    <link rel="stylesheet" href="<?php echo $BASE_URL; ?>/assets/css/panel.css">
</head>
<body>
    <div class="panel-layout">
        <?php include __DIR__ . '/partials/sidebar.php'; ?>
        
        <div class="panel-main">
            <?php include __DIR__ . '/partials/topbar.php'; ?>
            
            <main class="panel-content">
                <div class="panel-page" data-animate="fadeIn">
                    <div class="page-header-row">
                        <h1 class="panel-title">Orders</h1>
                        <div class="order-count">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                            <span id="order-count">0 orders</span>
                        </div>
                    </div>
                    
                    <div class="glass-card overflow-hidden">
                        <div class="table-wrapper">
                            <table class="data-table">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Date</th>
                                        <th>Product</th>
                                        <th>Status</th>
                                        <th class="text-right">Total</th>
                                    </tr>
                                </thead>
                                <tbody id="orders-table">
                                    <tr><td colspan="5" class="text-center py-8 text-muted">Loading...</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="<?php echo $BASE_URL; ?>/assets/js/panel-api.js"></script>
    <script src="<?php echo $BASE_URL; ?>/assets/js/panel.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', async function() {
            try {
                const orders = await PanelAPI.getOrders();
                document.getElementById('order-count').textContent = orders.length + ' orders';
                renderOrders(orders);
            } catch (error) {
                console.error('Failed to load orders:', error);
            }
        });

        function renderOrders(orders) {
            const tbody = document.getElementById('orders-table');
            if (orders.length === 0) {
                tbody.innerHTML = '<tr><td colspan="5" class="text-center py-8 text-muted">No orders found</td></tr>';
                return;
            }

            const statusColors = {
                completed: 'badge-active',
                active: 'badge-primary',
                pending: 'badge-pending',
                cancelled: 'badge-cancelled',
                fraud: 'badge-destructive'
            };

            tbody.innerHTML = orders.map(order => `
                <tr>
                    <td class="font-mono text-primary">${order.id}</td>
                    <td class="text-muted">${order.date}</td>
                    <td>${order.product}</td>
                    <td><span class="badge ${statusColors[order.status] || 'badge-muted'}">${order.status}</span></td>
                    <td class="text-right">$${(order.total ?? 0).toFixed(2)}</td>
                </tr>
            `).join('');
        }
    </script>
</body>
</html>
