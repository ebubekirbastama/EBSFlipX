 <!-- Coding Ebubekir Bastama -->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Ebubekir Bastama">
    <title>Convert PDF Pages to Images and Save to Folder</title>
    
    <!-- Bootstrap CSS for styling the page -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJt3W+Hfi1jU13mVt7mKxNQy2VGG0YyYhRym3Bv2lZb0QH0y7r7P0w1J8U4u" crossorigin="anonymous">
    
    <!-- FontAwesome for Icons used in the page (optional) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    <!-- Custom CSS for additional styling -->
    <link href="../css/style.css" rel="stylesheet" type="text/css"/>
</head>
<body>

<!-- Main container that holds the content -->
<div class="container">
    <h2>Convert PDF Pages to Images</h2>
    <p class="lead">Select a PDF file and convert its pages to images, then save them to the 'EBS_pdf_pages' folder.</p>

    <!-- Loading indicator that appears while processing -->
    <div id="loading">Loading...</div>

    <!-- File input for selecting PDF files -->
    <input type="file" id="fileInput" accept="application/pdf" class="form-control">

    <!-- Progress bar to show upload progress -->
    <div class="progress-container">
        <div class="progress">
            <div id="progressBar" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div id="progressText" class="mt-2">Uploaded: 0 / 0</div>
    </div>

    <!-- Message area to show success or failure notifications -->
    <div id="message"></div>
</div>
<br>

<!-- User guide explaining the steps -->
<div class="documentation">
    <h5>How to Use</h5>
    <ul>
        <li><strong>Step 1:</strong> Choose a PDF file.</li>
        <li><strong>Step 2:</strong> Each page of the PDF will be converted to an image and saved in the 'EBS_pdf_pages' folder.</li>
        <li><strong>Step 3:</strong> Once the upload is complete, you will receive a success message.</li>
    </ul>

    <!-- Features section that lists key functionalities of the tool -->
    <h5>Features</h5>
    <ul>
        <li>Convert PDF pages to high-resolution images.</li>
        <li>Images are automatically saved.</li>
        <li>A progress bar is shown during the upload process.</li>
    </ul>
</div>

<!-- jQuery library for DOM manipulation -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- PDF.js library to handle PDF rendering -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>

<!-- External JavaScript file that handles PDF to image conversion logic -->
<script src="../javascript/pdf-to-image.js" type="text/javascript"></script>

<!-- Bootstrap JS (Optional) for components like modals, dropdowns, etc. -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
