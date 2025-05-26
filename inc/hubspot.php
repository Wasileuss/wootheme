<?php

add_action('wpcf7_before_send_mail', 'send_cf7_data_to_hubspot');

function send_cf7_data_to_hubspot($contact_form) {
    $submission = WPCF7_Submission::get_instance();
    if (!$submission) return;

    $data = $submission->get_posted_data();
    if (empty($data)) return;

    $name = sanitize_text_field($data['your-name'] ?? '');
    $email = sanitize_email($data['email'] ?? '');
    $phone = sanitize_text_field($data['phone'] ?? '');

    if (empty($email)) return;

    // Split name into first and last names
    $name_parts = explode(' ', trim($name), 2);
    $first_name = $name_parts[0] ?? '';
    $last_name = $name_parts[1] ?? '';

    // ✅ ПРАВИЛЬНИЙ формат
    $hubspot_data = [
        'properties' => [
            'email'     => $email,
            'firstname' => $first_name,
            'lastname'  => $last_name,
            'phone'     => $phone,
            'message'   => $data['textarea'] ?? '',
        ]
    ];

    $token = HUBSPOT_PRIVATE_TOKEN;

    $response = wp_remote_post('https://api.hubapi.com/crm/v3/objects/contacts', [
        'headers' => [
            'Authorization' => 'Bearer ' . $token,
            'Content-Type'  => 'application/json',
        ],
        'body'         => json_encode($hubspot_data),
        'method'       => 'POST',
        'data_format'  => 'body',
    ]);

    // Debug
    if (defined('WP_DEBUG') && WP_DEBUG) {
        error_log('HubSpot Payload: ' . print_r($hubspot_data, true));
        error_log('HubSpot Response: ' . print_r($response, true));
    }
}

