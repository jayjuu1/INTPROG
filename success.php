<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Success</title>
</head>
<body>
    <h1>Success!</h1>
    <p><?php echo htmlspecialchars($_GET['message']); ?></p>
    <a href="exercise6.html">Go back</a>

    <!-- Include the footer -->
    <?php include 'footer.php'; ?>

</body>
</html>
