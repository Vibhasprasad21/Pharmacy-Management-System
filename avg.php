<!DOCTYPE html>
<html>
<head>
    <title>Average Statistics</title>
</head>
<body>

<?php
include "config.php"; // Include your database connection configuration

$sql = "SELECT AVG(C.C_AGE) AS Average_Customer_Age, AVG(S.TOTAL_AMT) AS Average_Purchase_Amount
        FROM customer C
        JOIN sales S ON C.C_ID = S.C_ID";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    echo '<h2>Average Customer Statistics</h2>';
    echo '<p>Average Customer Age: ' . round($row['Average_Customer_Age'], 2) . ' years</p>';
    echo '<p>Average Purchase Amount: Rs.' . round($row['Average_Purchase_Amount'], 2) . '</p>';
} else {
    echo 'No data found.';
}

$conn->close();
?>

</body>
</html>
