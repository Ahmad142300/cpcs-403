<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitTrack - Your Fitness Journey Starts Here</title>
    <link rel="stylesheet" href="../global/main.css">
    <?php
    // Check if current page is schedule.php to include table.css and print.css
    $current_file = basename($_SERVER['PHP_SELF']);
    if($current_file == 'schedule.php') {
        echo '<link rel="stylesheet" href="../global/table.css">';
        echo '<link rel="stylesheet" href="../global/print.css" media="print">';
    }
    
    // Check if current page is feedback.php to include validation.js
    if($current_file == 'feedback.php') {
        echo '<script src="/js/validation.js"></script>';
    }
    
    // Check if current page is contact.php to include email.js
    if($current_file == 'contact.php') {
        echo '<script src="/js/email.js"></script>';
    }
    
    // Check if current page is gallery.php to include gallery.js
    if($current_file == 'gallery.php') {
        echo '<script src="/js/gallery.js"></script>';
    }
    ?>
</head>
<body>
    <div id="container">
        <header>
            <div id="logo">
                <a href="../index.php">
                    <img src="/images/logo.png" alt="FitTrack Logo">
                </a>
            </div>
            <h1>FitTrack</h1>
            <h2>Your Fitness Journey Starts Here</h2>
        </header>