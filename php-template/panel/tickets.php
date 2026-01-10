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
    <?php echo getHeadContent('Support Tickets - Control Panel', 'Manage your support tickets'); ?>
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
                        <h1 class="panel-title">Support Tickets</h1>
                        <a href="<?php echo $BASE_URL; ?>/panel/new-ticket.php" class="btn-glow">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                            New Ticket
                        </a>
                    </div>

                    <!-- Search and Filter -->
                    <div class="filter-bar mb-6">
                        <div class="search-input">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                            <input type="text" id="search-input" placeholder="Search tickets..." />
                        </div>
                        <div class="filter-select">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/></svg>
                            <select id="status-filter">
                                <option value="all">All Status</option>
                                <option value="open">Open</option>
                                <option value="answered">Answered</option>
                                <option value="customer-reply">Customer Reply</option>
                                <option value="closed">Closed</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="glass-card overflow-hidden">
                        <div class="table-wrapper">
                            <table class="data-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Subject</th>
                                        <th>Department</th>
                                        <th>Status</th>
                                        <th>Priority</th>
                                        <th>Last Reply</th>
                                    </tr>
                                </thead>
                                <tbody id="tickets-table">
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
        let allTickets = [];

        document.addEventListener('DOMContentLoaded', async function() {
            try {
                allTickets = await PanelAPI.getTickets();
                renderTickets(allTickets);
            } catch (error) {
                console.error('Failed to load tickets:', error);
            }

            // Search and filter
            document.getElementById('search-input').addEventListener('input', filterTickets);
            document.getElementById('status-filter').addEventListener('change', filterTickets);
        });

        function filterTickets() {
            const search = document.getElementById('search-input').value.toLowerCase();
            const status = document.getElementById('status-filter').value;

            const filtered = allTickets.filter(ticket => {
                const matchesSearch = !search || 
                    ticket.subject.toLowerCase().includes(search) ||
                    ticket.id.toLowerCase().includes(search);
                const matchesStatus = status === 'all' || ticket.status === status;
                return matchesSearch && matchesStatus;
            });

            renderTickets(filtered);
        }

        function renderTickets(tickets) {
            const tbody = document.getElementById('tickets-table');
            if (tickets.length === 0) {
                tbody.innerHTML = '<tr><td colspan="6" class="text-center py-8 text-muted">No tickets found</td></tr>';
                return;
            }

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

            tbody.innerHTML = tickets.map(ticket => `
                <tr class="cursor-pointer hover:bg-muted-dim" onclick="window.location.href='${BASE_URL}/panel/ticket.php?id=${ticket.id}'">
                    <td><span class="font-mono text-primary">${ticket.id}</span></td>
                    <td class="text-foreground">${ticket.subject}</td>
                    <td class="text-muted">${ticket.department}</td>
                    <td><span class="badge ${statusColors[ticket.status] || 'badge-muted'}">${ticket.status.replace('-', ' ')}</span></td>
                    <td><span class="badge ${priorityColors[ticket.priority] || 'badge-muted'}">${ticket.priority}</span></td>
                    <td class="text-muted">${ticket.lastReply}</td>
                </tr>
            `).join('');
        }
    </script>
</body>
</html>
