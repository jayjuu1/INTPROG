<?php

// Set the content type to text/html
header('Content-Type: text/html; charset=utf-8');

// Start processing the request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $filename = 'names_emails.txt';

    // Retrieve and sanitize inputs
    $name = ucwords(htmlspecialchars($_POST['name']));
    $email = htmlspecialchars($_POST['email']);

    if (!empty($name) && !empty($email)) {
        // Check for duplicate email
        $file_data = file_exists($filename) ? file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) : [];

        $duplicate = false;
        foreach ($file_data as $line) {
            list($existing_name, $existing_email) = explode(",", $line);
            if (trim($existing_email) === trim($email)) {
                $duplicate = true;
                break;
            }
        }

        if ($duplicate) {
            // Redirect if email already exists
            header('Location: error.php?message=Email already exists! Please use a different email.');
            exit();
        } else {
            // Save the name and email to the file
            $new_entry = $name . "," . $email . PHP_EOL;
            file_put_contents($filename, $new_entry, FILE_APPEND);

            // Redirect to a success page
            header('Location: success.php?message=Successfully Registered!');
            exit();
        }
    } else {
        // Redirect to an error page if inputs are missing
        header('Location: error.php?message=Please enter both name and email.');
        exit();
    }
}
?>
