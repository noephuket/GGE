<?php
if (!isset($_GET["uid"])) {
    echo "Back to <a href='delete.php'>delete page</a><br><br>";
    die("Parameter uid not submitted to page!");
} else {
    $selected_uid = $_GET["uid"];
}

include 'db.include.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connect failed: " . $conn->connect_error);
}

$sql = "DELETE FROM members WHERE uid = " . $selected_uid;
$result = $conn->query($sql);

if ($result == TRUE) {
    print_r("Successful deleted record with uid = " . $selected_uid);
} else {
    print_r("no result found");
}

$conn->close();
?>
