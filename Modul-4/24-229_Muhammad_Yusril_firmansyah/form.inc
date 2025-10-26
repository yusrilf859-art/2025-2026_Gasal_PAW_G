<?php
function validateName($field_list, $field_name, &$errors) {
    $value = trim($field_list[$field_name] ?? '');

    if ($value === '') {
        $errors[$field_name] = "Field $field_name wajib diisi.";
        return false;
    }

    // Regular Expression: hanya huruf, tanda hubung, dan kutip
    if (!preg_match("/^[a-zA-Z'-]+$/", $value)) {
        $errors[$field_name] = "Field $field_name hanya boleh berisi huruf.";
        return false;
    }

    return true;
}

function validateEmail($field_list, $field_name, &$errors) {
    $email = trim(strtolower($field_list[$field_name] ?? ''));

    if ($email === '') {
        $errors[$field_name] = "Email wajib diisi.";
        return false;
    }

    // Filter: validasi email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[$field_name] = "Format email tidak valid.";
        return false;
    }

    return true;
}

function validateSemester($field_list, $field_name, &$errors) {
    $value = $field_list[$field_name] ?? '';

    // Type testing + numeric check
    if (!is_numeric($value) || $value < 1 || $value > 8) {
        $errors[$field_name] = "Semester harus berupa angka 1–8.";
        return false;
    }

    return true;
}

function validateDateInput($day, $month, $year, &$errors) {
    // Date checking
    if (!checkdate($month, $day, $year)) {
        $errors['date'] = "Tanggal tidak valid.";
        return false;
    }
    return true;
}
?>
