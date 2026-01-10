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
    <?php echo getHeadContent('Invoices - Control Panel', 'View your invoices'); ?>
    <link rel="stylesheet" href="<?php echo $BASE_URL; ?>/assets/css/panel.css">
</head>
<body>
    <div class="panel-layout">
        <?php include __DIR__ . '/partials/sidebar.php'; ?>
        
        <div class="panel-main">
            <?php include __DIR__ . '/partials/topbar.php'; ?>
            
            <main class="panel-content">
                <div class="panel-page" data-animate="fadeIn">
                    <div class="mock-banner">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span><strong>Demo Mode</strong> - Showing mock data.</span>
                    </div>

                    <h1 class="panel-title">Invoices</h1>
                    
                    <div class="glass-card overflow-hidden">
                        <div class="table-wrapper">
                            <table class="data-table">
                                <thead>
                                    <tr>
                                        <th>Invoice</th>
                                        <th>Date</th>
                                        <th>Due Date</th>
                                        <th>Status</th>
                                        <th class="text-right">Total</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="invoices-table">
                                    <tr><td colspan="6" class="text-center py-8 text-muted">Loading...</td></tr>
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
        const BASE_URL = '<?php echo $BASE_URL; ?>';

        document.addEventListener('DOMContentLoaded', async function() {
            try {
                const invoices = await PanelAPI.getInvoices();
                renderInvoices(invoices);
            } catch (error) {
                console.error('Failed to load invoices:', error);
            }
        });

        function renderInvoices(invoices) {
            const tbody = document.getElementById('invoices-table');
            if (invoices.length === 0) {
                tbody.innerHTML = '<tr><td colspan="6" class="text-center py-8 text-muted">No invoices found</td></tr>';
                return;
            }

            const statusColors = {
                paid: 'badge-active',
                unpaid: 'badge-pending',
                overdue: 'badge-destructive',
                cancelled: 'badge-muted',
                refunded: 'badge-info'
            };

            tbody.innerHTML = invoices.map(inv => `
                <tr>
                    <td><a href="${BASE_URL}/panel/invoice.php?id=${inv.id}" class="font-mono text-primary hover:underline">${inv.id}</a></td>
                    <td class="text-muted">${inv.date}</td>
                    <td class="text-muted">${inv.dueDate}</td>
                    <td><span class="badge ${statusColors[inv.status] || 'badge-muted'}">${inv.status}</span></td>
                    <td class="text-right font-medium">$${inv.total.toFixed(2)}</td>
                    <td class="text-right">
                        <div class="action-buttons">
                            <a href="${BASE_URL}/panel/invoice.php?id=${inv.id}" class="action-btn" title="View">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            </a>
                            <button class="action-btn" title="Download">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                            </button>
                            ${(inv.status === 'unpaid' || inv.status === 'overdue') ? `
                            <button class="btn-glow btn-sm" onclick="payNow('${inv.id}')">Pay Now</button>
                            ` : ''}
                        </div>
                    </td>
                </tr>
            `).join('');
        }

        async function payNow(invoiceId) {
            try {
                const result = await PanelAPI.getInvoicePayLink(invoiceId);
                if (result.url) {
                    window.open(result.url, '_blank');
                }
            } catch (error) {
                alert('Failed to get payment link');
            }
        }
    </script>
</body>
</html>
