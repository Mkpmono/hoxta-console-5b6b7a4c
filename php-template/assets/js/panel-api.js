/**
 * Panel API - Mock Mode + WHMCS Ready
 * Provides mock data for demo, switchable to real WHMCS via PHP proxy
 */
const PanelAPI = (function() {
    // Mock mode is ON by default
    let mockMode = true;
    const API_BASE = window.BASE_URL ? window.BASE_URL + '/panel/api/whmcs.php' : '/panel/api/whmcs.php';

    // Simulated delay
    const delay = (ms) => new Promise(r => setTimeout(r, ms));

    // ============ MOCK DATA ============
    const mockData = {
        services: [
            { id: 'SVC001', name: 'Minecraft Server - Pro', type: 'game', status: 'active', price: 15.99, billingCycle: 'Monthly', nextDue: '2026-02-10', ip: '45.12.34.56:25565', domain: 'mc.demo-server.com' },
            { id: 'SVC002', name: 'VPS Standard', type: 'vps', status: 'active', price: 12.99, billingCycle: 'Monthly', nextDue: '2026-02-05', ip: '45.12.34.57' },
            { id: 'SVC003', name: 'Web Hosting - Professional', type: 'web', status: 'active', price: 6.99, billingCycle: 'Monthly', nextDue: '2026-02-15', domain: 'demo-website.com' },
            { id: 'SVC004', name: 'FiveM Server', type: 'game', status: 'pending', price: 29.99, billingCycle: 'Monthly', nextDue: '2026-02-01' }
        ],
        serviceDetails: {
            'SVC001': { id: 'SVC001', name: 'Minecraft Server - Pro', type: 'game', status: 'active', price: 15.99, billingCycle: 'Monthly', nextDue: '2026-02-10', ip: '45.12.34.56:25565', domain: 'mc.demo-server.com', description: 'High-performance Minecraft server with 8GB RAM, NVMe storage, and DDoS protection.', createdAt: '2025-06-15', packageName: 'Minecraft Pro', serverName: 'Game Server EU-1' },
            'SVC002': { id: 'SVC002', name: 'VPS Standard', type: 'vps', status: 'active', price: 12.99, billingCycle: 'Monthly', nextDue: '2026-02-05', ip: '45.12.34.57', description: 'Virtual Private Server with 4 vCPU, 8GB RAM, 100GB NVMe SSD.', createdAt: '2025-08-20', packageName: 'VPS Standard', serverName: 'VPS Cluster EU-2' },
            'SVC003': { id: 'SVC003', name: 'Web Hosting - Professional', type: 'web', status: 'active', price: 6.99, billingCycle: 'Monthly', nextDue: '2026-02-15', domain: 'demo-website.com', description: 'Professional web hosting with unlimited bandwidth and free SSL.', createdAt: '2025-09-01', packageName: 'Web Pro', serverName: 'Web Server EU-1' },
            'SVC004': { id: 'SVC004', name: 'FiveM Server', type: 'game', status: 'pending', price: 29.99, billingCycle: 'Monthly', nextDue: '2026-02-01', description: 'FiveM roleplay server with 64 slots and custom framework support.', createdAt: '2026-01-01', packageName: 'FiveM Standard' }
        },
        orders: [
            { id: 'ORD001', date: '2026-01-08', product: 'Minecraft Server - Pro', status: 'completed', total: 15.99 },
            { id: 'ORD002', date: '2026-01-05', product: 'VPS Standard', status: 'active', total: 12.99 },
            { id: 'ORD003', date: '2026-01-03', product: 'Web Hosting - Professional', status: 'completed', total: 6.99 },
            { id: 'ORD004', date: '2026-01-01', product: 'FiveM Server', status: 'pending', total: 29.99 }
        ],
        invoices: [
            { id: 'INV001', date: '2026-01-10', dueDate: '2026-02-10', status: 'unpaid', subtotal: 15.99, tax: 0, total: 15.99, credit: 0, items: [{ id: 'ITEM001', description: 'Minecraft Server - Pro (01/10/2026 - 02/10/2026)', amount: 15.99 }] },
            { id: 'INV002', date: '2026-01-05', dueDate: '2026-02-05', datePaid: '2026-01-05', status: 'paid', subtotal: 12.99, tax: 0, total: 12.99, credit: 0, paymentMethod: 'Stripe', items: [{ id: 'ITEM002', description: 'VPS Standard (01/05/2026 - 02/05/2026)', amount: 12.99 }] },
            { id: 'INV003', date: '2025-12-15', dueDate: '2026-01-15', datePaid: '2025-12-16', status: 'paid', subtotal: 6.99, tax: 0, total: 6.99, credit: 0, paymentMethod: 'PayPal', items: [{ id: 'ITEM003', description: 'Web Hosting - Professional (12/15/2025 - 01/15/2026)', amount: 6.99 }] },
            { id: 'INV004', date: '2025-12-01', dueDate: '2026-01-01', status: 'overdue', subtotal: 29.99, tax: 0, total: 29.99, credit: 0, items: [{ id: 'ITEM004', description: 'FiveM Server (12/01/2025 - 01/01/2026)', amount: 29.99 }], notes: 'Payment overdue. Please pay to avoid service suspension.' }
        ],
        tickets: [
            { id: 'TKT001', subject: 'Server not starting', status: 'open', priority: 'high', department: 'Technical Support', lastReply: '2026-01-10 14:30', createdAt: '2026-01-10 10:00', messages: [{ id: 'MSG001', sender: 'Demo Client', senderType: 'client', message: "My Minecraft server won't start after the latest update. I get an error about Java version.", date: '2026-01-10 10:00' }, { id: 'MSG002', sender: 'Support Team', senderType: 'admin', message: 'Thank you for reaching out. Could you please share the error log from your control panel?', date: '2026-01-10 14:30' }] },
            { id: 'TKT002', subject: 'Upgrade VPS plan', status: 'answered', priority: 'medium', department: 'Sales', lastReply: '2026-01-09 16:00', createdAt: '2026-01-09 09:00', messages: [{ id: 'MSG003', sender: 'Demo Client', senderType: 'client', message: "I'd like to upgrade my VPS to the Pro plan. What's the process?", date: '2026-01-09 09:00' }, { id: 'MSG004', sender: 'Support Team', senderType: 'admin', message: 'You can upgrade directly from your panel. Go to Services > Your VPS > Upgrade.', date: '2026-01-09 16:00' }] }
        ]
    };

    // ============ MOCK API METHODS ============
    async function mockRequest(endpoint, options = {}) {
        await delay(200 + Math.random() * 300);

        if (endpoint === '/services') return mockData.services;
        if (endpoint.startsWith('/services/') && !endpoint.includes('/')) {
            const id = endpoint.split('/')[2];
            return mockData.serviceDetails[id] || mockData.services.find(s => s.id === id);
        }
        if (endpoint === '/orders') return mockData.orders;
        if (endpoint === '/invoices') return mockData.invoices;
        if (endpoint.startsWith('/invoices/') && endpoint.endsWith('/paylink')) {
            const id = endpoint.split('/')[2];
            return { url: 'https://demo.whmcs.com/pay/invoice/' + id };
        }
        if (endpoint.startsWith('/invoices/')) {
            const id = endpoint.split('/')[2];
            return mockData.invoices.find(i => i.id === id);
        }
        if (endpoint === '/tickets') return mockData.tickets;
        if (endpoint.startsWith('/tickets/') && !endpoint.includes('reply')) {
            const id = endpoint.split('/')[2];
            return mockData.tickets.find(t => t.id === id);
        }
        if (endpoint.includes('/reply')) return { success: true };
        if (endpoint.includes('/cancel')) return { success: true, ticketId: 'TKT' + Date.now() };
        if (endpoint === '/tickets' && options.method === 'POST') return { success: true, ticketId: 'TKT' + Date.now() };

        throw new Error('Unknown endpoint: ' + endpoint);
    }

    // ============ PUBLIC API ============
    return {
        setMockMode: (val) => { mockMode = val; },
        isMockMode: () => mockMode,

        getServices: () => mockRequest('/services'),
        getServiceDetails: (id) => mockRequest('/services/' + id),
        requestCancellation: (id, data) => mockRequest('/services/' + id + '/cancel', { method: 'POST', body: data }),

        getOrders: () => mockRequest('/orders'),

        getInvoices: () => mockRequest('/invoices'),
        getInvoice: (id) => mockRequest('/invoices/' + id),
        getInvoicePayLink: (id) => mockRequest('/invoices/' + id + '/paylink', { method: 'POST' }),

        getTickets: () => mockRequest('/tickets'),
        getTicket: (id) => mockRequest('/tickets/' + id),
        createTicket: (data) => mockRequest('/tickets', { method: 'POST', body: data }),
        replyTicket: (id, data) => mockRequest('/tickets/' + id + '/reply', { method: 'POST', body: data })
    };
})();
