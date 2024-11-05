<?php
session_start();
$login_error = "";

// Check if a user cookie is set
if (isset($_COOKIE['username'])) {
    $_SESSION['username'] = $_COOKIE['username'];
    header("Location: welcome.php");
    exit;
}

// Process login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = new mysqli("localhost", "root", "", "users_db");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($hashed_password);
    $stmt->fetch();

    if ($hashed_password && password_verify($password, $hashed_password)) {
        $_SESSION['username'] = $username;
        
        // Set a cookie for the username to remember the user
        setcookie("username", $username, time() + (86400 * 30), "/"); // 30-day cookie

        header("Location: welcome.php");
        exit;
    } else {
        $login_error = "Invalid username or password.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>

    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>    
    <div class="centered-content">
        <div class="model-box">
            <h2>Login</h2>
            <!-- POST Method to Save Data -->
            <form method="POST" action="index.php">                
                <label for="username">Username:</label><br>
                <input type="username" name="username" id="username" required><br><br>

                <label for="password">Password:</label><br>
                <input type="password" name="password" id="password" required><br><br>

                <input class="button break" type="submit" value="Log in"><br><br>

                <p>Not yet registered? <a href="register.php">Register here.</a></p>
            </form>
            <?php if ($login_error): ?>
            <p style="color:red;"><?php echo $login_error; ?></p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
