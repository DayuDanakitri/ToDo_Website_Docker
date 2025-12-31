<?php
$conn = new mysqli(
    getenv("DB_HOST"),
    getenv("DB_USER"),
    getenv("DB_PASS"),
    getenv("DB_NAME")
);

$title = $_POST['title'];
$category = $_POST['category'];

$conn->query("INSERT INTO tasks (title, category) VALUES ('$title', '$category')");

header("Location: index.php");
