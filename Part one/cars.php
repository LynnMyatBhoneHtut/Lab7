<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>


<?php
require_once("setting.php"); 

$conn = mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn) {
    die("<p>Database connection failure: " . mysqli_connect_error() . "</p>");
}

$sql_table = "cars";
$query = "SELECT * FROM $sql_table";
$result = mysqli_query($conn, $query);


if (mysqli_num_rows($result) > 0) {
    echo "<table  border='1' cellpadding='5'>";
    echo "<tr>
            <th>ID</th>
            <th>Make</th>
            <th>Model</th>
            <th>Price ($)</th>
            <th>Year of Manufacture</th>
          </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['car_id'] . "</td>";
        echo "<td>" . $row['make'] . "</td>";
        echo "<td>" . $row['model'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "<td>" . $row['yom'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>There are no cars to display.</p>";
}

mysqli_free_result($result);
mysqli_close($conn);

echo "</body></html>";
?>
