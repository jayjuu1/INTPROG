<?php
// Handle POST request (add content to file and submit user details)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['content'])) {
        $filename_ng_ina_mo = 'exercise4.txt';
        $new_content = htmlspecialchars($_POST['content']);
        file_put_contents($filename_ng_ina_mo, $new_content . PHP_EOL, FILE_APPEND);
        echo "Ang nadagdag aaaAAY:<br>" . nl2br($new_content) . "<br><br>";
    } else {
        echo "Please enter content to add to the file.<br><br>";
    }
    if (!empty($_POST['name']) && !empty($_POST['email'])) {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        echo "Welcome, " . $email ."!<br>". "Also known as:". $name ."!<br>";
    } else {
        echo "Please enter both name and email.<br><br>";
    }
    echo '<a href="exercise4.html">Go back</a>';
}

// Handle GET request (retrieve file content or show user details)
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!empty($_GET['filename'])) {
        $filename_ng_ina_mo = htmlspecialchars($_GET['filename']);
        $display_type = $_GET['display_type'];

        // Check if the file exists
        if (file_exists($filename_ng_ina_mo)) {
            if ($display_type == 'plain') {
                // Display file content as plain text
                $laman_ng_file = file_get_contents($filename_ng_ina_mo);
                echo "Races:<br>" . nl2br($laman_ng_file) . "<br><br>";
            } elseif ($display_type == 'array') {
                // Display file content as an array
                $array = file($filename_ng_ina_mo);
                echo "Races in array:<br><pre>";
                print_r($array);
                echo "</pre><br>";
            }
        } else {
            echo "File does not exist. Creating a new file...<br>";
            $default_content = "wassup my\nninja\nwhiteman";
            file_put_contents($filename_ng_ina_mo, $default_content);
            echo "File created.<br><br>";
        }
     } else {
        echo "Please enter a filename to read.<br><br>";
    }

    if (!empty($_GET['name']) && !empty($_GET['email'])) {
        $name = htmlspecialchars($_GET['name']);
        $email = htmlspecialchars($_GET['email']);
        echo "Welcome, " . $name . "!<br>";
        echo "Your email address is: " . $email . "<br><br>";
    }

    echo '<a href="exercise4.html">Go back</a>';
}
?>
