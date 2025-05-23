<?php
$host = "localhost";
$user = "root";
$pass = "@devmikemwai8347";
$dbname = "lamp_judging";

// Create a connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
