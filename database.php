<?php

include 'config.php';

$title = $_POST["title"];
$reflection = $_POST["reflection"];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($title != "" && $reflection != "") {
  $sql = "INSERT INTO reflections (title, reflection)
  VALUES ('$title', '$reflection')";

  if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);

  echo "Finished";
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
