<?php
if (!isset($_GET["uid"])) {
    echo "Back to <a href='update.php'>update page</a><br><br>";
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

$sql = "SELECT * FROM members WHERE UID = " . $selected_uid;
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $UID = $row["UID"];
    $email = $row["email"];
    $Gender = $row["Gender"];
    $BirthYear = $row["BirthYear"];
    $SubscriptionYear = $row["SubscriptionYear"];
} else {
    print_r("no result found");
}

if ($Gender == 'M') {
    $GenderM = 'selected';
    $GenderF = '';
} else {
    $GenderM = '';
    $GenderF = 'selected';
}

$conn->close();
?>
<form action="update_action.php" method="get">
    <table>
        <tr>
            <td>uid:</td>
            <td><?php echo $selected_uid; ?></td>
            <input type="hidden" id="uid" name="uid" value="<?php echo $selected_uid; ?>"></input>
        </tr>
        <tr>
            <td>Gender:</td>
            <td>
                <select name="Gender" id="Gender">
                    <option value="M" <?php echo $GenderM; ?>>M</option>
                    <option value="F" <?php echo $GenderF; ?>>F</option>
                </select>
            </td>
        </tr>
    </table>
</form>
