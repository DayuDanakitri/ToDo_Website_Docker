<?php
$conn = new mysqli(
    getenv("DB_HOST"),
    getenv("DB_USER"),
    getenv("DB_PASS"),
    getenv("DB_NAME")
);

$id = $_GET['id'];

$conn->query("UPDATE tasks SET status='done' WHERE id=$id");

header("Location: index.php");
