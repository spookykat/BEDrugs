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
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Picture</th>
                <th>Collor and form</th>
                <th>Active ingredient</th>
                <th>Location</th>
                <th>Date</th>
                <th>Note</th>
                <th>Good</th>
            </tr>
            <?php
            $query = "SELECT * FROM pills";
            $result = mysqli_query($conn, $query);
        
            #Data to screen
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["Id"] . "</td>" . "<td>" . $row["Name"] . "</td>";
                    echo "<td>" . $row["Photo"] . "</td>";
                    echo "<td>" . $row["Shape"] . "</td>" . "<td>" . $row["Active_Ingredient"] . "</td>";
                    echo "<td>" . $row["Location"] . "</td>" . "<td>" . $row["Date"] . "</td>";
                    echo "<td>" . $row["Note"] . "</td>" . "<td>" . $row["Good"] . "</td>";
                }
            } else {
                echo "0 results";
            }
            ?>
        </table>
    </body>
</html>