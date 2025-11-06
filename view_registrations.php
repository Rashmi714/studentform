<?php
$conn = new mysqli("localhost", "root", "mysqlserver123!", "student_registration");
if ($conn->connect_error) {
    die("<h2>Database Connection Failed: " . $conn->connect_error . "</h2>");
}

$result = $conn->query("SELECT * FROM students");
?>
<html>
<head>
    <title>📋 View Registrations</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(120deg, #004c99, #33ccff);
            color: #fff;
            text-align: center;
            padding: 40px;
        }
        table {
            margin: auto;
            border-collapse: collapse;
            width: 90%;
            background-color: rgba(255, 255, 255, 0.15);
            border-radius: 10px;
            overflow: hidden;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            color: white;
        }
        th {
            background-color: rgba(0, 0, 0, 0.3);
        }
        tr:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }
        button {
            margin-top: 30px;
            padding: 10px 25px;
            border: none;
            border-radius: 5px;
            background: #003366;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background: #004c99;
        }
    </style>
</head>
<body>
    <h2>🎓 Registered Students</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>DOB</th>
            <th>Address</th>
            <th>Section</th>
            <th>Department</th>
            <th>Course</th>
            <th>Year</th>
            <th>Contact</th>
            <th>Email</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['dob']}</td>
                        <td>{$row['address']}</td>
                        <td>{$row['section']}</td>
                        <td>{$row['dept']}</td>
                        <td>{$row['course']}</td>
                        <td>{$row['year']}</td>
                        <td>{$row['contact']}</td>
                        <td>{$row['email']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='10'>No registrations found</td></tr>";
        }
        ?>
    </table>
    <button onclick="window.location.href='index.html'">⬅️ Back to Form</button>
</body>
</html>
<?php $conn->close(); ?>
