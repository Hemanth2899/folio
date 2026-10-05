<?php
// Private inbox: http://localhost/hemanth-portfolio/admin.php  (set admin_password in config.local.php first)
session_start(); require __DIR__ . '/api/db.php';
$cfg = app_config(); $pw = $cfg['admin_password'] ?? '';
$h = fn($t) => htmlspecialchars((string)$t, ENT_QUOTES, 'UTF-8');
if (isset($_GET['logout'])) { session_destroy(); header('Location: admin.php'); exit; }
if ($pw === '') { exit('Set admin_password in config.local.php (copy config.local.example.php) to use this page.'); }
if (isset($_POST['password']) && hash_equals($pw, $_POST['password'])) { $_SESSION['ok'] = true; header('Location: admin.php'); exit; }
$style = '<style>body{font:16px system-ui;background:#0b0418;color:#f3eeff;max-width:860px;margin:30px auto;padding:0 16px}input,button{padding:10px;border-radius:8px;border:1px solid #6d4fd1;background:#1b0d3d;color:#fff}.m{border:1px solid #3a2670;border-radius:12px;padding:14px;margin:12px 0;background:#150832}small{color:#a99bd0}a{color:#a78bfa}</style>';
if (empty($_SESSION['ok'])) { echo $style . '<h2>Admin login</h2><form method="post"><input type="password" name="password" placeholder="Password" autofocus> <button>Login</button></form>'; exit; }
if (isset($_POST['del'])) { db()->prepare('DELETE FROM messages WHERE id = ?')->execute([(int)$_POST['del']]); header('Location: admin.php'); exit; }
$rows = db()->query('SELECT * FROM messages ORDER BY id DESC LIMIT 200')->fetchAll(PDO::FETCH_ASSOC);
echo $style . '<h2>Messages (' . count($rows) . ') <small><a href="?logout=1">Logout</a></small></h2>';
foreach ($rows as $r) echo '<div class="m"><b>' . $h($r['name']) . '</b> &lt;<a href="mailto:' . $h($r['email']) . '">' . $h($r['email']) . '</a>&gt; <small>' . $h($r['created_at']) . '</small><p>' . nl2br($h($r['message'])) . '</p><form method="post"><button name="del" value="' . (int)$r['id'] . '">Delete</button></form></div>';
if (!$rows) echo '<p><small>No messages yet.</small></p>';
