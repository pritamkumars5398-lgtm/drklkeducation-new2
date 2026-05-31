<?php
$host = 'sql102.infinityfree.com';
$user = 'if0_42009009';
$pass = 'dMQk9QkeTognvP';
$db   = 'if0_42009009_drlkeducation';
$sql_file = __DIR__ . '/database/drlkeducation.sql';

echo "Connecting to MySQL...\n";
$pdo = new PDO("mysql:host=$host;port=3306;dbname=$db;charset=utf8mb4", $user, $pass, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_TIMEOUT => 30,
]);
echo "✅ Connected!\n";

echo "Reading SQL file...\n";
$sql = file_get_contents($sql_file);

// Split into individual statements
$statements = array_filter(array_map('trim', explode(';', $sql)));
$count = 0;

echo "Importing " . count($statements) . " statements...\n";
foreach ($statements as $statement) {
    if (!empty($statement) && $statement !== "\n") {
        $pdo->exec($statement);
        $count++;
    }
}

echo "✅ Database imported successfully! ($count statements)\n";
