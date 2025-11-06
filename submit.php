<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "mysqlserver123!";
$dbname = "student_registration"; // Make sure you have created this database

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("<h2 style='color:red;'>Database Connection Failed: " . $conn->connect_error . "</h2>");
}

// Get form data safely
$name = $_POST['name'] ?? '';
$dob = $_POST['dob'] ?? '';
$address = $_POST['address'] ?? '';
$section = $_POST['section'] ?? '';
$dept = $_POST['dept'] ?? '';
$course = $_POST['course'] ?? '';
$year = $_POST['year'] ?? '';
$contact = $_POST['contact'] ?? '';
$email = $_POST['email'] ?? '';

// Insert into database
$sql = "INSERT INTO students (name, dob, address, section, dept, course, year, contact, email)
        VALUES ('$name', '$dob', '$address', '$section', '$dept', '$course', '$year', '$contact', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "
    <html>
    <head>
        <title>🎓 Registration Success</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background: linear-gradient(120deg, #005f99, #66ccff);
                color: #fff;
                text-align: center;
                padding-top: 60px;
            }
            .container {
                background-color: rgba(255, 255, 255, 0.1);
                border: 2px solid #fff;
                border-radius: 10px;
                display: inline-block;
                padding: 30px 50px;
                box-shadow: 0 0 15px rgba(0,0,0,0.3);
            }
            h2 { color: #fff; }
            p { font-size: 18px; line-height: 1.6; }
            button {
                margin-top: 20px;
                padding: 10px 25px;
                border: none;
                border-radius: 5px;
                background: #003366;
                color: white;
                font-size: 16px;
                cursor: pointer;
                margin-right: 10px;
            }
            button:hover {
                background: #004c99;
            }
        </style>
    </head>
    <body>
        <div class='container'>
            <h2>🎓 Registration Successful!</h2>
            <p><strong>Name:</strong> $name</p>
            <p><strong>DOB:</strong> $dob</p>
            <p><strong>Address:</strong> $address</p>
            <p><strong>Section:</strong> $section</p>
            <p><strong>Department:</strong> $dept</p>
            <p><strong>Course:</strong> $course</p>
            <p><strong>Year:</strong> $year</p>
            <p><strong>Contact:</strong> $contact</p>
            <p><strong>Email:</strong> $email</p>
            <button onclick=\"window.location.href='index.html'\">📝 Back to Form</button>
            <button onclick=\"window.location.href='view_registrations.php'\">📋 View Registrations</button>
        </div>
    </body>
    </html>";
} else {
    echo "<h3 style='color:red;'>Error: " . $sql . "<br>" . $conn->error . "</h3>";
}

$conn->close();
?>
