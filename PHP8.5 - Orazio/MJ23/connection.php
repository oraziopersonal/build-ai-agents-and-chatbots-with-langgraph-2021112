<?php

$host = getenv('DB_HOST') ?: 'localhost';
$database = getenv('DB_NAME') ?: 'mj23stats';
$username = getenv('DB_USER') ?: 'orazio.messi';
$password = getenv('DB_PASSWORD') ?: '1234567890';

$dsn = "mysql:host={$host};dbname={$database};charset=utf8mb4";

try {
	$pdo = new PDO($dsn, $username, $password, [
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	]);
} catch (PDOException $exception) {
	error_log('MySQL connection failed: ' . $exception->getMessage());
	throw $exception;
}
