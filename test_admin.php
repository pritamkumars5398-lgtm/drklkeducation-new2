<?php
$mysqli = new mysqli('localhost', 'root', '', 'drlkeducation');
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$password = password_hash('password123', PASSWORD_DEFAULT);

$mysqli->query("INSERT IGNORE INTO admin_users (full_name, email, password, role, status) VALUES ('Manager Admin', 'manager@admin.com', '$password', 'manager', 1)");
$mysqli->query("INSERT IGNORE INTO admin_users (full_name, email, password, role, status) VALUES ('Coordinator Admin', 'coordinator@admin.com', '$password', 'coordinator', 1)");

$result = $mysqli->query('SELECT * FROM admin_users');
while($row = $result->fetch_assoc()) {
    echo "Role: " . $row['role'] . " | Email: " . $row['email'] . "\n";
}
$mysqli->close();
