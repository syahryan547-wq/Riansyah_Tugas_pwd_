<?php
require_once "../config/Database.php";
require_once "../classes/Rental.php";

$db = new Database();
$conn = $db->connect();
$rental = new Rental($conn);

$id = $_GET['id'];

$rental->delete($id);

header("Location: index.php");