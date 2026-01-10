<?php
session_start();
require_once __DIR__ . '/../partials/head.php';

if (!isset($_SESSION['demo_user'])) {
    header('Location: ' . $BASE_URL . '/panel/login.php');
    exit;
}
$user = $_SESSION['demo_user'];
$invoiceId = $_GET['id'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo getHeadContent('Invoice Details - Control Panel', 'View invoice details'); ?>
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

                    <!-- Header -->
                    <div class="page-header" id="invoice-header">
                        <a href="<?php echo $BASE_URL; ?>/panel/invoices.php" class="back-btn">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                        </a>
                        <div class="flex-1">
                            <h1 class="panel-title">Invoice <?php echo htmlspecialchars($invoiceId); ?></h1>
                            <p class="panel-subtitle">View invoice details</p>
                        </div>
                        <div id="header-actions"></div>
                    </div>

                    <div id="invoice-content">
                        <div class="glass-card p-6">
                            <div class="skeleton skeleton-text w-1/2 mb-4"></div>
                            <div class="skeleton skeleton-text w-3/4"></div>
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
        const invoiceId = '<?php echo htmlspecialchars($invoiceId); ?>';

        document.addEventListener('DOMContentLoaded', async function() {
            if (!invoiceId) {
                window.location.href = BASE_URL + '/panel/invoices.php';
                return;
            }
            try {
                const invoice = await PanelAPI.getInvoice(invoiceId);
                renderInvoice(invoice);
            } catch (error) {
                console.error('Failed to load invoice:', error);
                document.getElementById('invoice-content').innerHTML = `
                    <div class="glass-card p-12 text-center">
                        <p class="text-muted">Invoice not found</p>
                        <a href="${BASE_URL}/panel/invoices.php" class="text-primary mt-2">Back to Invoices</a>
                    </div>
                `;
            }
        });

        function renderInvoice(invoice) {
            const statusConfig = {
                paid: { color: 'text-green', bg: 'bg-green-dim' },
                unpaid: { color: 'text-yellow', bg: 'bg-yellow-dim' },
                overdue: { color: 'text-red', bg: 'bg-red-dim' },
                cancelled: { color: 'text-muted', bg: 'bg-muted' },
                refunded: { color: 'text-blue', bg: 'bg-blue-dim' }
            };

            const config = statusConfig[invoice.status] || statusConfig.cancelled;

            // Update header actions
            if (invoice.status === 'unpaid' || invoice.status === 'overdue') {
                document.getElementById('header-actions').innerHTML = `
                    <button class="btn-glow" onclick="payNow()">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                        Pay Now
                    </button>
                `;
            }

            document.getElementById('invoice-content').innerHTML = `
                <!-- Invoice Header -->
                <div class="glass-card p-6 mb-6">
                    <div class="invoice-header">
                        <div class="invoice-header-info">
                            <div class="invoice-icon ${config.bg}">
                                <svg class="w-6 h-6 ${config.color}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            </div>
                            <div>
                                <h2 class="text-xl font-semibold">Invoice #${invoice.id}</h2>
                                <div class="flex items-center gap-2 mt-2">
                                    <span class="badge ${config.bg} ${config.color}">${invoice.status}</span>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-total text-right">
                            <p class="text-3xl font-bold">$${invoice.total.toFixed(2)}</p>
                            ${invoice.status === 'paid' && invoice.datePaid ? `<p class="text-sm text-green mt-1">Paid on ${invoice.datePaid}</p>` : ''}
                        </div>
                    </div>

                    <!-- Dates Grid -->
                    <div class="details-grid mt-6">
                        <div class="detail-box">
                            <div class="detail-label"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg> Invoice Date</div>
                            <p class="detail-value">${invoice.date}</p>
                        </div>
                        <div class="detail-box">
                            <div class="detail-label"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg> Due Date</div>
                            <p class="detail-value ${invoice.status === 'overdue' ? 'text-red' : ''}">${invoice.dueDate}</p>
                        </div>
                        ${invoice.paymentMethod ? `
                        <div class="detail-box">
                            <div class="detail-label"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg> Payment Method</div>
                            <p class="detail-value">${invoice.paymentMethod}</p>
                        </div>
                        ` : ''}
                    </div>
                </div>

                <!-- Invoice Items -->
                <div class="glass-card overflow-hidden mb-6">
                    <div class="card-section-header">
                        <h3 class="font-semibold">Invoice Items</h3>
                    </div>
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th class="text-right">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            ${invoice.items.map(item => `
                            <tr>
                                <td>${item.description}</td>
                                <td class="text-right font-medium">$${item.amount.toFixed(2)}</td>
                            </tr>
                            `).join('')}
                        </tbody>
                    </table>
                    <div class="invoice-totals">
                        <div class="totals-row"><span class="text-muted">Subtotal</span><span>$${invoice.subtotal.toFixed(2)}</span></div>
                        ${invoice.tax > 0 ? `<div class="totals-row"><span class="text-muted">Tax</span><span>$${invoice.tax.toFixed(2)}</span></div>` : ''}
                        ${invoice.credit > 0 ? `<div class="totals-row"><span class="text-muted">Credit Applied</span><span class="text-green">-$${invoice.credit.toFixed(2)}</span></div>` : ''}
                        <hr />
                        <div class="totals-row total"><span class="font-medium">Total</span><span class="font-bold">$${invoice.total.toFixed(2)}</span></div>
                    </div>
                </div>

                ${invoice.notes ? `
                <div class="glass-card p-6 mb-6">
                    <h3 class="font-semibold mb-2">Notes</h3>
                    <p class="text-sm text-muted">${invoice.notes}</p>
                </div>
                ` : ''}

                <!-- Actions -->
                <div class="glass-card p-6">
                    <h3 class="font-semibold mb-4">Actions</h3>
                    <div class="flex flex-wrap gap-3">
                        <button class="btn-outline">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                            Download PDF
                        </button>
                        ${(invoice.status === 'unpaid' || invoice.status === 'overdue') ? `
                        <button class="btn-glow" onclick="payNow()">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                            Pay Online
                        </button>
                        ` : ''}
                        <a href="${BASE_URL}/panel/new-ticket.php" class="btn-outline">Billing Question?</a>
                    </div>
                </div>
            `;
        }

        async function payNow() {
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
