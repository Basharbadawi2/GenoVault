<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genomic Database</title>
    <style>
        body {
        background-image: url('https://th.bing.com/th/id/OIP.c1szrXUZ2RzfTCspg-EcOwHaHa?w=147&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7');
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        height: 100vh;
        font-family: Arial, sans-serif;
        background-color: floralwhite;
        text-align: center;
        margin: 50px;
        }



        .form-container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #4caf50;
        }

        a {
            text-decoration: none;
            color: #4caf50;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Sign Up</h2>
        <!-- Sign-up form -->
        <form action="signup_process.php" method="post">
            <label for="su-username">Username:</label>
            <input type="text" id="su-username" name="su-username" required>

            <label for="su-password">Password:</label>
            <input type="password" id="su-password" name="su-password" required>

            <button type="submit" name="signup">Sign Up</button>
        </form>

        <p>Already have an account? <a href="login.php">Login</a></p>
    </div>

    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signup"])) {
    // Process sign-up data
    $su_username = $_POST["su-username"];
    $su_password = password_hash($_POST["su-password"], PASSWORD_DEFAULT);

    // Validate and insert into the database (replace with your database code)
    if (strlen($su_username) < 4 || strlen($_POST["su-password"]) < 6) {
        echo "<p>Invalid username or password. Please try again.</p>";
    } else {
        // TODO: Insert user data into the database
        echo "<p>User registered successfully!</p>";
    }
}
?>


</body>
</html>
