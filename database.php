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

  // send email with new reflection
  include 'mailer.php';

  // reload page
  echo "<script>window.location.reload()</script>";
}

$sql = "SELECT id, title, reflection FROM reflections ORDER BY id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<h3>" . $row["title"]. "</h3>" . $row["reflection"]. "<hr />";
    }
} else {
    echo "<p>Brak refleksji</p>";
}
$conn->close();
?>
