<?php
session_start();

// Redirect to login page if not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: 1.html");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Debugging: Output the selected countries
    echo '<pre>';
    print_r($_POST);  // Print all POST data to verify it
    echo '</pre>';

    // Fetch the selected countries from the form
    $selectedCountries = isset($_POST['countries']) ? $_POST['countries'] : [];

    if (empty($selectedCountries)) {
        echo "<p>No countries selected.</p>";
        exit;
    }

    // Example AQI data for demonstration (this would ideally be fetched from an API)
    $aqiData = [
        "USA" => 58,
        "India" => 150,
        "China" => 120,
        "UK" => 45,
        "Japan" => 60,
        "Germany" => 80,
        "France" => 55,
        "Canada" => 70,
        "Brazil" => 95,
        "Australia" => 65
    ];

    // Prepare AQI results for the selected countries
    $aqiResults = [];
    foreach ($selectedCountries as $country) {
        if (array_key_exists($country, $aqiData)) {
            $aqiResults[$country] = $aqiData[$country];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AQI Data for Selected Countries</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 30px;
        }

        h1 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 8px 12px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        .back-btn {
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .back-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <h1>AQI Data for Selected Countries</h1>

    <?php if (!empty($aqiResults)): ?>
        <table>
            <thead>
                <tr>
                    <th>Country</th>
                    <th>AQI Value</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($aqiResults as $country => $aqi): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($country); ?></td>
                        <td><?php echo $aqi; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No AQI data available for the selected countries.</p>
    <?php endif; ?>

    <a href="request.php" class="back-btn">Go Back to Select More Countries</a>

</body>
</html>
