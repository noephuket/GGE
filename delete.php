<?php
include 'db.include.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connect failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM members";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $UID[] = $row["UID"];
        $email[] = $row["email"];
        $Gender[] = $row["Gender"];
        $BirthYear[] = $row["BirthYear"];
        $SubscriptionYear[] = $row["SubscriptionYear"];
    }
    $no = $result->num_rows;
} else {
    print_r("no result found");
}

$conn->close();
?>

<?php
for ($i = 0; $i < sizeof($UID); $i++) {
    echo "<tr>";
    echo "<td>" . $UID[$i] . "</td>";
    echo "<td>" . $email[$i] . "</td>";
    echo "<td>" . $Gender[$i] . "</td>";
    echo "<td>" . $BirthYear[$i] . "</td>";
    echo "<td>" . $SubscriptionYear[$i] . "</td>";
    echo "<td><a href='delete_action.php?uid=" . $UID[$i] . "'>Delete</a></td>";
    echo "</tr>";
}
?>
