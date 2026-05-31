<?php
/**
 * Web-Based Database Importer for Hostinger (CodeIgniter 4)
 * 
 * This script reads the live database credentials directly from the .env file,
 * drops any existing tables, imports the SQL dump, and deletes itself for security.
 */

header('Content-Type: text/html; charset=utf-8');

// 1. Read .env file
$envFile = __DIR__ . '/.env';
if (!file_exists($envFile)) {
    die("<b style='color:red;'>❌ Error: .env file not found at " . htmlspecialchars($envFile) . "</b><br>Please make sure you have uploaded the .env file first.");
}

$db_host = 'localhost';
$db_user = '';
$db_pass = '';
$db_name = '';

$lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
foreach ($lines as $line) {
    if (strpos(trim($line), '#') === 0) continue; // Skip comments
    $parts = explode('=', $line, 2);
    if (count($parts) === 2) {
        $key = trim($parts[0]);
        $value = trim($parts[1]);
        $value = trim($value, "\"' "); // Remove surrounding quotes
        
        if ($key === 'database.default.hostname') $db_host = $value;
        elseif ($key === 'database.default.username') $db_user = $value;
        elseif ($key === 'database.default.password') $db_pass = $value;
        elseif ($key === 'database.default.database') $db_name = $value;
    }
}

if (empty($db_user) || empty($db_name)) {
    die("<b style='color:red;'>❌ Error: Could not parse database credentials from .env</b><br>Please make sure the credentials are correctly set.");
}

echo "<h2>🔋 Hostinger Database Importer</h2>";
echo "Connecting to MySQL database <b>" . htmlspecialchars($db_name) . "</b> on <b>" . htmlspecialchars($db_host) . "</b> as user <b>" . htmlspecialchars($db_user) . "</b>...<br>";

// 2. Establish connection
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($mysqli->connect_error) {
    die("<b style='color:red;'>❌ Connection failed: " . htmlspecialchars($mysqli->connect_error) . "</b><br>Please verify your database credentials in the .env file.");
}
$mysqli->set_charset("utf8mb4");
echo "<span style='color:green;'>✅ Connected successfully to the live database!</span><br><br>";

// 3. Drop existing tables
echo "Cleaning existing database tables...<br>";
$mysqli->query("SET foreign_key_checks = 0");
$result = $mysqli->query("SHOW TABLES");
$dropped = 0;
if ($result) {
    while ($row = $result->fetch_array()) {
        $mysqli->query("DROP TABLE IF EXISTS `" . $mysqli->real_escape_string($row[0]) . "`");
        $dropped++;
    }
    $result->free();
}
$mysqli->query("SET foreign_key_checks = 1");
echo "🗑️ Dropped $dropped existing tables.<br><br>";

// 4. Read SQL file
$sqlFile = __DIR__ . '/database/drlkeducation.sql';
if (!file_exists($sqlFile)) {
    die("<b style='color:red;'>❌ Error: SQL file not found at " . htmlspecialchars($sqlFile) . "</b>");
}

echo "Reading database file (drlkeducation.sql)...<br>";
$sql = file_get_contents($sqlFile);
if (empty($sql)) {
    die("<b style='color:red;'>❌ Error: Database file is empty!</b>");
}

// 5. Execute import
echo "Importing SQL statements into database... (this may take a few seconds)<br>";
if ($mysqli->multi_query($sql)) {
    $count = 0;
    do {
        $count++;
        // Keep fetching results to prevent out-of-sync errors
        if ($res = $mysqli->store_result()) {
            $res->free();
        }
    } while ($mysqli->more_results() && $mysqli->next_result());

    if ($mysqli->errno) {
        echo "<b style='color:red;'>❌ Error during import at statement #$count: " . htmlspecialchars($mysqli->error) . "</b><br>";
    } else {
        echo "<br><span style='color:green; font-size:18px;'>🎉 <b>Success!</b> Database imported successfully ($count queries executed).</span><br><br>";
        
        // 6. Self-delete script for security
        if (unlink(__FILE__)) {
            echo "<span style='color:blue;'>🔒 <b>Security Lock:</b> This importer script has deleted itself from the server.</span><br>";
        } else {
            echo "<span style='color:orange;'>⚠️ <b>Warning:</b> Could not automatically delete this file. Please delete <code>db_import_hostinger.php</code> from your server manually for security!</span><br>";
        }
    }
} else {
    echo "<b style='color:red;'>❌ Error starting multi-query: " . htmlspecialchars($mysqli->error) . "</b><br>";
}

$mysqli->close();
?>
