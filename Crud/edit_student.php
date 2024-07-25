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

// Fetch the student data based on srNo
$srNo = $_GET['srNo']; //ya php ka get function hy url sy srno ko get kia hy r phr us variable ko sql m dia hy r jb data a gea usay 
// html m set kai tm ny detle m aisay get krna hy phr dtelte ki query m ya sr no dena hy r phssai 
// kynk k delte sql he kr sakti hy database sy php ni kr sakti hy r url sy data read php kr sakti hy is lea php sy read kia sql ko pass
// kia phr sql ko run kia conneciton bna k ya flow ko i hy
// m ab jumy p jana lgaya flow ko smjho r dtele ko kro khud sy aisay he jesy yahan hwa bs dtlete ki query ho ge r nechy ya form ni ho ga us m 
// bs ya ho ga  g thk hai bss ye btaen k delete k page mn alag sy query to ni deni query sy ho delete hon a??
$sql = "SELECT * FROM students WHERE srNo='$srNo'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>  

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <!-- <link rel="stylesheet" type="text/css" href="styles.css"> -->
</head>
<body>

<h2>Edit Student</h2>

<!-- Form to edit student -->
<div class="container">
    <form method="POST" action="update_student.php">
        <!-- ya value k andar php k variable dia hwa hn ya oper sql sy get kia hn phpy phr is ko set kia hy ya array hti hy like object yahan 
         deal krna hy isay ya sql object day rahi hy phr usay set krwa rahy hn -->
        <input type="hidden" id="srNo" name="srNo" value="<?php echo $row['srNo']; ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $row['Name']; ?>" required><br><br>
        <label for="fatherName">FatherName:</label>
        <input type="text" id="fatherName" name="fatherName" value="<?php echo $row['FatherName']; ?>" required><br><br>
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" value="<?php echo $row['Age']; ?>" required><br><br>
        <input type="submit" value="Update">
    </form>
</div>

</body>
</html>

<?php
$conn->close();
?>
