<?php
include 'db.include.php'; // DB Connection Details

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connect failed: " . $conn->connect_error);
}

// Create the SQL Statement
$sql = "SELECT UID, email FROM members";

// Run the SQL Statement on the Server
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $UID[] = $row["UID"];
        $email[] = $row["email"];
    }
    $no = $result->num_rows;
} else {
    print_r("no result found");
}

$conn->close();
?>

<?php echo "found " . $no . " rows"; ?>

<table class="styled-table" border="1">
    <th>UID</th>
    <th>email</th>
    <?php
    for ($i = 0; $i < sizeof($UID); $i++) {
        echo "<tr>";
        echo "<td>" . $UID[$i] . "</td>";
        echo "<td>" . $email[$i] . "</td>";
        echo "</tr>";
    }
    ?>
</table>
