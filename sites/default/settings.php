<?php

$databases = [];
$config_directories = [];
$settings['update_free_access'] = FALSE;
$settings['container_yamls'][] = __DIR__ . '/services.yml';
$settings['hash_salt'] = '0jkF3cihko6-Ic41LzGQcymt05EfiuKLVj371IdOSbnCVNjH_LDo8aFzZy5e6cTJJgVPigXd_w';
$settings['install_profile'] = 'standard';

if (isset($_ENV['PANTHEON_ENVIRONMENT']) && $_ENV['PANTHEON_ENVIRONMENT'] == 'live') {
  $domain = 'www.mandatocompartilhado.cc';
  $base_url = 'https://' . $domain;
}

/**
 * If there is a local settings file, then include it
 */
$local_settings = __DIR__ . "/settings.local.php";
if (file_exists($local_settings)) {
  include $local_settings;
}
else {
  include __DIR__ . "/settings.hosting.php";
}

$config_directories['sync'] = './sites/default/config/sync';