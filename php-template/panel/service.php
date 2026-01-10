<?php
session_start();
require_once __DIR__ . '/../partials/head.php';

if (!isset($_SESSION['demo_user'])) {
    header('Location: ' . $BASE_URL . '/panel/login.php');
    exit;
}
$user = $_SESSION['demo_user'];
$serviceId = $_GET['id'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo getHeadContent('Service Details - Control Panel', 'Manage your service'); ?>
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
                    <div class="page-header">
                        <a href="<?php echo $BASE_URL; ?>/panel/services.php" class="back-btn">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                        </a>
                        <div>
                            <h1 class="panel-title">Service Details</h1>
                            <p class="panel-subtitle">Manage your service</p>
                        </div>
                    </div>

                    <div id="service-content">
                        <!-- Loading -->
                        <div class="glass-card p-6">
                            <div class="skeleton skeleton-text w-1/2 mb-4"></div>
                            <div class="skeleton skeleton-text w-3/4"></div>
                        </div>
                    </div>

                    <!-- Cancel Modal -->
                    <div id="cancel-modal" class="modal hidden">
                        <div class="modal-backdrop"></div>
                        <div class="modal-content glass-card p-6">
                            <div class="modal-header text-destructive">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                                <h2>Request Cancellation</h2>
                            </div>
                            <p class="text-muted text-sm mb-4">Are you sure you want to cancel this service?</p>
                            <div class="form-group">
                                <label>Cancellation Type</label>
                                <div class="radio-group">
                                    <label class="radio-option">
                                        <input type="radio" name="cancelType" value="end_of_billing" checked />
                                        <div class="radio-content">
                                            <p class="radio-title">End of Billing Period</p>
                                            <p class="radio-desc">Service remains active until <span id="cancel-date">N/A</span></p>
                                        </div>
                                    </label>
                                    <label class="radio-option">
                                        <input type="radio" name="cancelType" value="immediate" />
                                        <div class="radio-content">
                                            <p class="radio-title">Immediate</p>
                                            <p class="radio-desc">Cancel immediately (no refund)</p>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Reason for Cancellation</label>
                                <textarea id="cancel-reason" rows="3" placeholder="Please tell us why you're cancelling..."></textarea>
                            </div>
                            <div class="modal-actions">
                                <button class="btn-outline" onclick="closeModal()">Keep Service</button>
                                <button class="btn-destructive" onclick="submitCancellation()">Confirm Cancellation</button>
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
        const BASE_URL = '<?php echo $BASE_URL; ?>';
        const serviceId = '<?php echo htmlspecialchars($serviceId); ?>';
        let currentService = null;

        document.addEventListener('DOMContentLoaded', async function() {
            if (!serviceId) {
                window.location.href = BASE_URL + '/panel/services.php';
                return;
            }
            try {
                currentService = await PanelAPI.getServiceDetails(serviceId);
                renderService(currentService);
            } catch (error) {
                console.error('Failed to load service:', error);
                document.getElementById('service-content').innerHTML = `
                    <div class="glass-card p-12 text-center">
                        <p class="text-muted">Service not found</p>
                        <a href="${BASE_URL}/panel/services.php" class="text-primary mt-2">Back to Services</a>
                    </div>
                `;
            }
        });

        function renderService(service) {
            const statusColors = {
                active: 'badge-active',
                pending: 'badge-pending',
                suspended: 'badge-suspended',
                cancelled: 'badge-cancelled'
            };

            document.getElementById('service-content').innerHTML = `
                <!-- Service Info Card -->
                <div class="glass-card p-6 mb-6">
                    <div class="service-detail-header">
                        <div class="service-detail-info">
                            <div class="service-icon large">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"/></svg>
                            </div>
                            <div>
                                <h2 class="text-xl font-semibold">${service.name}</h2>
                                <p class="text-muted text-sm mt-1">${service.description || ''}</p>
                                <div class="flex items-center gap-2 mt-2">
                                    <span class="badge ${statusColors[service.status] || 'badge-cancelled'}">${service.status}</span>
                                    <span class="text-xs text-muted">ID: ${service.id}</span>
                                </div>
                            </div>
                        </div>
                        <div class="service-detail-actions">
                            <a href="${BASE_URL}/panel/upgrade.php?id=${service.id}" class="btn-outline">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 11l3-3m0 0l3 3m-3-3v8m0-13a9 9 0 110 18 9 9 0 010-18z"/></svg>
                                Upgrade
                            </a>
                            <button class="btn-destructive-outline" onclick="showCancelModal()">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                Cancel
                            </button>
                        </div>
                    </div>

                    <!-- Details Grid -->
                    <div class="details-grid mt-6">
                        ${service.domain ? `
                        <div class="detail-box">
                            <div class="detail-label"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg> Domain</div>
                            <p class="detail-value">${service.domain}</p>
                        </div>
                        ` : ''}
                        ${service.ip ? `
                        <div class="detail-box">
                            <div class="detail-label"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"/></svg> IP Address</div>
                            <p class="detail-value font-mono">${service.ip}</p>
                        </div>
                        ` : ''}
                        <div class="detail-box">
                            <div class="detail-label"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg> Next Due Date</div>
                            <p class="detail-value">${service.nextDue}</p>
                        </div>
                        <div class="detail-box">
                            <div class="detail-label"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg> Price</div>
                            <p class="detail-value">$${service.price.toFixed(2)} / ${service.billingCycle}</p>
                        </div>
                    </div>
                </div>

                <!-- Additional Info -->
                <div class="grid-2">
                    <div class="glass-card p-6">
                        <h3 class="card-title flex items-center gap-2">
                            <svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"/></svg>
                            Product Information
                        </h3>
                        <div class="info-list">
                            <div class="info-row"><span class="text-muted">Package</span><span>${service.packageName}</span></div>
                            <div class="info-row"><span class="text-muted">Billing Cycle</span><span>${service.billingCycle}</span></div>
                            <div class="info-row"><span class="text-muted">Created</span><span>${service.createdAt}</span></div>
                            ${service.serverName ? `<div class="info-row"><span class="text-muted">Server</span><span>${service.serverName}</span></div>` : ''}
                        </div>
                    </div>

                    <div class="glass-card p-6">
                        <h3 class="card-title flex items-center gap-2">
                            <svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            Quick Actions
                        </h3>
                        <div class="quick-actions">
                            <button class="quick-action-btn">View Control Panel</button>
                            <button class="quick-action-btn">Manage DNS</button>
                            <button class="quick-action-btn">View Logs</button>
                            <a href="${BASE_URL}/panel/new-ticket.php" class="quick-action-btn">Get Support</a>
                        </div>
                    </div>
                </div>
            `;

            // Update modal date
            document.getElementById('cancel-date').textContent = service.nextDue;
        }

        function showCancelModal() {
            document.getElementById('cancel-modal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('cancel-modal').classList.add('hidden');
        }

        async function submitCancellation() {
            const type = document.querySelector('input[name="cancelType"]:checked').value;
            const reason = document.getElementById('cancel-reason').value;
            
            if (!reason.trim()) {
                alert('Please provide a reason for cancellation');
                return;
            }

            try {
                await PanelAPI.requestCancellation(serviceId, { type, reason });
                alert('Cancellation request submitted. A support ticket has been created.');
                closeModal();
            } catch (error) {
                alert('Failed to submit cancellation request');
            }
        }
    </script>
</body>
</html>
