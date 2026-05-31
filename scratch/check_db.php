<?php
$pdo = new PDO('mysql:host=localhost;dbname=drlkeducation', 'root', '');
$stmt = $pdo->query('SELECT * FROM gallery');
echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
