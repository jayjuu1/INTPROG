<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing page</title>

    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="centered-content">
        <div class="model-box">
            <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
            <form action="logout.php" method="post">
                <input class="button" type="submit" value="Logout">
            </form>
        </div>
    </div>
</body>
</html>

