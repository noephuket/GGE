<?php
if (!isset($_GET["uid"])) {
    echo "Back to <a href='update.php'>update page</a><br><br>";
    die("Parameter uid not submitted to page!");
} else {
    $selected_uid = $_GET["uid"];
}

$email = $_GET["email"];
$Gender = $_GET["Gender"];
$BirthYear = $_GET["BirthYear"];
$SubscriptionYear = $_GET["SubscriptionYear"];

include 'db.include.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connect failed: " . $conn->connect_error);
}

$sql = "UPDATE members SET email ='" . $email. "', Gender ='" . 
$Gender . "', BirthYear = ". $BirthYear . ", SubscriptionYear = ". 
$SubscriptionYear . " WHERE uid = " . $selected_uid;

$result = $conn->query($sql);

if ($result == TRUE) {
    print_r("Successful updated record with uid = " . 
    $selected_uid);
} else {
    print_r("no result found");
}

$conn->close();
?>
