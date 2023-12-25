<?php
// session start function for the sign-up process
// session is an array to store all the values in it
// session like an arr[]
session_start();

// checking if the server request method is set to post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // if it is set to post .. start using the post method
    // the su-username is the name written in the HTML file
    // the su-password is the name written in the HTML file
    $new_username = $_POST["su-username"];
    $new_password = $_POST["su-password"];

    // the process of the database connection
    $servername = "localhost:3307";
    $username = "root";
    $password = "";
    $dbname = "your_database_name"; // Replace with your actual database name

    // creating a function named conn for connecting it
    $conn = new mysqli($servername, $username, $password, $dbname);
    // checking if there is a connection error with the connection

    if ($conn->connect_error) {
        // printing connection error
        die("Connection failed: " . $conn->connect_error);
    } else {
        // if the connection is true 
        // searching the database data for the username if it is existing or not 
        $sql = "SELECT username FROM users WHERE username = '$new_username'";
        // creating another variable storing the result of the query
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // it means the conditional is true 
            // back again to signup page to add another username
            header("location: signup.php?error=1");
            exit();
        } else {
            // creating a valid password for the account of that username
            // using password hash to keep it safe
            // and storing that password in a function
            $hashPassword = password_hash($new_password, PASSWORD_DEFAULT);
            // Insert the data into the tables of the database 
            // the data here are username and password
            // using query to store the data
            $sql = "INSERT INTO users (username, password) VALUES ('$new_username', '$hashPassword')";
            
            // executing the query and checking if it was successful
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
    // close the database connection
    $conn->close();
}
?>