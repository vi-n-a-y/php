<?php
include_once 'db_connect.php';

// Fetch the most recent data from the database
$stmt = $conn->prepare("SELECT title, content, content1, aboutFile FROM aboutUs ORDER BY created_at DESC LIMIT 1");
$stmt->execute();
$stmt->bind_result($title, $content, $content1, $aboutFile);
$stmt->fetch();
$stmt->close();
$conn->close();

// Set the image path
$imagePath = htmlspecialchars('images/' . $aboutFile, ENT_QUOTES, 'UTF-8');

// Function to process Quill content and separate images from text
function processQuillContent($html) {
    $dom = new DOMDocument();
    libxml_use_internal_errors(true); // Suppress warnings for malformed HTML
    $dom->loadHTML('<?xml encoding="utf-8" ?>' . $html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    libxml_clear_errors();
    
    $xpath = new DOMXPath($dom);
    
    // Extract images and text
    $images = [];
    $texts = [];
    
    foreach ($xpath->query('//img') as $img) {
        $images[] = $img->getAttribute('src');

        $img->parentNode->removeChild($img);
    }
    
    $texts[] = $dom->saveHTML();
    
    return ['images' => $images, 'texts' => $texts];
}

$processedContent = processQuillContent($content);
$processedContent1 = processQuillContent($content1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About Us</title>
    <link rel="stylesheet" href="style.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #F5F7F8;
        }

        .abt-main-con {
            width: 80%;
            margin: auto;
            padding: 20px;
        }

        .abt-img-header {
            position: relative;
            width: 100%;
            height: 300px;
            background-size: cover;
            background-position: center;
            margin-bottom: 20px;
        }

        .abt-img-header::before {
            content: '';
            display: block;
            height: 100%;
            width: 100%;
            background: rgba(0, 0, 0, 0.5); /* Semi-transparent overlay */
            position: absolute;
            top: 0;
            left: 0;
        }

        .abt-img-header .title-text {
            position: absolute;
            top: 50%;
            left: 50%;
            color: white;
            font-size: 24px;
            padding: 10px;
            border-radius: 8px;
            background: rgba(0, 0, 0, 0.5);
            max-width: 80%;
        }

        .abt-content1 {
            display: flex;
            flex-direction: row;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        .abt-content1 img {
            max-width: 50%;
            height: 300px; 
            margin-right: 20px;
            border-radius: 8px;
        }

        .abt-content1 .text-content {
            flex: 1;
        }

        .abt-content2 {
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            .abt-content1 {
                flex-direction: column;
            }

            .abt-content1 img {
                margin-right: 0;
                margin-bottom: 10px;
            }
        }
        .nav-a-div{
            display: none;
        }
    </style>
    
</head>

<?php  include_once 'adminHeader.php';  ?>
<body>

<div class="abt-main-con">
    <div class="abt-img-header" style="background-image: url('<?php echo $imagePath; ?>');">
        <div class="title-text"><?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></div>
    </div>

    <div class="abt-content1">
        <?php foreach ($processedContent['images'] as $imageSrc): ?>
            <img src="<?php echo htmlspecialchars($imageSrc, ENT_QUOTES, 'UTF-8'); ?>" alt="Content Image">
        <?php endforeach; ?>
        <div class="text-content">
            <?php echo $processedContent['texts'][0]; ?>
        </div>
    </div>

    <div class="abt-content2">
        <?php foreach ($processedContent1['images'] as $imageSrc): ?>
            <img src="<?php echo htmlspecialchars($imageSrc, ENT_QUOTES, 'UTF-8'); ?>" alt="Content Image">
        <?php endforeach; ?>
        <?php echo $processedContent1['texts'][0]; ?>
    </div>
</div>

</body>
</html>
