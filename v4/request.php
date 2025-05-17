<?php
session_start();

// Redirect to login page if not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: 1.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Select Cities for AQI Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 30px;
        }

        h1 {
            color: #333;
        }

        .cities-list {
            margin-top: 20px;
        }

        .city-checkbox {
            margin: 5px;
        }

        .error-message {
            font-size: 14px;
            color: red;
        }

        .submit-btn {
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .submit-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <h1>Select 10 Cities</h1>

    <form method="POST" action="showaqi.php">
    <h2>Select Countries</h2>
    <label><input type="checkbox" name="countries[]" value="USA"> USA</label><br>
    <label><input type="checkbox" name="countries[]" value="India"> India</label><br>
    <label><input type="checkbox" name="countries[]" value="China"> China</label><br>
    <label><input type="checkbox" name="countries[]" value="UK"> UK</label><br>
    <label><input type="checkbox" name="countries[]" value="Japan"> Japan</label><br>
    <label><input type="checkbox" name="countries[]" value="Germany"> Germany</label><br>
    <label><input type="checkbox" name="countries[]" value="France"> France</label><br>
    <label><input type="checkbox" name="countries[]" value="Canada"> Canada</label><br>
    <label><input type="checkbox" name="countries[]" value="Brazil"> Brazil</label><br>
    <label><input type="checkbox" name="countries[]" value="Australia"> Australia</label><br>
    <label><input type="checkbox" name="countries[]" value="Australia"> Australia</label><br>
    <label><input type="checkbox" name="countries[]" value="Australia"> Australia</label><br>
    <label><input type="checkbox" name="countries[]" value="Australia"> Australia</label><br>
    <label><input type="checkbox" name="countries[]" value="Australia"> Australia</label><br>
    <label><input type="checkbox" name="countries[]" value="Australia"> Australia</label><br>
    <label><input type="checkbox" name="countries[]" value="Australia"> Australia</label><br>
    <label><input type="checkbox" name="countries[]" value="Australia"> Australia</label><br>
    <label><input type="checkbox" name="countries[]" value="Australia"> Australia</label><br>
    <label><input type="checkbox" name="countries[]" value="Australia"> Australia</label><br>
    <label><input type="checkbox" name="countries[]" value="Australia"> Australia</label><br>
    <label><input type="checkbox" name="countries[]" value="Australia"> Australia</label><br>
    <label><input type="checkbox" name="countries[]" value="Australia"> Australia</label><br>
    <label><input type="checkbox" name="countries[]" value="Australia"> Australia</label><br>
    <label><input type="checkbox" name="countries[]" value="Australia"> Australia</label><br>
    <label><input type="checkbox" name="countries[]" value="Australia"> Australia</label><br>
    <label><input type="checkbox" name="countries[]" value="Australia"> Australia</label><br>
    <label><input type="checkbox" name="countries[]" value="Australia"> Australia</label><br>
    <label><input type="checkbox" name="countries[]" value="Australia"> Australia</label><br>
    <label><input type="checkbox" name="countries[]" value="Australia"> Australia</label><br>
    <label><input type="checkbox" name="countries[]" value="Australia"> Australia</label><br>
    <label><input type="checkbox" name="countries[]" value="Australia"> Australia</label><br>
    <label><input type="checkbox" name="countries[]" value="Australia"> Australia</label><br>
    <label><input type="checkbox" name="countries[]" value="Australia"> Australia</label><br>
    <label><input type="checkbox" name="countries[]" value="Australia"> Australia</label><br>
    <label><input type="checkbox" name="countries[]" value="Australia"> Australia</label><br>

    <button type="submit">Submit</button>
</form>


    <script>
        document.getElementById('citiesForm').addEventListener('submit', function(event) {
            const selectedCities = document.querySelectorAll('input[name="cities[]"]:checked');
            const errorMessage = document.getElementById('error-message');

            // Check if exactly 10 cities are selected
            if (selectedCities.length !== 10) {
                event.preventDefault();
                errorMessage.textContent = "You must select exactly 10 cities.";
            } else {
                errorMessage.textContent = ""; // Clear any previous error
            }
        });
    </script>

</body>
</html>
