<?php
// Directory where images are located
$directory = 'EBS_pdf_pages/';
$images = [];

// Get all image files in the directory (including jpg, jpeg, png extensions)
if (is_dir($directory)) {
    $imageFiles = glob($directory . "page_*.{jpg,jpeg,png}", GLOB_BRACE);  // page_*.jpg or page_*.png files
    // Get file names and paths
    foreach ($imageFiles as $image) {
        $images[] = $image;  // Full path of the image file
    }

    // Sort by page numbers
    usort($images, function ($a, $b) {
        preg_match('/page_(\d+)\.(jpg|jpeg|png)/', $a, $matchesA);
        preg_match('/page_(\d+)\.(jpg|jpeg|png)/', $b, $matchesB);
        return (int) $matchesA[1] - (int) $matchesB[1];
    });
}

// Return the image files in JSON format
$imagesJson = json_encode($images);
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Ebubekir Bastama">
        <meta name="description" content="EBS PDF flipbook system for interactive PDF viewing with page turn sound effects for a more engaging experience.">
        <meta name="keywords" content="PDF, flipbook, interactive, page turn, sound effects, Ebubekir Bastama">
        <meta property="og:title" content="Flipbook with PDF">
        <meta property="og:description" content="EBS PDF flipbook system for interactive PDF viewing with page turn sound effects for a more engaging experience.">
        <meta property="og:url" content="https://www.ebubekirbastama.com.tr">
        <meta property="og:type" content="website">
        <meta name="twitter:title" content="Flipbook with PDF">
        <meta name="twitter:description" content="EBS PDF flipbook system for interactive PDF viewing with page turn sound effects for a more engaging experience.">
        <meta name="robots" content="index, follow">
        <meta name="robots" content="max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <title>EBS Flipbook with PDF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
        <script src="javascript/turn.min.js" type="text/javascript"></script>
        <script src="javascript/turn.js" type="text/javascript"></script>
        <link href="css/flipbook.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>

        <!-- Loading Animation -->
    <div id="loading">
        <div class="spinner"></div>
        <div>Loading...</div>
    </div>

    <div id="magazine"></div>

    <div id="flipShotBar" class="flipShotBar">
        <div class="flipbutton" onclick="$('#magazine').turn('previous'); playPageTurnSound();">
            <!-- Left Arrow SVG -->
            <svg viewBox="0 0 24 24"><path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/></svg>
        </div>
        <div class="flipbutton" onclick="$('#magazine').turn('next'); playPageTurnSound();">
            <!-- Right Arrow SVG -->
            <svg viewBox="0 0 24 24"><path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6z"/></svg>
        </div>
    </div>

    <!-- Add sound file for page turning -->
    <audio id="pageTurnSound" src="media/ebsses.ogg" preload="auto"></audio>
    <script type="text/javascript">
        const pageImages = <?php echo $imagesJson; ?>; 
    </script>
    <script src="javascript/flipbook.js" type="text/javascript"></script>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
