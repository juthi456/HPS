<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receptionist Homepage</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        ul {
            list-style-type: none;
            padding: 0;
            text-align: center;
        }
        li {
            margin: 10px 0;
        }
        a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
            transition: color 0.3s ease;
        }
        a:hover {
            color: #0056b3;
        }
        /* Optional: Add animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        li {
            animation: fadeInUp 0.5s ease forwards;
        }
    </style>
</head>
<body>
    <h1>Welcome to Receptionist Portal</h1>
    <ul>
        <li><a href="doctor_information.php">Doctor Information</a></li>
        <li><a href="notice.php">Notice</a></li>
        <li><a href="report_update.php">Report Update</a></li>
        <li><a href="old_client_list.php">Old Client List</a></li>
        <li><a href="new_client_list.php">New Client List</a></li>
        <li><a href="terms_and_conditions.php">Terms and Conditions</a></li>
        <li><a href="Appoinment.php">Appoinment</a></li>
    </ul>
</body>
</html>
