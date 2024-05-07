<!DOCTYPE html>
<html>
<head>
    <title>New Client List</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>New Client List</h2>
    <form method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <input type="submit" name="submit" value="Add Client">
    </form>

    <?php
    $clients = []; // Array to store client data

    // Function to add a new client
    function addClient($name, $email) {
        global $clients;
        $clients[] = array("name" => $name, "email" => $email);
    }

    // Function to display the client list
    function displayClients() {
        global $clients;
        echo "<table>";
        echo "<tr><th>Name</th><th>Email</th><th>Action</th></tr>";
        foreach ($clients as $client) {
            echo "<tr>";
            echo "<td>".$client['name']."</td>";
            echo "<td>".$client['email']."</td>";
            echo "<td><a href='?delete=".array_search($client, $clients)."'>Delete</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    // Handle form submission
    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        addClient($name, $email);
    }

    // Handle delete action
    if(isset($_GET['delete'])) {
        $index = $_GET['delete'];
        unset($clients[$index]);
    }

    // Display client list
    displayClients();
    ?>
</body>
</html>
