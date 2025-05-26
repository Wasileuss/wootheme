<?php

add_action('wpcf7_mail_sent', 'send_lead_to_zoho');

function send_lead_to_zoho($contact_form) {
    $access_token = ACCESS_TOKEN;

    $submission = WPCF7_Submission::get_instance();
    if (!$submission) return;

    $data = $submission->get_posted_data();

    // Get form data
    $name = $data['your-name'] ?? '';
    $email = $data['email'] ?? '';
    $phone = $data['phone'] ?? '';
    $message = $data['textarea'] ?? '';

    // Split name into first and last names
    $name_parts = explode(' ', trim($name), 2);
    $first_name = $name_parts[0] ?? '';
    $last_name = $name_parts[1] ?? '';

    // Prepare data for Zoho
    $zoho_data = [
        'data' => [[
            'Company' => 'WordPress Form',
            'First_Name' => $first_name,
            'Last_Name' => $last_name ?: 'N/A',
            'Email' => $email,
            'Phone' => $phone,
            'Description' => $message,
        ]],
    ];

    $ch = curl_init('https://www.zohoapis.eu/crm/v2/Leads');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Zoho-oauthtoken $access_token",
        'Content-Type: application/json',
    ]);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($zoho_data));
    $response = curl_exec($ch);
    curl_close($ch);

    // Log response
    error_log('Zoho response: ' . $response);
}

update_option('zoho_refresh_token', REFRESH_TOKEN);
update_option('zoho_access_token', ACCESS_TOKEN);
update_option('zoho_token_created_at', time());

function get_zoho_access_token() {
    $access_token = get_option('zoho_access_token');
    $refresh_token = get_option('zoho_refresh_token');
    $token_created = get_option('zoho_token_created_at');

    $token_lifetime = 3600;

    // If token is not set or expired, refresh it
    if (!$access_token || !$token_created || (time() - $token_created) >= $token_lifetime) {
        $client_id = CLIENT_ID;
        $client_secret = CLIENT_SECRET;
        $refresh_url = 'https://accounts.zoho.eu/oauth/v2/token';

        $params = http_build_query([
            'refresh_token' => $refresh_token,
            'client_id' => $client_id,
            'client_secret' => $client_secret,
            'grant_type' => 'refresh_token',
        ]);

        $response = wp_remote_post("$refresh_url?$params");
        $body = wp_remote_retrieve_body($response);
        $result = json_decode($body, true);

        if (isset($result['access_token'])) {
            $access_token = $result['access_token'];
            update_option('zoho_access_token', $access_token);
            update_option('zoho_token_created_at', time());
        } else {
            error_log('Zoho token refresh error: ' . $body);
            return null;
        }
    }

    return $access_token;
}