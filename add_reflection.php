<?php

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO reflections (title, reflection)
VALUES ($_POST['title'], $_POST['reflection'])";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

echo '<script type="text/javascript">
           window.location = "http://v-ie.uek.krakow.pl/~s180472/PanTadeusz"
      </script>';
?>
