<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
</head>
<body>
    <?php
    function sanitized_input($input) {
        $input = trim($input);
        $input = stripslashes($input);
        $input = mysql_real_escape_string($input);
        $input = htmlspecialchars($input);
        return $input;
    }
    $servername = '127.0.0.1';
    $username = 'root';
    $password = 'usbw';
    $dbname = 'drugs';

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $query = "SELECT * FROM pills";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo $row["Id"] . " " . $row["Name"] . " ". $row["Location"] . "<br>";
        }
    } else {
        echo "0 results";
    }

    if (isset($_POST['submit'])) {
        $name = sanitized_input($_POST['name']);
        $shape = sanitized_input($_POST['shape']);
        $active = sanitized_input($_POST['active']);
        $location = sanitized_input($_POST['location']);
        $date = sanitized_input($_POST['date']);

        $sql = "INSERT INTO pills (Name, Shape, Active_Ingredient, Location, Date) VALUES ('$name', '$shape', '$active', '$location', '$date') ";

        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully" . "</br>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
    ?>
    <form action="test.php" method="post">
        <label for="name">Name:</label>
        <select name="name" id="name">
            <option value="XTC">XTC</option>
            <option value="2C-B">2C-B</option>
            <option value="2C-E">2C-E</option>
        </select>
        <input type="text" name="shape" placeholder="Shape">
        <input type="text" name="active" placeholder="Active Ingredient">
        <input type="text" name="location" placeholder="Location">
        <input type="date" name="date" placeholder="Date">
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>