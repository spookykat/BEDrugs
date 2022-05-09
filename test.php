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
        $name = $_POST['name'];
        $active = $_POST['active'];
        $location = $_POST['location'];
        $date = $_POST['date'];

        $sql = "INSERT INTO pills (Name, Active_Ingredient, Location, Date) VALUES ('$name', '$active', '$location', '$date') ";

        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
    ?>
    <form action="test.php" method="post">
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="active" placeholder="Active Ingredient">
        <input type="text" name="location" placeholder="Location">
        <input type="date" name="date" placeholder="Date">
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>