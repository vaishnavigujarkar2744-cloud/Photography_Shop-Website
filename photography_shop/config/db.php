<?php

$conn = new mysqli(
    "localhost",
    "root",
    "",
    "photography_shop",
    3307
);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");

?>