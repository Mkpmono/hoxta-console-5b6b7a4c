<?php
/**
 * WHMCS API Configuration
 * 
 * INSTRUCTIONS:
 * 1. Copy this file to config.php (same directory)
 * 2. Fill in your WHMCS API credentials
 * 3. Keep config.php out of version control
 * 
 * To get API credentials:
 * 1. Login to WHMCS Admin
 * 2. Go to Setup > Staff Management > Manage API Credentials
 * 3. Create new API Credential
 * 4. Copy the Identifier and Secret
 */

return [
    // Your WHMCS installation URL (no trailing slash)
    'whmcs_url' => 'https://your-whmcs-domain.com',
    
    // API Identifier from WHMCS
    'whmcs_identifier' => 'your-api-identifier',
    
    // API Secret from WHMCS
    'whmcs_secret' => 'your-api-secret',
];
