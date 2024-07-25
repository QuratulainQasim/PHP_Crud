<!DOCTYPE html>
<html>
<head>
    <title>Student Table</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<h2 class="heading-2">Student Table</h2>

<div class="container">
    <form method="POST" action="">
        <label for="srNo">SrNo:</label>
        <input type="text" id="srNo" name="srNo" required><br><br>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="fatherName">FatherName:</label>
        <input type="text" id="fatherName" name="fatherName" required><br><br>
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required><br><br>
        <input type="submit" value="Submit">
    </form>
</div>
<br><br>

<!-- Display the table -->
<table>
    <tr>
        <th>srNo</th>
        <th>Name</th>
        <th>FatherName</th>
        <th>Age</th>
        <th>updation</th>
        <th>Deletion</th>
    </tr>
  
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ainee";
    
    // Database Connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Connection Check
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Form Data Handling
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $srNo = $_POST['srNo'];
        $name = $_POST['name'];
        $fatherName = $_POST['fatherName'];
        $age = $_POST['age'];

        // SQL INSERT Query
        $insertSql = "INSERT INTO students (Name, FatherName, Age) VALUES ( '$name', '$fatherName', '$age')";
        if ($conn->query($insertSql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $insertSql . "<br>" . $conn->error;
        }
    }

    // Fetch Data from Database
    $sql = "SELECT * FROM students";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["srNo"]. "</td>";
            echo "<td>" . $row["Name"]. "</td>";
            echo "<td>" . $row["FatherName"]. "</td>";
            echo "<td>" . $row["Age"]. "</td>";
            echo "<td><a href='edit_student.php?srNo=".$row["srNo"]."'>Edit</a></td>";
            echo "<td><a href='delete_data.php?srNo=".$row["srNo"]."'>Delete</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>0 results</td></tr>";
    }

    $conn->close();
    ?>
</table>

</body>
</html>
