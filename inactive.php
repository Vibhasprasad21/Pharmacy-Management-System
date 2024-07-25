<!DOCTYPE html>
<html>
<head>
    <title>Inactive Customers</title>
</head>
<body>

<?php
include "config.php"; // Include your database connection configuration

$sql = "SELECT C.C_ID, CONCAT(C.C_FNAME, ' ', C.C_LNAME) AS Customer_Name
        FROM customer C
        LEFT JOIN sales S ON C.C_ID = S.C_ID
        WHERE S.C_ID IS NULL";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<h2>Inactive Customers</h2>';
    echo '<table>';
    echo '<tr>';
    echo '<th>Customer ID</th>';
    echo '<th>Customer Name</th>';
    echo '</tr>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['C_ID'] . '</td>';
        echo '<td>' . $row['Customer_Name'] . '</td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo 'No inactive customers found.';
}

$conn->close();
?>

</body>
</html>
