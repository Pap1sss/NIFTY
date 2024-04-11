<!DOCTYPE html>
<html lang="en">

<?php

if (isset($_POST['restore'])) {
    $host = 'localhost';
    $username = 'NIFTYSHOES';
    $password = 'pa$$word1';
    $db = 'website';

    // Create connection
    $conn = new mysqli($host, $username, $password, $db);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Location of the .sql file in your server
    $backupFile = '/var/www/html/NIFTY/databases/website_database.sql';

    // Read the SQL file
    $sql = file_get_contents($backupFile);

    // Execute the SQL file
    if (mysqli_multi_query($conn, $sql)) {
        echo "Restoration successful";
    } else {
        echo "Error restoring database: " ;
    }

    // Close the connection
    mysqli_close($conn);
}
?>



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Add Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl7/1L_dstPt3HV5HzibVkU//NhCk9sJ7Z4+0p6t37" crossorigin="anonymous">
</head>

<body style="background: red;">
    <br>
    <br>
    <div class="container mt-5 d-flex">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <script type="text/javascript">
                    var code = prompt("Please enter the code to proceed:");
                    if (code != null && code == "niftyshoes.shop") {
                        // If the code is correct, show the form
                        document.write('<form action="" method="post">\
                                            <div class="form-group text-center">\
                                                <button type="submit" name="restore" class="btn btn-info btn-rounded">Initiate Restore</button>\
                                            </div>\
                                        </form>');
                    } else {
                        // If the code is incorrect, show an error message
                        alert("Incorrect code. Please try again.");
                    }
                </script>
            </div>
        </div>
    </div>

    <!-- Add Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz4fnFO9gybBud7QdGw/X7Zr1n3lzEJ5PuEu01EjOJw/j9q3tGktEAMa/"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

        
</body>

</html>