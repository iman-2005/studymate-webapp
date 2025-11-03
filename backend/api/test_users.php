<?php
require_once "dao/UsersDAO.php";

$users = new UsersDAO();

// Example 1: Insert a new user
$id = $users->create("Iman Test", "iman@example.com", "mypassword", 1);
echo "✅ New user created with ID: $id<br>";

// Example 2: Fetch all users
$data = $users->getAll();
echo "<pre>";
print_r($data);
echo "</pre>";
?>
