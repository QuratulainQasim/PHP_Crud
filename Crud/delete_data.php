<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ainee";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the srNo from the URL
$srNo = $_GET['srNo'];

// SQL query to delete the row with the specified srNo
$sql = "DELETE FROM students WHERE srNo='$srNo'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

// Redirect back to the main table display page
header('Location: fetch_students.php');
exit();

$conn->close();
?>
