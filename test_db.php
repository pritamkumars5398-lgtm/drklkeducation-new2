<?php
$mysqli = new mysqli('localhost', 'root', '', 'drlkeducation');
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
$mysqli->query("UPDATE members SET member_code = 'DRLK-001' WHERE id = 1");
$result = $mysqli->query("SELECT member_code, dob FROM members WHERE id = 1");
if($row = $result->fetch_assoc()) {
    echo "Updated successfully! You can test with:\n";
    echo "Membership ID: " . $row['member_code'] . "\nDOB: " . $row['dob'] . "\n";
}
$mysqli->close();
