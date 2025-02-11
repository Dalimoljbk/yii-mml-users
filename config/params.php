<?php

$params= [
    'BASE_URL' => '',
  'FROM_EMAIL' => 'support@managemylawsuits.com',
  'NO_REPLY' => 'noreply@managemylawsuits.com',
  'ADMIN_EMAIL' => 'deepak@managemylawsuits.com',
  'SUPPORT_EMAIL' => 'support@managemylawsuits.com',
  'BCC_EMAIL' => 'deepak@managemylawsuits.com',
  'DEBUG_EMAIL' => 'managemylawsuitsnew@gmail.com',
  'SITE_NAME' => 'Manage My Lawsuits',
  'SITE_NAME_FOOTER' => 'Manage My Lawsuits',
  'EMAIL_SIGNATURE' => 'The Manage My Lawsuits Team',
  'SITE_PHONE' => '+91 80 42166152',
	
    'adminEmail' => 'admin@example.com',
    'senderEmail' => 'noreply@example.com',
    'senderName' => 'Example.com mailer',
    'cronJobs' => require(__DIR__ . '/cron_params.php'),

    
];
$params['timezone'] = 'Asia/Kolkata';
$params['membership_update_uc_settings_id'] = [];
$params['order_holiday_list'] = [];
$params['google_cal_token_file'] = "client_secret.json";
$params['proxy']['flag'] = false;

return $params;
