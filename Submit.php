<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>BEDRUGS - Pills</title>
        <link rel="stylesheet" href="StyleInfo.css">
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
    #Connection Details
    $servername = '127.0.0.1';
    $username = 'root';
    $password = 'usbw';
    $dbname = 'drugs';

    #Make Connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (isset($_POST['submit'])) {
        $name = sanitized_input($_POST['name']);
        $shape = sanitized_input($_POST['shape']);
        $active = sanitized_input($_POST['active']);
        $location = sanitized_input($_POST['location']);
        $date = sanitized_input($_POST['date']);
        $note = sanitized_input($_POST['note']);
        $good = sanitized_input($_POST['good']);

        $sql = "INSERT INTO pills (Name, Shape, Active_Ingredient, Location, Date, Note, Good) VALUES ('$name', '$shape', '$active', '$location', '$date', '$note', '$good') ";

        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully" . "</br>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    #Close connection
    mysqli_close($conn);
    ?>
        <section class = header>
            <nav>
                <a href="index.html"><img src="https://www.logomaker.com/api/main/images/1j+ojVNGOMkX9W2+J1iwiGKhh...CBpRJOmAiIiWcqL2VE9AlpkiQvgfZr...A=="></a>
                <div class="nav-links">
                    <ul>
                        <li><a href="index.php">HOME</a></li>
                        <li><a href="About.php">ABOUT</a></li>
                        <li><a href="Pills.php">PILLS</a></li>
                        <li><a href="Submit.php">SUBMIT PILL</a></li>
                    </ul>
                </div>
            </nav>
        </section>
        <section>
        <form action="" method="post">
            <label for="name">Name:</label>
            <select name="name" id="name">
                <option value="XTC">XTC</option>
                <option value="2C-B">2C-B</option>
                <option value="2C-E">2C-E</option>
            </select></br>
            <input type="text" name="shape" placeholder="Shape and Color"></br>
            <input type="text" name="active" placeholder="Active Ingredient"></br>
            <input type="text" name="location" placeholder="Location"></br>
            <input type="date" name="date" placeholder="Date"></br>
            <input type="text" name="note" placeholder="Note"></br>
            <input type="text" name="good" placeholder="Good or Bad?"></br>

            <input type="submit" name="submit" value="Submit">
        </form>
        </section>
    </body>
</html>