<?php
$host = 'sql102.infinityfree.com';
$user = 'if0_42009009';
$pass = 'dMQk9QkeTognvP';
$db   = 'if0_42009009_drlkeducation';

$mysqli = new mysqli($host, $user, $pass, $db, 3306);
if ($mysqli->connect_error) die("❌ Connect failed: " . $mysqli->connect_error);
$mysqli->set_charset("utf8mb4");

// Step 1: Drop all existing tables
$mysqli->query("SET foreign_key_checks = 0");
$result = $mysqli->query("SHOW TABLES");
$dropped = 0;
while ($row = $result->fetch_array()) {
    $mysqli->query("DROP TABLE IF EXISTS `{$row[0]}`");
    $dropped++;
}
$mysqli->query("SET foreign_key_checks = 1");
echo "🗑️ Dropped $dropped existing tables.<br>";

// Step 2: Import SQL file
$sql = file_get_contents(__DIR__ . '/database/drlkeducation.sql');
if ($mysqli->multi_query($sql)) {
    $count = 0;
    do {
        $count++;
        if ($res = $mysqli->store_result()) $res->free();
    } while ($mysqli->more_results() && $mysqli->next_result());

    if ($mysqli->errno) {
        echo "❌ Error at query $count: " . $mysqli->error;
    } else {
        echo "✅ Database imported! ($count queries)<br>";
        unlink(__FILE__);
        echo "🔒 Script deleted for security.";
    }
} else {
    echo "❌ Error: " . $mysqli->error;
}
$mysqli->close();
