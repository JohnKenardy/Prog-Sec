<?php
$file = $_POST['file'];

if ($file && file_exists($file)) {
    // Set the appropriate content type based on the file extension
    $contentType = '';
    switch (strtolower(pathinfo($file, PATHINFO_EXTENSION))) {
        case 'jpg':
        case 'jpeg':
            $contentType = 'image/jpeg';
            break;
        case 'png':
            $contentType = 'image/png';
            break;
        case 'gif':
            $contentType = 'image/gif';
            break;
        case 'xlsx':
            $contentType = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
            break;
        case 'xls':
            $contentType = 'application/vnd.ms-excel';
            break;
        default:
            echo 'INVALID DATA TYPE/ERROR';
            exit;
    }

    // Set the appropriate headers
    header('Content-Type: ' . $contentType);

    // Check if the content type is an image
    if (strpos($contentType, 'image/') === 0) {
        // Display the image
        echo file_get_contents($file);
    } else {
        // For non-image types, download the file
        header('Content-Disposition: attachment; filename="' . basename($file) . '"');
        header('Content-Length: ' . filesize($file));
        readfile($file);
    }
} else {
    echo 'File not found.';
}
?>


<?php
$file = $_POST['file'];

if ($file && file_exists($file)) {
    // Set the appropriate content type based on the file extension
    $contentType = '';
    switch (strtolower(pathinfo($file, PATHINFO_EXTENSION))) {
        case 'jpg':
        case 'jpeg':
            $contentType = 'image/jpeg';
            break;
        case 'png':
            $contentType = 'image/png';
            break;
        case 'gif':
            $contentType = 'image/gif';
            break;
        default:
            // If the file is not an image, display an error message
            echo 'File is not an image.';
            exit;
    }

    // Set the appropriate content type header
    header('Content-Type: ' . $contentType);

    // Display the image
    echo file_get_contents($file);
} else {
    echo 'File not found.';
}
?>

