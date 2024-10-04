<?php
// Load the data from the file
$filename = 'names_emails.txt';
$suggestions = [];

if (file_exists($filename)) {
    $file_data = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($file_data as $line) {
        // Each line contains "name,email"
        list($name, $email) = explode(",", $line);
        $suggestions[$email] = $name;  // Associate email with name
    }
}

// Get the 'q' parameter from URL (what the user is typing)
$q = $_REQUEST["q"];
$hint = "";

// Find matching suggestions
if ($q !== "") {
    $q = strtolower($q);
    $len = strlen($q);

    foreach ($suggestions as $email => $name) {
        if (stristr($q, substr($email, 0, $len))) {
            if ($hint === "") {
                $hint = $email . " (" . $name . ")";
            } else {
                $hint .= ", " . $email . " (" . $name . ")";
            }
        }
    }
}

// Output "no suggestion" if no hint was found, or the suggestions
echo $hint === "" ? "no suggestion" : $hint;
?>
