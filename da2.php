<?php

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "iwpda";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Execute queries

// i) Display the employee details in Grade is not “B”
$sql = "SELECT * FROM Employee WHERE Grade != 'B'";
$result = $conn->query($sql);
echo "Employees with Grade other than 'B':\n";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Name: " . $row["Name"] . ", Department: " . $row["Department"] . ", Grade: " . $row["Grade"] . "\n";
    }
} else {
    echo "No records found\n";
}

// ii) List the number of employees in each department. Only include department with more than 3 employees. (Use having clause)
$sql = "SELECT Department, COUNT(*) as numEmployees FROM Employee GROUP BY Department HAVING numEmployees > 3";
$result = $conn->query($sql);
echo "\nNumber of employees in each department with more than 3 employees:\n";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Department: " . $row["Department"] . ", Number of employees: " . $row["numEmployees"] . "\n";
    }
} else {
    echo "No records found\n";
}

// iii) Lists the number of employees in each department and group by their departments (Use Group by)
$sql = "SELECT Department, COUNT(*) as numEmployees FROM Employee GROUP BY Department";
$result = $conn->query($sql);
echo "\nNumber of employees in each department:\n";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Department: " . $row["Department"] . ", Number of employees: " . $row["numEmployees"] . "\n";
    }
} else {
    echo "No records found\n";
}

// iv) List the distinct department names
$sql = "SELECT DISTINCT Department FROM Employee";
$result = $conn->query($sql);
echo "\nDistinct department names:\n";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo $row["Department"] . "\n";
    }
} else {
    echo "No records found\n";
}

// v) How many employees earn salary in the range between 30k and 40k
$sql = "SELECT COUNT(*) as numEmployees FROM Employee WHERE SalaryPay BETWEEN 30000 AND 40000";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
echo "\nNumber of employees earning salary between 30k and 40k: " . $row["numEmployees"] . "\n";

// vi) Find the rounded value of the bonus points. (Differentiate using CEIL, FLOOR, TRUNC, ROUND)
$sql = "SELECT BonusPoints, CEIL(BonusPoints) as CEIL, FLOOR(BonusPoints) as FLOOR, TRUNCATE(BonusPoints, 0) as TRUNC, ROUND(BonusPoints) as ROUND FROM Employee";
$result = $conn->query($sql);
echo "\nRounded value of the bonus points:\n";
if ($result->num_rows > 0) {
    echo "Original\tCEIL\tFLOOR\tTRUNC\tROUND\n";
    while ($row = $result->fetch_assoc()) {
        echo $row["BonusPoints"] . "\t" . $row["CEIL"] . "\t" . $row["FLOOR"] . "\t" . $row["TRUNC"] . "\t" . $row["ROUND"] . "\n";
    }
} else {
    echo "No records found\n";
}

// vii) List the employee details who got the minimum bonus points
$sql = "SELECT * FROM Employee WHERE BonusPoints = (SELECT MIN(BonusPoints) FROM Employee)";
$result = $conn->query($sql);
echo "\nEmployees with minimum bonus points:\n";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Name: " . $row["Name"] . ", Department: " . $row["Department"] . ", Bonus Points: " . $row["BonusPoints"] . "\n";
    }
} else {
    echo "No records found\n";
}

// viii) Calculate the total salary of all employees
$sql = "SELECT SUM(SalaryPay) as totalSalary FROM Employee";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
echo "\nTotal salary of all employees: $" . $row["totalSalary"] . "\n";

// ix) List the employee details in “Testing” department.
$sql = "SELECT * FROM Employee WHERE Department = 'Testing'";
$result = $conn->query($sql);
echo "\nEmployees in Testing department:\n";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Name: " . $row["Name"] . ", Department: " . $row["Department"] . "\n";
    }
} else {
    echo "No records found\n";
}

// x) Calculate the average salary of all employees in “HR” department
$sql = "SELECT AVG(SalaryPay) as avgSalary FROM Employee WHERE Department = 'HR'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
echo "\nAverage salary of employees in HR department: $" . $row["avgSalary"] . "\n";

// Close connection
$conn->close();

?>
