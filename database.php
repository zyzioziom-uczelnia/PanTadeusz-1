<?php

include 'config.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT id, title, reflection FROM reflections";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Numer: " . $row["id"]. " - Tytuł: " . $row["title"]. "<br /> " . $row["reflection"]. "<hr />";
    }
} else {
    echo "Brak refleksji";
}
$conn->close();
?>
