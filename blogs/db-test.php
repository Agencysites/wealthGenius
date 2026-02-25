<?php
// ============================================================
// DB CONNECTION DIAGNOSTIC - DELETE THIS FILE AFTER USE!
// ============================================================
header('Content-Type: text/html; charset=utf-8');

$db_name = 'u133917450_wealthgenius';
$db_user = 'u133917450_admin';
$db_pass = 'wealthGenius-2026';

// Hostinger may use different internal hostnames — test them all
$hosts_to_try = [
    'localhost',
    '127.0.0.1',
    'srv1755.hstgr.io',
    'mysql.hostinger.com',
];

echo '<style>body{font-family:monospace;padding:20px;background:#1a1a1a;color:#eee;}
.ok{color:#4caf50;} .fail{color:#f44336;} .box{background:#2a2a2a;padding:15px;margin:10px 0;border-radius:6px;}
h2{color:#fff;}</style>';
echo '<h2>🔍 Database Connection Diagnostic</h2>';
echo '<div class="box"><b>DB Name:</b> ' . $db_name . '<br><b>DB User:</b> ' . $db_user . '<br><b>Server:</b> ' . ($_SERVER['HTTP_HOST'] ?? 'unknown') . '</div>';

echo '<h2>Testing Hosts:</h2>';
$any_success = false;
foreach ($hosts_to_try as $host) {
    $conn = @new mysqli($host, $db_user, $db_pass, $db_name);
    if ($conn->connect_error) {
        echo '<div class="box"><span class="fail">✗ FAILED</span> &nbsp; Host: <b>' . $host . '</b><br>Error: ' . htmlspecialchars($conn->connect_error) . '</div>';
    } else {
        echo '<div class="box"><span class="ok">✓ SUCCESS</span> &nbsp; Host: <b>' . $host . '</b> — Connection works!<br>';
        // Check if WP tables exist
        $res = $conn->query("SHOW TABLES LIKE 'wp_options'");
        if ($res && $res->num_rows > 0) {
            echo '<span class="ok">✓ WordPress tables found (wp_options exists)</span>';
        } else {
            echo '<span class="fail">✗ WordPress tables NOT found — database may be empty or tables use different prefix</span>';
        }
        echo '</div>';
        $any_success = true;
        $conn->close();
    }
}

if (!$any_success) {
    echo '<div class="box" style="border:1px solid #f44336;"><b style="color:#f44336;">All hosts failed.</b><br>
    This means either:<br>
    &nbsp;&nbsp;1. The password <b>' . htmlspecialchars($db_pass) . '</b> is wrong<br>
    &nbsp;&nbsp;2. User <b>' . htmlspecialchars($db_user) . '</b> is not assigned to the database<br>
    &nbsp;&nbsp;3. The database does not exist on this server<br>
    <br>→ Go to Hostinger hPanel → Databases → MySQL Databases → check user is assigned to db</div>';
}

echo '<br><p style="color:#888;font-size:12px;">⚠️ DELETE this file (db-test.php) from your server after reviewing results!</p>';
?>
