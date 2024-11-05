<?php
$register_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $conn = new mysqli("localhost", "root", "", "users_db");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit;
    } else {
        $register_error = "Username is already taken.";
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
            <h2>Fill up to register</h2>
            <!-- POST Method to Save Data -->
            <form method="POST" action="register.php">
                <label for="username">Username:</label><br>
                <input type="username" name="username" id="username" required><br><br>

                <label for="password">Password:</label><br>
                <input type="password" name="password" id="password" required><br><br>

                <input class="button break" type="submit" value="Register"><br><br>

                <p>Already registered? <a href="index.php">Login here.</a></p>
            </form>
            <?php if ($register_error): ?>
        <p style="color:red;"><?php echo $register_error; ?></p>
    <?php endif; ?>
        </div>
    </div>
</body>
</html>