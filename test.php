<?php
$db = new PDO('mysql:host=localhost;dbname=drlkeducation', 'root', '');
$stmt = $db->query('DESCRIBE members');
print_r($stmt->fetchAll(PDO::FETCH_ASSOC));
