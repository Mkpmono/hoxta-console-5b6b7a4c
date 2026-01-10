<?php
session_start();
require_once __DIR__ . '/../partials/head.php';

if (!isset($_SESSION['demo_user'])) {
    header('Location: ' . $BASE_URL . '/panel/login.php');
    exit;
}
$user = $_SESSION['demo_user'];
$ticketId = $_GET['id'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo getHeadContent('Ticket Details - Control Panel', 'View ticket conversation'); ?>
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
                        <a href="<?php echo $BASE_URL; ?>/panel/tickets.php" class="back-btn">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                        </a>
                        <div class="flex-1">
                            <h1 class="panel-title">Ticket #<?php echo htmlspecialchars($ticketId); ?></h1>
                            <p class="panel-subtitle" id="ticket-department"></p>
                        </div>
                    </div>

                    <div id="ticket-content">
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
        const ticketId = '<?php echo htmlspecialchars($ticketId); ?>';
        let currentTicket = null;

        document.addEventListener('DOMContentLoaded', async function() {
            if (!ticketId) {
                window.location.href = BASE_URL + '/panel/tickets.php';
                return;
            }
            try {
                currentTicket = await PanelAPI.getTicket(ticketId);
                document.getElementById('ticket-department').textContent = currentTicket.department;
                renderTicket(currentTicket);
            } catch (error) {
                console.error('Failed to load ticket:', error);
                document.getElementById('ticket-content').innerHTML = `
                    <div class="glass-card p-12 text-center">
                        <p class="text-muted">Ticket not found</p>
                        <a href="${BASE_URL}/panel/tickets.php" class="text-primary mt-2">Back to Tickets</a>
                    </div>
                `;
            }
        });

        function renderTicket(ticket) {
            const statusColors = {
                'open': 'badge-pending',
                'answered': 'badge-active',
                'customer-reply': 'badge-primary',
                'closed': 'badge-muted'
            };

            const priorityColors = {
                'high': 'badge-destructive',
                'medium': 'badge-pending',
                'low': 'badge-muted'
            };

            document.getElementById('ticket-content').innerHTML = `
                <!-- Ticket Info -->
                <div class="glass-card p-6 mb-6">
                    <div class="ticket-header">
                        <div>
                            <h2 class="text-xl font-semibold">${ticket.subject}</h2>
                            <div class="flex items-center gap-2 mt-2 flex-wrap">
                                <span class="badge ${statusColors[ticket.status] || 'badge-muted'}">${ticket.status.replace('-', ' ')}</span>
                                <span class="badge ${priorityColors[ticket.priority] || 'badge-muted'}">${ticket.priority} priority</span>
                            </div>
                        </div>
                        <div class="text-right text-sm text-muted">
                            <p>Created: ${ticket.createdAt}</p>
                            <p>Last Reply: ${ticket.lastReply}</p>
                        </div>
                    </div>
                </div>

                <!-- Messages -->
                <div class="messages-container mb-6">
                    ${(ticket.messages || []).map(msg => `
                    <div class="message ${msg.senderType === 'admin' ? 'message-admin' : 'message-client'}">
                        <div class="message-header">
                            <div class="message-sender">
                                <div class="sender-icon ${msg.senderType === 'admin' ? 'sender-admin' : ''}">
                                    ${msg.senderType === 'admin' 
                                        ? '<svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>'
                                        : '<svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>'}
                                </div>
                                <span class="${msg.senderType === 'admin' ? 'text-primary' : ''}">${msg.sender}</span>
                            </div>
                            <div class="message-date">
                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                ${msg.date}
                            </div>
                        </div>
                        <p class="message-text">${msg.message}</p>
                    </div>
                    `).join('')}
                </div>

                <!-- Reply Box -->
                ${ticket.status !== 'closed' ? `
                <div class="glass-card p-6">
                    <h3 class="font-semibold mb-4">Reply to Ticket</h3>
                    <textarea id="reply-message" rows="4" placeholder="Type your reply..."></textarea>
                    <div class="flex justify-end mt-4">
                        <button class="btn-glow" onclick="sendReply()">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                            Send Reply
                        </button>
                    </div>
                </div>
                ` : `
                <div class="glass-card p-6 text-center">
                    <svg class="w-8 h-8 text-muted mx-auto mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                    <p class="text-muted">This ticket is closed</p>
                    <a href="${BASE_URL}/panel/new-ticket.php" class="text-primary text-sm mt-2 inline-block">Open a new ticket</a>
                </div>
                `}
            `;
        }

        async function sendReply() {
            const message = document.getElementById('reply-message').value.trim();
            if (!message) {
                alert('Please enter a message');
                return;
            }

            try {
                await PanelAPI.replyTicket(ticketId, { message });
                
                // Add message to local state and re-render
                currentTicket.messages = currentTicket.messages || [];
                currentTicket.messages.push({
                    id: 'MSG' + Date.now(),
                    sender: '<?php echo $user['name']; ?>',
                    senderType: 'client',
                    message: message,
                    date: new Date().toLocaleString()
                });
                currentTicket.status = 'customer-reply';
                currentTicket.lastReply = new Date().toLocaleString();
                
                renderTicket(currentTicket);
                alert('Reply sent successfully');
            } catch (error) {
                alert('Failed to send reply');
            }
        }
    </script>
</body>
</html>
