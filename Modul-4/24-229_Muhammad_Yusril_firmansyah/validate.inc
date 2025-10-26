<?php
function validateName($field_list, $field_name) {
    // Cek ada dan tidak kosong
    if (!isset($field_list[$field_name]) || trim($field_list[$field_name]) === '') {
        $errors[$field_name] = "Field '$field_name' wajib diisi!";
        return false;
    }

    // Hanya huruf, apostrof, dan strip
    $pattern = "/^[a-zA-Z'-]+$/";

    if (!preg_match($pattern, $field_list[$field_name])) {
        $errors[$field_name] = "Field '$field_name' hanya boleh berisi huruf (A–Z)!";
        return false;
    }

    return true;
}
