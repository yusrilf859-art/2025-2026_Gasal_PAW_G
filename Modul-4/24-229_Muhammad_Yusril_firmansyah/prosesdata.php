<?php
require 'validate.inc';  

$errors = [];
if (validateName($_POST, 'surname', $errors)) {
    echo "<h3 style='color:green;'>Form submitted successfully with no errors.</h3>";
} else {
    echo "<h3 style='color:red;'>Terjadi kesalahan pada input:</h3>";

    foreach ($errors as $field => $message) {
        echo "<p style='color:red;'>$message</p>";
    }
}
?>
