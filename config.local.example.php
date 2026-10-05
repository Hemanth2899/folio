<?php
// Copy to config.local.php (git-ignored). Everything is optional except admin_password if you want admin.php.
return [
  'admin_password' => 'change-me',
  'db' => ['host' => 'localhost', 'user' => 'root', 'pass' => '', 'name' => 'portfolio'], // XAMPP defaults
  'token' => '', 'chat_id' => '', // Telegram phone notification (optional)
];
