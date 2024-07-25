<?php
include "config.php"; // Include your database connection configuration

$sql = "SELECT E.E_ID, CONCAT(E.E_FNAME, ' ', E.E_LNAME) AS Employee_Name, SUM(S.TOTAL_AMT) AS Total_Sales_Amount
        FROM employee E
        LEFT JOIN sales S ON E.E_ID = S.E_ID
        GROUP BY E.E_ID, Employee_Name
        ORDER BY Total_Sales_Amount DESC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table>';
    echo '<tr>';
    echo '<th>Employee ID</th>';
    echo '<th>Employee Name</th>';
    echo '<th>Total Sales Amount</th>';
    echo '</tr>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['E_ID'] . '</td>';
        echo '<td>' . $row['Employee_Name'] . '</td>';
        echo '<td>' . $row['Total_Sales_Amount'] . '</td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo 'No data found.';
}

$conn->close();
?>
