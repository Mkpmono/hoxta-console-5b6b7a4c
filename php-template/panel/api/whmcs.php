<?php
/**
 * WHMCS API Proxy
 * Handles requests from frontend and forwards to WHMCS API
 * Credentials are stored server-side, never exposed to frontend
 * 
 * USAGE: Set WHMCS credentials in config.php (not included in repo)
 */

header('Content-Type: application/json');

// Load config (create this file with your WHMCS credentials)
$configFile = __DIR__ . '/config.php';
$config = file_exists($configFile) ? include($configFile) : [];

// Check if mock mode (no config = mock mode)
$mockMode = empty($config['whmcs_url']) || empty($config['whmcs_identifier']) || empty($config['whmcs_secret']);

if ($mockMode) {
    // Return error indicating mock mode should be used
    http_response_code(503);
    echo json_encode([
        'error' => 'WHMCS not configured',
        'message' => 'Please configure WHMCS credentials in /panel/api/config.php',
        'mockMode' => true
    ]);
    exit;
}

// Get request data
$endpoint = $_GET['endpoint'] ?? '';
$method = $_SERVER['REQUEST_METHOD'];
$body = json_decode(file_get_contents('php://input'), true) ?: [];

// Map endpoints to WHMCS API actions
$actionMap = [
    'GET /services' => 'GetClientsProducts',
    'GET /services/{id}' => 'GetClientsProducts',
    'GET /orders' => 'GetOrders',
    'GET /invoices' => 'GetInvoices',
    'GET /invoices/{id}' => 'GetInvoice',
    'POST /invoices/{id}/paylink' => 'GetPaymentMethods',
    'GET /tickets' => 'GetTickets',
    'GET /tickets/{id}' => 'GetTicket',
    'POST /tickets' => 'OpenTicket',
    'POST /tickets/{id}/reply' => 'AddTicketReply',
    'POST /services/{id}/cancel' => 'OpenTicket', // Cancel creates a ticket
];

// Call WHMCS API
function callWHMCS($config, $action, $params = []) {
    $postfields = array_merge([
        'identifier' => $config['whmcs_identifier'],
        'secret' => $config['whmcs_secret'],
        'action' => $action,
        'responsetype' => 'json',
    ], $params);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $config['whmcs_url'] . '/includes/api.php');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postfields));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    
    $response = curl_exec($ch);
    $error = curl_error($ch);
    curl_close($ch);

    if ($error) {
        return ['error' => $error];
    }

    return json_decode($response, true);
}

// Handle the request
// For now, return mock mode message since this is a template
echo json_encode([
    'error' => 'Configure WHMCS to enable live mode',
    'mockMode' => true,
    'instructions' => [
        '1. Create /panel/api/config.php',
        '2. Add: return ["whmcs_url" => "https://your-whmcs.com", "whmcs_identifier" => "xxx", "whmcs_secret" => "xxx"];',
        '3. Reload the page'
    ]
]);
