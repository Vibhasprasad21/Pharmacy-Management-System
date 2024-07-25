<!DOCTYPE html>
<html>
<head>
    <title>Employee Sales Statistics</title>
</head>
<body>

<?php
include "config.php"; // Include your database connection configuration

$sql = "SELECT E.E_ID, CONCAT(E.E_FNAME, ' ', E.E_LNAME) AS Employee_Name, COUNT(S.SALE_ID) AS Total_Sales, AVG(S.TOTAL_AMT) AS Average_Sale_Amount
        FROM employee E
        LEFT JOIN sales S ON E.E_ID = S.E_ID
        GROUP BY E.E_ID, Employee_Name";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<h2>Employee Sales Statistics</h2>';
    echo '<table>';
    echo '<tr>';
    echo '<th>Employee ID</th>';
    echo '<th>Employee Name</th>';
    echo '<th>Total Sales</th>';
    echo '<th>Average Sale Amount</th>';
    echo '</tr>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['E_ID'] . '</td>';
        echo '<td>' . $row['Employee_Name'] . '</td>';
        echo '<td>' . $row['Total_Sales'] . '</td>';
        echo '<td>' . round($row['Average_Sale_Amount'], 2) . '</td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo 'No data found.';
}

$conn->close();
?>

</body>
</html>
