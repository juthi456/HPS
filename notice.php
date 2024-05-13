<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notice Board</title>
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

        form {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
        }

        textarea,
        input[type="file"] {
            width: 100%;
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
    </style>
</head>
<body>
    <h1>Notice Board</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $noticeText = $_POST["notice"];
        $uploadedFile = $_FILES["file"]["tmp_name"];

        if (!empty($noticeText)) {
            echo "<h2>Notice:</h2>";
            echo "<p>$noticeText</p>";
        }

        if (!empty($uploadedFile)) {
            $fileContent = file_get_contents($uploadedFile);
            echo "<h2>Uploaded Notice File:</h2>";
            echo "<pre>$fileContent</pre>";
        }
    }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
        <label for="notice">Write Notice:</label><br>
        <textarea id="notice" name="notice" rows="4" cols="50"></textarea><br><br>
        <label for="file">Upload Notice File:</label><br>
        <input type="file" id="file" name="file"><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
