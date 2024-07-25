<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ainee";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $srNo = $_POST["srNo"];
    $name = $_POST["name"];
    $fatherName = $_POST["fatherName"];
    $age = $_POST["age"];

    $sql = "UPDATE students SET Name='$name', FatherName='$fatherName', Age='$age' WHERE srNo='$srNo'";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    header('Location: fetch_students.php');
    exit();
}

$conn->close();
?>
