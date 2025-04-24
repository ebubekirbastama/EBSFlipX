 <!-- Coding Ebubekir Bastama -->
<?php
// Function to save the image to the folder
function saveImageToFolder($imgData, $folder, $fileName) {
    // Sanitize file name to avoid directory traversal attacks
    $fileName = basename($fileName);

    // Check if folder exists, if not, create it
    if (!file_exists($folder)) {
        if (!mkdir($folder, 0777, true)) {
            echo json_encode(['success' => false, 'message' => 'Failed to create directory.']);
            exit;
        }
    }

    // Decode the Base64 image data
    $imgData = str_replace('data:image/png;base64,', '', $imgData);
    $imgData = str_replace(' ', '+', $imgData);
    $decodedData = base64_decode($imgData);

    // Validate the decoded data to ensure it's a valid image
    if ($decodedData === false) {
        echo json_encode(['success' => false, 'message' => 'Invalid image data.']);
        exit;
    }

    // Create the file path
    $filePath = $folder . '/' . $fileName;

    // Save the image to the specified path
    if (file_put_contents($filePath, $decodedData) === false) {
        echo json_encode(['success' => false, 'message' => 'Failed to save image.']);
        exit;
    }

    // Return success response
    echo json_encode(['success' => true, 'message' => 'Image saved successfully.']);
}

// Handle the incoming POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['imgData']) && isset($_POST['fileName'])) {
    $imgData = $_POST['imgData'];
    $fileName = $_POST['fileName'];
    $folder = 'EBS_pdf_pages';  // Target folder

    // Save the image
    saveImageToFolder($imgData, $folder, $fileName);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
}
?>
