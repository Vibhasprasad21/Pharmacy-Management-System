<?php
include "config.php"; // Include your database connection configuration

$sql = "SELECT M.MED_NAME, SUM(SI.SALE_QTY) AS Total_Quantity_Sold
        FROM meds M
        JOIN sales_items SI ON M.MED_ID = SI.MED_ID
        GROUP BY M.MED_NAME
        ORDER BY Total_Quantity_Sold DESC
        LIMIT 5";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table>';
    echo '<tr>';
    echo '<th>Medication Name</th>';
    echo '<th>Total Quantity Sold</th>';
    echo '</tr>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['MED_NAME'] . '</td>';
        echo '<td>' . $row['Total_Quantity_Sold'] . '</td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo 'No data found.';
}

$conn->close();
?>
