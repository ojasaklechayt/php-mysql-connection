# README

## PHP to MySQL Connection Code

---

## Introduction

This README provides a basic guide for establishing a connection between PHP and MySQL databases. This connection enables PHP scripts to interact with a MySQL database, facilitating tasks such as querying, updating, and managing data.

---

## Code

```php
<?php

// PHP script for establishing a connection with MySQL database

// Database connection parameters
$servername = "localhost"; // Replace with your MySQL server hostname
$username = "root"; // Replace with your MySQL username
$password = "password"; // Replace with your MySQL password
$dbname = "your_database"; // Replace with your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully";
}

// Close connection (optional, recommended)
$conn->close();

?>
```

---

## Instructions

1. **Database Connection Parameters:**
   - Modify the `$servername`, `$username`, `$password`, and `$dbname` variables according to your MySQL server configuration.

2. **Create Connection:**
   - The `mysqli` class is used to establish a connection to the MySQL database using the provided parameters.

3. **Check Connection:**
   - Verify if the connection is successful. If there's an error, it will be displayed, and the script will terminate.

4. **Close Connection (Optional):**
   - It's recommended to close the database connection after performing the necessary operations. Uncomment `$conn->close();` to close the connection.

---

## Conclusion

This README provides a basic PHP script for connecting to a MySQL database. By following the instructions and modifying the connection parameters, you can integrate this script into your PHP projects to interact with MySQL databases effectively.

---

### Note:
- Replace placeholders like "localhost", "root", "password", and "your_database" with your actual MySQL server details.
- Ensure that your PHP environment supports MySQLi extension for database connectivity.