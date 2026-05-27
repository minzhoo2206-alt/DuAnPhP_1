<?php

$servername = "103.57.220.210";
$username = "fnxxiqfbhosting_Group_NMN";
$password = ":5NV4Byh@z@<5:5";
$dbname = "fnxxiqfbhosting_ASM";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$sql = "SELECT * FROM `Demo`;";
$stmt = $conn->query($sql);

$result = $stmt->fetch_all(PDO:: FETCH_ASSOC);

echo "<pre>";
var_dump($result);
echo "</pre>";