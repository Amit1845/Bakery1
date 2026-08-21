<?php
/**
 * Validates and safely stores an uploaded image.
 * Returns the relative path (e.g. "upload/xxxx.jpg") on success, or false on failure.
 */
function handle_product_image_upload($fileField, $uploadDir = __DIR__ . '/upload/', $publicPrefix = 'upload/')
{
    if (!isset($_FILES[$fileField]) || $_FILES[$fileField]['error'] !== UPLOAD_ERR_OK) {
        return false;
    }

    $allowed = [
        'image/jpeg' => 'jpg',
        'image/png'  => 'png',
        'image/gif'  => 'gif',
        'image/webp' => 'webp',
    ];

    $tmpPath = $_FILES[$fileField]['tmp_name'];
    $size    = $_FILES[$fileField]['size'];

    if ($size <= 0 || $size > 5 * 1024 * 1024) { // 5MB max
        return false;
    }

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime  = finfo_file($finfo, $tmpPath);
    finfo_close($finfo);

    if (!isset($allowed[$mime])) {
        return false;
    }

    $ext      = $allowed[$mime];
    $filename = bin2hex(random_bytes(8)) . '.' . $ext; // random name, no user input in path
    $destPath = $uploadDir . $filename;

    if (!move_uploaded_file($tmpPath, $destPath)) {
        return false;
    }

    return $publicPrefix . $filename;
}
