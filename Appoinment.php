<!DOCTYPE html>
<html>
<head>
    <title>Doctor Appointment Form</title>
    <style>
        .form-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-container label {
            display: block;
            margin-bottom: 10px;
        }
        .form-container input[type="text"],
        .form-container input[type="email"],
        .form-container input[type="tel"],
        .form-container input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .form-container input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }
        .form-container input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Doctor Appointment Form</h1>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <span class="error"><?php echo isset($name_error) ? $name_error : ''; ?></span><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <span class="error"><?php echo isset($email_error) ? $email_error : ''; ?></span><br>

            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" required>
            <span class="error"><?php echo isset($phone_error) ? $phone_error : ''; ?></span><br>

            <label for="date">Appointment Date:</label>
            <input type="date" id="date" name="date" required>
            <span class="error"><?php echo isset($date_error) ? $date_error : ''; ?></span><br>

            <input type="submit" value="Submit">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $valid = true;

            // Validate name
            if (empty($_POST["name"])) {
                $name_error = "Name is required";
                $valid = false;
            }

            // Validate email
            if (empty($_POST["email"])) {
                $email_error = "Email is required";
                $valid = false;
            } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                $email_error = "Invalid email format";
                $valid = false;
            }

            // Validate phone
            if (empty($_POST["phone"])) {
                $phone_error = "Phone number is required";
                $valid = false;
            } elseif (!preg_match("/^[0-9]{10}$/", $_POST["phone"])) {
                $phone_error = "Invalid phone number format (10 digits)";
                $valid = false;
            }

            // Validate date (not in the past)
            if (empty($_POST["date"])) {
                $date_error = "Appointment date is required";
                $valid = false;
            } elseif (strtotime($_POST["date"]) < strtotime(date("Y-m-d"))) {
                $date_error = "Appointment date cannot be in the past";
                $valid = false;
            }

            if ($valid) {
                $name = $_POST["name"];
                $email = $_POST["email"];
                $phone = $_POST["phone"];
                $date = $_POST["date"];

                // Store the information in a text file
                $file = fopen("appointment.txt", "a");
                fwrite($file, "Name: $name\nEmail: $email\nPhone: $phone\nAppointment Date: $date\n\n");
                fclose($file);

                echo "<p>Appointment information has been saved.</p>";
            }
        }
        ?>
    </div>
</body>
</html>
