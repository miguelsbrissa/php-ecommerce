<?php
$parsed = parse_ini_file('../../.env', true);
foreach ($parsed as $key => $value) {
    $_ENV[$key] = $value;
}

//create connection
$conn = new mysqli($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASS'], $_ENV['DB_NAME']);

if ($conn->connect_error) {
    die('Falha na conexão: ' . $conn->connect_error);
}
