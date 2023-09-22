<?php
include 'db.include.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connect failed: " . $conn->connect_error);
}

// Taking all 5 values from the form data (input)
$uid = $_REQUEST['uid'];
$email = $_REQUEST['email'];
$gender = $_REQUEST['gender'];
$BirthYear = $_REQUEST['BirthYear'];
$SubscriptionYear = $_REQUEST['SubscriptionYear'];

// Performing insert query execution
$sql = "INSERT INTO members VALUES ($uid, '$email', '$gender', $BirthYear, $SubscriptionYear)";
$result = $conn->query($sql);

if (!$result) {
    print_r("Insert Not Completed!");
}

$conn->close();
?>
