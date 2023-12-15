<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login </title>
    <style>
        body {
            background-image: url('https://th.bing.com/th/id/OIP.c1szrXUZ2RzfTCspg-EcOwHaHa?w=147&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7');
            background-size: cover;
            font-family: Arial, sans-serif;
            background-color: khaki;
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
            background-color: #45a049;
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
        <h2>Login</h2>
        
        <!-- Login form -->
        <form action="login_process.php" method="post">
            <label for="login-username">Username:</label>
            <input type="text" id="login-username" name="login-username" required>

            <label for="login-password">Password:</label>
            <input type="password" id="login-password" name="login-password" required>

            <button type="submit" name="login">Login</button>
        </form>

        <p>Don't have an account yet? <a href="signup.php">Sign Up</a></p>
    </div>

    <?php
    // check if the requst method is post
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(isset($_POST["signup"]))
        {
            $su_username=$_POST["su-username"];
            $su_password = password_hash($_POST["su-password"], PASSWORD_DEFAULT);
              //Validate username and password length
        if(strlen($su_username) < 4 || strlen($_POST["su-password"]<6))
        {
            echo"<p>Invalid username or password . Please try again . </P>";
        }
        else{
            echo"<p> User registred succesfully! </p>";
        }
        }   
        elseif(isset($_POST["login"]))
        {
            //Process login data
            $login_username = $_POST["login-username"];
            $login_password = $_POST["login-password"];
        }
        //Validate uername and password length
        if (strlen($login_username)<4 ||strlen($login_password)<6 )
        {
            echo" <p>Invalid username or password . Please try again. </p>";
        }
        else{
            echo "<p>Log in Succefull</p>";
        }
    }
?>


</body>
</html>