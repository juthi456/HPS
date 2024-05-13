<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Report Update</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        select,
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Blood Report Update</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="patient_name">Patient Name:</label><br>
            <input type="text" id="patient_name" name="patient_name" value="<?php echo isset($_POST['patient_name']) ? $_POST['patient_name'] : ''; ?>" required><br>
            <label for="blood_type">Blood Type:</label><br>
            <select id="blood_type" name="blood_type" required>
                <option value="">Select Blood Type</option>
                <option value="A+" <?php echo (isset($_POST['blood_type']) && $_POST['blood_type'] == 'A+') ? 'selected' : ''; ?>>A+</option>
                <option value="A-" <?php echo (isset($_POST['blood_type']) && $_POST['blood_type'] == 'A-') ? 'selected' : ''; ?>>A-</option>
                <option value="B+" <?php echo (isset($_POST['blood_type']) && $_POST['blood_type'] == 'B+') ? 'selected' : ''; ?>>B+</option>
                <option value="B-" <?php echo (isset($_POST['blood_type']) && $_POST['blood_type'] == 'B-') ? 'selected' : ''; ?>>B-</option>
                <option value="AB+" <?php echo (isset($_POST['blood_type']) && $_POST['blood_type'] == 'AB+') ? 'selected' : ''; ?>>AB+</option>
                <option value="AB-" <?php echo (isset($_POST['blood_type']) && $_POST['blood_type'] == 'AB-') ? 'selected' : ''; ?>>AB-</option>
                <option value="O+" <?php echo (isset($_POST['blood_type']) && $_POST['blood_type'] == 'O+') ? 'selected' : ''; ?>>O+</option>
                <option value="O-" <?php echo (isset($_POST['blood_type']) && $_POST['blood_type'] == 'O-') ? 'selected' : ''; ?>>O-</option>
            </select><br>
            <label for="test_date">Test Date:</label><br>
            <input type="date" id="test_date" name="test_date" value="<?php echo isset($_POST['test_date']) ? $_POST['test_date'] : ''; ?>" required><br>
            <label for="test_results">Test Results:</label><br>
            <textarea id="test_results" name="test_results" required><?php echo isset($_POST['test_results']) ? $_POST['test_results'] : ''; ?></textarea><br>
            <input type="submit" value="Submit Report">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $errors = array();

            // Validate patient name
            if (empty($_POST["patient_name"])) {
                $errors[] = "Patient name is required";
            }

            // Validate blood type
            if (empty($_POST["blood_type"])) {
                $errors[] = "Blood type is required";
            }

            // Validate test date
            if (empty($_POST["test_date"])) {
                $errors[] = "Test date is required";
            }

            // Validate test results
            if (empty($_POST["test_results"])) {
                $errors[] = "Test results are required";
            }

            // If no errors, display submitted report
            if (empty($errors)) {
                $patient_name = $_POST["patient_name"];
                $blood_type = $_POST["blood_type"];
                $test_date = $_POST["test_date"];
                $test_results = $_POST["test_results"];
                $timestamp = date("Y-m-d H:i:s");

                // Display the submitted report
                echo '<div class="report">';
                echo '<p><strong>Patient Name:</strong> ' . htmlspecialchars($patient_name) . '</p>';
                echo '<p><strong>Blood Type:</strong> ' . htmlspecialchars($blood_type) . '</p>';
                echo '<p><strong>Test Date:</strong> ' . htmlspecialchars($test_date) . '</p>';
                echo '<p><strong>Test Results:</strong><br>' . nl2br(htmlspecialchars($test_results)) . '</p>';
                echo '<p class="timestamp">Submitted on: ' . $timestamp . '</p>';
                echo '</div>';
            } else {
                // Display validation errors
                echo '<div class="error"><ul>';
                foreach ($errors as $error) {
                    echo '<li>' . $error . '</li>';
                }
                echo '</ul></div>';
            }
        }
        ?>
    </div>
</body>
</html>
