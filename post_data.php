<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $filename = 'names_emails.txt';

    // Retrieve and sanitize inputs
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);

    if (!empty($name) && !empty($email)) {
        // Check for duplicate email
        $file_data = file_exists($filename) ? file($filename,  FILE_SKIP_EMPTY_LINES) : [];

        $duplicate = false;
        foreach ($file_data as $line) {
            list($existing_name, $existing_email) = explode(",", $line);
            if (trim($existing_email) === trim($email)) {
                $duplicate = true;
                break;
            }
        }

        if ($duplicate) {
            echo "Email already exists! Please use a different email.";
        } else {
            // Save the name and email to the file
            $new_entry = $name . "," . $email . PHP_EOL;
            file_put_contents($filename, $new_entry, FILE_APPEND);
            echo "Successfully registered!";
        }
    } else {
        echo "Please enter both name and email.";
    }

    echo '<br><a href="exercise5.html">Go back</a>';
}
?>
